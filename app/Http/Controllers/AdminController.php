<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\{User,Project,Property_Type,Property_source,Property_status,Property,Configuration,City,PostUser,Service,Testimonial,ServiceCategory,Community,Feature,Bedroom,Subscriber,InquiryData,PropertyCategory,FeatureAmenities,News,Media,Blog,Insight,CompanyProfile,CompanyMessage,CorporateTeam};
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

    public function addCategory(){
        $configurations = DB::table('configurations')->get();
        $cat_data = PropertyCategory::join('main_categories','property_categories.status','main_categories.id')
        ->select('property_categories.id','category_name','title')
        ->get();
        return view('admin.addCategoy',compact('configurations','cat_data'));
    }

    public function storeCategory(Request $request){
        $request->validate([
          'title' =>'required|string|max:50',
          'category'=>'required',
      ]);
            if(isset($request->config)){
            $configuration =implode(',',$request->config);
            }
            $categoryData =[
                'category_name'=>$request->title,
                'status'=>$request->category,
            ];
            if (isset($configuration)) {
                $categoryData['configuration'] = $configuration;
            }
            $category = PropertyCategory::create($categoryData);
            if($category){
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
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

    public function addFeatureAmenities(){
        $pro_categories = PropertyCategory::all();
            return view('admin.addFeatureAmenities',compact('pro_categories'));
    }

    public function storeFeatureAmenities(Request $request){
            $request->validate([
                'category' =>'required',
                'category_name'=>'required',
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
            foreach($features as $key => $value){
            $category = FeatureAmenities::create([
                'category_id'=>$request->category_name,
                'feature'=>$value,
                'image'=>$images[$key],
                'status'=>'1',
            ]);
        }
            if($category){
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
        }

    public function add_property(){
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

        $PropertyCategories = PropertyCategory::where('status',1)->get();

        return view('admin.sell_property',compact('property_types','bedrooms','property_status','property_sources','configurations','post_users','PropertyCategories'));
    }

    public function store_property(Request $request){
        $request->validate([
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
            'seller_message' => 'required|min:10',
            'image'=>'required',
            'post_user'=>'required',
        ],[
            'configuration.*' => 'This field is required',
        ]);
        $feature = implode(',',$request->features);
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
        $property_status = Property_status::all();
        $property_source = Property_source::all();
        return view('admin.propertyAttribute',compact('property_status','property_source'));
    }

    public function store_attributes(Request $request){
        $request->validate([
            'status' => 'max:50',
            'source'=>'max:50',
          ]);
            $checkboxValues = $request->input('config', []);
            $configuration = implode(',',$checkboxValues);
            $request->validate([
                'status' => 'max:35',
                'source' => 'max:35',
            ]);

            if(isset($request->source) && !isset($request->status) ){
            $property_type = Property_source::create([
                'name'=>$request->source,
                'category'=>1,
            ]);
            return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
            if(isset($request->status) && !isset($request->source) ){
            $property_type = Property_status::create([
                'name'=>$request->status,
                'category'=>1
            ]);
            return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
            if(isset($request->source) && isset($request->status) ){
                $property_type = Property_source::create([
                    'name'=>$request->source,
                    'category'=>1,
                ]);
                $property_type = Property_status::create([
                    'name'=>$request->status,
                    'category'=>1
                ]);
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
            return redirect()->back()->with('success', 'Please submit atleast one value.');
    }

    public function deleteStatus($ecryptedId){
        $id = decrypt($ecryptedId);
        $property_status = Property_status::where('id',$id)->first();
        if ($property_status) {
            $property_status->delete();
            return redirect()->back()->with('success', 'Property Status Deleted Successfully.');
        }
    }

    public function deleteSource($ecryptedId){
        $id = decrypt($ecryptedId);
        $property_source = Property_source::where('id',$id)->first();
        if ($property_source) {
            $property_source->delete();
            return redirect()->back()->with('success', 'Property Source Deleted Successfully.');
        }
        }

    public function property_detail($ecryptedId){
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

        public function property_delete($ecryptedId){
            $id = decrypt($ecryptedId);
            $property = Property::where('id',$id)->first();
            if ($property) {
                $property->delete();
                return redirect()->back();
            }
        }



        public function  addCity(){
            $cities = City::all();
            return view('admin.addFilterCity',compact('cities'));
        }

        public function store_city(Request $request){
            $request->validate([
                'city' => 'required|max:40',
            ]);
            $city = City::create([
                'name'=> ucfirst($request->city),
            ]);
            if($city){
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
        }

        public function deleteCity($ecryptedId){
            $id = decrypt($ecryptedId);
            $city = City::where('id',$id)->first();
            if ($city) {
                $city->delete();
                return redirect()->back()->with('success', 'City Deleted Successfully.');
            }
        }

        public function addPostUser(){
            $postUsers = PostUser::all();
            return view('admin.addPostUser',compact('postUsers'));
        }

        public function storePostUser(Request $request){
            $request->validate([
                'post_user' => 'required|max:40',
            ]);
            $postuser = PostUser::create([
                'name'=> ucfirst($request->post_user),
                'slug'=> $request->post_user,
            ]);
            if($postuser){
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
        }

        public function deletePostUser($ecryptedId){
            $id = decrypt($ecryptedId);
            $postUser = PostUser::where('id',$id)->first();
            if ($postUser) {
                $postUser->delete();
                return redirect()->back()->with('success', 'Post User Deleted Successfully.');
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

         public function allTestimonial(){
           $testimonials = Testimonial::orderBy('id','desc')->get();
           return view('admin.allTestmonials',compact('testimonials'));
         }

         public function approveTestimonial($ecryptedId){
             $id = decrypt($ecryptedId);
             $testimonial = Testimonial::where('id',$id)->first();
             $testimonial->update([
                 'status' =>1,
             ]);
             return redirect()->back();
         }

         public function deleteTestimonial($ecryptedId){
             $id = decrypt($ecryptedId);
             $testimonial = Testimonial::where('id',$id)->first();
             if ($testimonial) {
                 $testimonial->delete();
                 return redirect()->back();
             }
         }

        public function getService(){
            $assets = Service::where('status', 1)
            ->get();
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


        public function allServices(){
            $services = Service::join('service_categories','services.category','service_categories.id')
            ->where('services.status', 1)
            ->select('services.title','services.description','service_categories.category','services.id')->get();

            return view('admin.services.allServices',compact('services'));
        }

        public function getNews(){
            return view('admin.market_trends.addNews');
        }

        public function News(){
            $news = News::orderBy('id','desc')->get();
            return view('admin.market_trends.news',compact('news'));
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

        public function deleteNews($ecryptedId){
            $id = decrypt($ecryptedId);
            $news = News::where('id',$id)->first();
            if ($news) {
                $news->delete();
                return redirect()->back();
            }
        }

        public function getMedia(){
            return view('admin.market_trends.addMedia');
        }
        public function Media(){
            $media = Media::orderBy('id','desc')->get();
            return view('admin.market_trends.media',compact('media'));
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
        public function deleteMedia($ecryptedId){
            $id = decrypt($ecryptedId);
            $media = Media::where('id',$id)->first();
            if ($media) {
                $media->delete();
                return redirect()->back();
            }
        }

        public function getBlog(){
            return view('admin.market_trends.addBlog');
        }

        public function Blog(){
            $blogs = Blog::orderBy('id','desc')->get();
            return view('admin.market_trends.blog',compact('blogs'));
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

        public function deleteBlog($ecryptedId){
            $id = decrypt($ecryptedId);
            $blog = Blog::where('id',$id)->first();
            if ($blog) {
                $blog->delete();
                return redirect()->back();
            }
        }

        public function Insight(){
            $insights = Insight::orderBy('id','desc')->get();
            return view('admin.market_trends.insight',compact('insights'));
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
            $inquiries = InquiryData::orderBy('id','desc')->get();
         return view('admin.inquiries',compact('inquiries'));
        }



        public function deleteCategory($ecryptedId){
            $id = decrypt($ecryptedId);
            $propertyCate = PropertyCategory::where('id',$id)->first();
            if ($propertyCate) {
                $propertyCate->delete();
                return redirect()->back();
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

        public function getCompanyProfile(){
            return view('admin.about.addCompanyProfile');
        }

        public function storeCompanyProfile(Request $request){
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
            $profileData = [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $media_image,
            ];

            if ($request->category == 1) {
                $profileData['status'] = 1;
            } elseif ($request->category == 2) {
                $profileData['status'] = 2;
            }
            $profile = CompanyProfile::create($profileData);

            if($profile){
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
        }

        public function getCompanyMessageCeo(){
            $message = CompanyMessage::where('status',1)->first();
            return view('admin.about.Message',compact('message'));
                }

        public function getCompanyMessageChairman(){
            $message = CompanyMessage::where('status',2)->first();
            return view('admin.about.Message',compact('message'));
                }

        public function editCompanyMessage($id){
            $mainId = decrypt($id);
            $profile = CompanyMessage::where('status',$mainId)->first();
            return view('admin.about.editMessage',compact('profile'));
        }

        public function updateCompanyMessage(Request $request){
            $request->validate([
                'name' => [
                    'required',
                ],
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'message'=>'required',
            ]);
            $category = CompanyMessage::where('status', $request->status)->first();
            if(isset($request->image)){
                $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $image = $image->storeAs('uploads', $tempName, 'public');
            }
            else{
                $image = $category->image;
            }
            if ($category) {
                $profile = $category->update([
                    'name' =>$request->name,
                    'image'=>$image,
                    'message'=>$request->message,
                    'status' =>$request->status,
                ]);
                if($profile){
                    return redirect()->back()->with('success', 'Update Successfully.');
                }
            }
            else{
                return redirect()->back()->with('success', 'Someting went wrong.');
            }
        }

        public function addCorporateTeam(){
            return view('admin.about.addCorporateTeam');
        }

        public function storeCorporateTeam(Request $request){
            $request->validate([
                'name' => [
                    'required',
                ],
                'role'=>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $media_image = $image->storeAs('uploads', $tempName, 'public');
            $teamData = [
                'name' => $request->name,
                'role' => $request->role,
                'image' => $media_image,
                'status'=>1,
            ];
            $profile = CorporateTeam::create($teamData);

            if($profile){
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }

        }

        }

