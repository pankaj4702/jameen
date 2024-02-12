<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\{User,Project,Property_Type,Property_source,Property_status,Property,Configuration,City,PostUser,Service,Testimonial,ServiceCategory,Community,Feature,Bedroom,Subscriber,InquiryData,PropertyCategory,FeatureAmenities,News,Media,Blog,Insight};
use GuzzleHttp\Client;
use DB;
use Hash;
use Session;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        if (session()->has('admin _id')) {
            return redirect('admin/dashboard');
            }
            else{
                return view('admin.login');
            }

    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password'=>'required',
          ]);
          $users = DB::table('admin_users')->where('email',$request->email)->first();
          if($users != null){

          if (Hash::check($request->password,$users->password)) {

            Session::put(['admin_id' =>$users->id]);
            return redirect('admin/dashboard');

         }
         else{
            return redirect()->back()->with('error',"Password is wrong");
         }
        }
        else{
            return redirect()->back()->with('error',"Please Enter the Correct Email.");
        }

    }

    public function dashboard(){
       return view('admin.admin');
    }

    public function logout(){
        session()->forget('admin_id');
        return redirect()->route('admin');
    }

    public function add_project(){

        $result = DB::table('property__types')
            ->select('property__types.id as typeId','property__types.name as type_name','property__types.configuration','configurations.name')
            ->leftjoin('configurations', function ($join) {
                $join->whereRaw("FIND_IN_SET(configurations.id, property__types.configuration)");
            })->get();
              $result->each(function ($config) {
                $config->configuration = explode(',', $config->configuration);
            });
            $groupedConfigurations = $result->groupBy('typeId');
            $configurations = $groupedConfigurations->map->first();
        $property_types =Property_Type::all();
        $bedrooms =Bedroom::all();
        $property_status =Property_status::all();
        $property_sources =Property_source::all();
        $property_sources =Property_source::all();
        $post_users =PostUser::all();

        // check the subscriber
        // $user_id = Session::get('user_id');
        // $get_property = Property::where('user_id', 1)->get();
        // $property_count = $get_property->count();
        // $subscriber = Subscriber::where('user_id',$user_id)->first();


        $PropertyCategories = PropertyCategory::where('status',1)->get();

            return view('admin.sell_property',compact('property_types','bedrooms','property_status','property_sources','configurations','post_users','PropertyCategories'));

    }

    public function sell_property_store(Request $request){
        // dd($request->all());
        $request->validate([
            // 'property_type' => 'required',
            'property_cat'=>'required',
            'features'=>'required',
            'configuration' => 'sometimes|array',
            'configuration.*' => 'required',
            'property_area'=>'required',
            'property_name' => 'required|min:5|max:50',
            'property_location'=>'required|min:3|max:10',
            'price'=>'required|max:9',
            'property_source'=>'required',
            'property_status'=>'required',
            'seller_message' => 'required|min:10|max:350',
            'image'=>'required',
            'post_user'=>'required',
        ],[
            'configuration.*' => 'This field is required',
        ]);
        $feature = implode(',',$request->features);

        // $user_id = 0;
        // $get_property = Property::where('user_id', $user_id)->get();
        // $property_count = $get_property->count();
        // $subscriber = Subscriber::where('user_id',$user_id)->first();

        $abc = $request->features;
        $famenty = FeatureAmenities::where('category_id',$request->property_cat)->get();
        foreach($famenty as $key=>$value){
            if (in_array($value->feature, $abc)) {
                $foundValues[] = $value->image;
            }
        }
        $featureImage = implode(',',$foundValues);



        $jsonConfiguration = json_encode($request->configuration);


        $feature_image = PropertyCategory::where('id', $request->property_cat)->first();

        $images = $request->file('image');
        $myarray = [];
        foreach ($images as $image) {
            $tempName = uniqid('profile_', true) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('uploads', $tempName, 'public');
            array_push($myarray,$path);
        }
        $image_string = implode(",",$myarray);

        $code = $request->property_location;
        $pin_code = (int)$code;

        // code check
        $countryCode = 'IN'; // ISO 3166-1 alpha-2 country code for India
        $url = "https://nominatim.openstreetmap.org/?format=json&addressdetails=1&q={$code}&format=json&limit=1&countrycodes={$countryCode}";
            $client = new Client();
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);
            if($data == []){
                return response()->json(['status'=> 0,'key'=>'property_location','error'=>'Pin Code is Invalid']);
            }
            else{
                $arr = $data[0]['address'];
                $keysToRemove = ['country_code','ISO3166-2-lvl4','postcode','country'];
                $addressArray = array_diff_key($arr, array_flip($keysToRemove));
                $address = implode(',',$addressArray);
        $property = Property::create([
            'property_category'=>$request->property_cat,
            'property_name'=>$request->property_name,
            'property_location'=>$address,
            'property_status'=>$request->property_status,
            'property_source'=>$request->property_source,
            'area'=>$request->property_area,
            'description'=>$request->seller_message,
            'price'=>$request->price,
            'pin_code'=>$pin_code,
            'images'=>$image_string,
            'configuration'=>$jsonConfiguration,
            'features'=>$feature,
            'feature_image'=>$featureImage,
            'post_user'=>$request->post_user,
            'category_status'=>$request->seller_value,
            'bedroom'=>$request->Bedroom,
            'bathroom'=>$request->Bathroom,
          ]);
        //   dd('test');

          if($property){
            return response()->json(['status'=> 1,'success'=>'successful']);
          }
        }
    }

    public function all_property(){
        $properties = Property::join('property_categories', 'properties.property_category', '=', 'property_categories.id')
              ->join('property_sources', 'properties.property_source', '=', 'property_sources.id')
              ->join('property_status', 'properties.property_status', '=', 'property_status.id')
              ->get(['properties.id','property_categories.category_name as type','property_sources.name as source','property_status.name as status','properties.property_name','properties.property_location','properties.category_status']);
        return view('admin.properties',compact('properties'));
    }

    public function property_attribute(){
        $configurations = DB::table('configurations')->get();
        return view('admin.propertyAttribute',compact('configurations'));
    }

    public function store_attributes(Request $request){
            $checkboxValues = $request->input('config', []);
            $configuration = implode(',',$checkboxValues);
            $request->validate([
                'status' => 'max:35',
                'source' => 'max:35',
            ]);

            if(isset($request->source) ){
            $property_type = Property_source::create([
                'name'=>$request->source,
                'category'=>1,
            ]);
            }
            if(isset($request->status) ){
            $property_type = Property_status::create([
                'name'=>$request->status,
                'category'=>1
            ]);
            }
            return redirect()->back()->with('success', 'Data Saved Successfully.');

    }

        public function project_detail($ecryptedId){
            $id = decrypt($ecryptedId);
            $property_images = Property::where('id',$id)->first('images');
           $images = explode(',',$property_images->images);

            $property = Property::join('property_categories', 'properties.property_category', '=', 'property_categories.id')
              ->join('property_sources', 'properties.property_source', '=', 'property_sources.id')
              ->join('property_status', 'properties.property_status', '=', 'property_status.id')
              ->where('properties.id', $id)
              ->first(['properties.id','property_categories.category_name as type','property_sources.name as source','property_status.name as status','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price']);
           return view('admin.projectDetail',compact('property','images'));
        }

        public function configuration(){
         return view('admin.addConfiguration');
        }

        public function store_configuration(Request $request){

            $request->validate([
                'type' => 'required|max:20',
            ]);
            $result = implode(',', range(1, $request->quantity));
            $property_config = Configuration::create([
                'name'=>$request->type,
              ]);
            if($property_config){
                return redirect()->back();
            }
        }

        public function  addCity(){
            return view('admin.addFilterCity');
        }

        public function store_city(Request $request){
            $request->validate([
                'city' => 'required|max:20',
            ]);
            $city = City::create([
                'name'=> ucfirst($request->city),
            ]);
            if($city){
                return redirect()->back();
            }
        }

        public function addPostUser(){
            return view('admin.addPostUser');
        }

        public function storePostUser(Request $request){
            // dd($request->all());
            $request->validate([
                'post_user' => 'required|max:20',
            ]);
            $postuser = PostUser::create([
                'name'=> ucfirst($request->post_user),
                'slug'=> $request->post_user,
            ]);
            if($postuser){
                return redirect()->back();
            }
        }

        public function getService(){
            $assets = Service::where('status', 1)->get();
            $service_categories = ServiceCategory::get();
            return view('admin.services.Services',compact('assets','service_categories'));
        }

        public function storeService(Request $request){

            $request->validate([
                'title' => [
                    'required','string','max:150',
                ],
                'category'=>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description'=>'required',
            ]);
            $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $asset_image = $image->storeAs('uploads', $tempName, 'public');
            $assets = Service::create([
                'title'=>$request->title,
                'description'=> $request->description,
                'image'=>$asset_image,
                'category'=>$request->category,
                'status'=>1,
            ]);
            if($assets){
                return redirect()->back();
            }
        }

        public function removeService($id){
            $assetId = decrypt($id);
            $asset = Service::find($assetId);
            if ($asset) {
                $asset->status = 0;
                // Save the changes
                $asset->save();
                return redirect()->back();
            }
        }

        public function addTestimonial(){
           return view('admin.testimonial');
        }

        public function storeTestimonial(Request $request){
            $request->validate([
                'title' => [
                    'required','string','max:30',
                ],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description'=>'required',
            ]);
            $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $asset_image = $image->storeAs('uploads', $tempName, 'public');
            $testimonial = Testimonial::create([
                'name'=>$request->title,
                'message'=> $request->description,
                'image'=>$asset_image,
                'status'=>0,
            ]);
            if($testimonial){
                return redirect()->back();
            }
        }


        public function allServices(){
            $services = Service::join('service_categories','services.category','service_categories.id')
            ->where('services.status', 1)
            ->select('services.title','services.description','service_categories.category','services.id')->get();

            return view('admin.services.allServices',compact('services'));
        }

        public function getNews(){
            return view('admin.market_trends.addNews');
        }

        public function storeNews(Request $request){
            $request->validate([
                'title' => [
                    'required',
                ],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description'=>'required',
            ]);
            $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $news_image = $image->storeAs('uploads', $tempName, 'public');
            $currentDate = date('Y-m-d');
            $assets = News::create([
                'title'=>$request->title,
                'description'=> $request->description,
                'image'=>$news_image,
                'date'=>$currentDate,
                'category'=>$request->category,
                'status'=>1,
            ]);
            if($assets){
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
        }

        public function getMedia(){
            return view('admin.market_trends.addMedia');
        }

        public function storeMedia(Request $request){
            $request->validate([
                'title' => [
                    'required',
                ],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description'=>'required',
            ]);
            $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $media_image = $image->storeAs('uploads', $tempName, 'public');
            $currentDate = date('Y-m-d');
            $assets = Media::create([
                'title'=>$request->title,
                'description'=> $request->description,
                'image'=>$media_image,
                'date'=>$currentDate,
                'status'=>1,
            ]);
            if($assets){
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
        }

        public function getBlog(){
            return view('admin.market_trends.addBlog');
        }

        public function storeBlog(Request $request){
            $request->validate([
                'title' => [
                    'required',
                ],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description'=>'required',
            ]);
            $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $media_image = $image->storeAs('uploads', $tempName, 'public');
            $currentDate = date('Y-m-d');
            $assets = Blog::create([
                'title'=>$request->title,
                'description'=> $request->description,
                'image'=>$media_image,
                'date'=>$currentDate,
                'status'=>1,
            ]);
            if($assets){
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
        }

        public function getInsight(){
            return view('admin.market_trends.addInsight');
        }

        public function storeInsight(Request $request){
            $request->validate([
                'title' => [
                    'required',
                ],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description'=>'required',
            ]);
            $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $media_image = $image->storeAs('uploads', $tempName, 'public');
            $currentDate = date('Y-m-d');
            $assets = Insight::create([
                'title'=>$request->title,
                'description'=> $request->description,
                'image'=>$media_image,
                'date'=>$currentDate,
                'status'=>1,
            ]);
            if($assets){
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
        }


        function inquiryData(){
            $inquiries = InquiryData::all();
         return view('admin.inquiries',compact('inquiries'));
        }

        public function addCategory(){
            $configurations = DB::table('configurations')->get();
            return view('admin.addCategoy',compact('configurations'));
        }

        public function storeCategory(Request $request){
            // dd($request->all());
            //   $request->validate([
            //     'title' =>'required|string|max:50|unique:property_categories,category_name',
            // ]);
            $configuration =implode(',',$request->config);
            // $quantity =implode(',',$request->quantity);

                // dd($configuration);
            $category = PropertyCategory::create([
                'category_name'=>$request->title,
                'status'=>$request->category,
                'configuration'=>$configuration,
                // 'config_count'=>$quantity,
            ]);
            if($category){
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
        }

        public function addFeatureAmenities(){
            $pro_categories = PropertyCategory::all();
                return view('admin.addFeatureAmenities',compact('pro_categories'));
        }

        public function storeFeatureAmenities(Request $request){
            $request->validate([
                'category' =>'required',
                'feature_name.*'=>'required',
                'feature_image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
             $images = [];
            foreach ($request->file('feature_image') as $key => $image) {
                $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
                $assetImage = $image->storeAs('uploads', $tempName, 'public');
                $images[] = $assetImage;
            }
            $features = $request->feature_name;

            // $f_name = implode(',',$request->feature_name);
            // $f_image = implode(',',$images);
            foreach($features as $key => $value){
            $category = FeatureAmenities::create([
                'category_id'=>$request->property_cat,
                'feature'=>$value,
                'image'=>$images[$key],
                'status'=>'1',
            ]);
        }
            if($category){
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
        }

        public function getconfiguration(Request $request){
            $type = (int)$request->typeValue;

            $result = DB::table('property_categories')
                ->select('property_categories.id as catId','property_categories.category_name as type_name','property_categories.config_count','configurations.name')

                ->leftjoin('configurations', function ($join) {
                    $join->whereRaw("FIND_IN_SET(configurations.id, property_categories.configuration)");
                })
                ->where('property_categories.id', '=', $type)
                ->get();
             return response()->json($result);
        }

        public function getCategory(Request $request){
            $cat_status= PropertyCategory::where('status', $request->typeValue)->get();
            return response()->json($cat_status);

        }

        }

