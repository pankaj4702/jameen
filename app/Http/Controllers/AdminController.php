<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\{Property_source,Property_status,Property,Configuration,City,PostUser,Service,Testimonial,ServiceCategory,InquiryData,PropertyCategory,FeatureAmenities,News,Media,Blog,Insight,CompanyProfile,CompanyMessage,CorporateTeam,Faq,TeamHeading,MainSection,AboutSection,CompanyLogo,CheckoutSection,BlogSection,Admin_user};
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

    public function adminProfile(){
        $data = Admin_user::first();
        return view('admin.profile',compact('data'));
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
          'category' =>'required|string|max:50',
          'main_category'=>'required',
      ]);
            if(isset($request->config)){
            $configuration =implode(',',$request->config);
            }
            $categoryData =[
                'category_name'=>$request->category,
                'status'=>$request->main_category,
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

    public function delete_configuration($id){
       $mainId = decrypt($id);
       $property_config = Configuration::where('id',$mainId)->first();
       if ($property_config) {
           $property_config->delete();
           return redirect()->back();
       }

    }

    public function addFeatureAmenities(){
        $pro_categories = PropertyCategory::orderBy('feature_amenities.id','desc')
        ->select('feature_amenities.id as featureId','feature_amenities.feature','property_categories.category_name','main_categories.title','feature_amenities.image')
        ->leftjoin('feature_amenities','property_categories.id','feature_amenities.category_id')
        ->leftjoin('main_categories','property_categories.status','main_categories.id')
        ->get();
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

        public function deleteFeature($ecryptedId){
            $id = decrypt($ecryptedId);
            $property_feature = FeatureAmenities::where('id',$id)->first();
            if ($property_feature) {
                $property_feature->delete();
                return redirect()->back()->with('success', 'Property Feature Deleted Successfully.');
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
        $property_status =Property_status::all();
        $property_sources =Property_source::all();
        $property_sources =Property_source::all();
        $post_users =PostUser::all();

        $PropertyCategories = PropertyCategory::where('status',1)->get();

        return view('admin.sell_property',compact('property_status','property_sources','post_users','PropertyCategories'));
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
              ->leftjoin('property_status', 'properties.property_status', '=', 'property_status.id')
              ->get(['properties.id','property_categories.category_name as type','property_status.name as status','properties.property_name','properties.property_location','properties.category_status']);
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
              ->leftjoin('property_status', 'properties.property_status', '=', 'property_status.id')
              ->where('properties.id', $id)
              ->first(['properties.id','property_categories.category_name as type','property_status.name as status','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price']);
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
                 return redirect()->back()->with('success', 'Data Saved Successfully.');;
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
                    'required','string','max:100',
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
                return redirect()->back()->with('success', 'Data Saved Successfully.');;
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
            return view('admin.market_trends.news.addNews');
        }

        public function News(){
            $news = News::orderBy('id','desc')->get();
            return view('admin.market_trends.news.news',compact('news'));
        }

        public function storeNews(Request $request){
            $request->validate([
                'title' => [
                    'required','string','max:150',
                ],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => [
                    function ($attribute, $value, $fail) {
                        if ($value === '<p>&nbsp;</p>') {
                            $fail($attribute.' is required.');
                        }
                    },
                ],
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
        public function editNews($id){
            $mainId = decrypt($id);
            $data = News::find($mainId);
            // dd($data);
            return view('admin.market_trends.news.editNews',compact('data'));
        }

        public function updateNews(Request $request){
            // dd($request->all());
            $request->validate([
                'title' => [
                    'required','string','max:150',
                ],
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => [
                    function ($attribute, $value, $fail) {
                        if ($value === '<p>&nbsp;</p>') {
                            $fail($attribute.' is required.');
                        }
                    },
                ],
            ]);
            $data = News::find($request->dataId);
            if($request->hasFile('image')) {
            $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $news_image = $image->storeAs('uploads', $tempName, 'public');
             }
            else{
                $news_image = $data->image;
            }
            $currentDate = date('Y-m-d');

            $assets = $data->update([
                'title'=>$request->title,
                'description'=> $request->description,
                'image'=>$news_image,
                'date'=>$currentDate,
                'category'=>$request->category,
                'status'=>1,
            ]);
            if($assets){
                return redirect()->back()->with('success', 'Data Updated Successfully.');
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
            return view('admin.market_trends.media.addMedia');
        }
        public function Media(){
            $media = Media::orderBy('id','desc')->get();
            return view('admin.market_trends.media.media',compact('media'));
        }

        public function storeMedia(Request $request){
            $request->validate([
                'title' => [
                    'required','string','max:150',
                ],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => [
                    function ($attribute, $value, $fail) {
                        if ($value === '<p>&nbsp;</p>') {
                            $fail($attribute.' is required.');
                        }
                    },
                ],
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

        public function editMedia($id){
            $mainId = decrypt($id);
            $data = Media::find($mainId);
            // dd($data);
            return view('admin.market_trends.media.editMedia',compact('data'));
        }

        public function updateMedia(Request $request){
            $request->validate([
                'title' => [
                    'required','string','max:150',
                ],
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => [
                    function ($attribute, $value, $fail) {
                        if ($value === '<p>&nbsp;</p>') {
                            $fail($attribute.' is required.');
                        }
                    },
                ],
            ]);
            $data = Media::find($request->dataId);
            if($request->hasFile('image')) {
            $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $news_image = $image->storeAs('uploads', $tempName, 'public');
             }
            else{
                $news_image = $data->image;
            }
            $currentDate = date('Y-m-d');

            $assets = $data->update([
                'title'=>$request->title,
                'description'=> $request->description,
                'image'=>$news_image,
                'date'=>$currentDate,
                'category'=>$request->category,
                'status'=>1,
            ]);
            if($assets){
                return redirect()->back()->with('success', 'Data Updated Successfully.');
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
            return view('admin.market_trends.blog.addBlog');
        }

        public function Blog(){
            $blogs = Blog::orderBy('id','desc')->get();
            return view('admin.market_trends.blog.blog',compact('blogs'));
        }

        public function storeBlog(Request $request){
            $request->validate([
                'title' => [
                    'required','string','max:150',
                ],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => [
                    function ($attribute, $value, $fail) {
                        if ($value === '<p>&nbsp;</p>') {
                            $fail($attribute.' is required.');
                        }
                    },
                ],
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

        public function editBlog($id){
            $mainId = decrypt($id);
            $data = Blog::find($mainId);
            // dd($data);
            return view('admin.market_trends.blog.editBlog',compact('data'));
        }

        public function updateBlog(Request $request){
            $request->validate([
                'title' => [
                    'required','string','max:150',
                ],
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => [
                    function ($attribute, $value, $fail) {
                        if ($value === '<p>&nbsp;</p>') {
                            $fail($attribute.' is required.');
                        }
                    },
                ],
            ]);
            $data = Blog::find($request->dataId);
            if($request->hasFile('image')) {
            $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $news_image = $image->storeAs('uploads', $tempName, 'public');
             }
            else{
                $news_image = $data->image;
            }
            $currentDate = date('Y-m-d');

            $assets = $data->update([
                'title'=>$request->title,
                'description'=> $request->description,
                'image'=>$news_image,
                'date'=>$currentDate,
                'category'=>$request->category,
                'status'=>1,
            ]);
            if($assets){
                return redirect()->back()->with('success', 'Data Updated Successfully.');
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
            return view('admin.market_trends.insight.insight',compact('insights'));
        }

        public function getInsight(){
            return view('admin.market_trends.insight.addInsight');
        }

        public function storeInsight(Request $request){
            $request->validate([
                'title' => [
                    'required','string','max:150',
                ],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => [
                    function ($attribute, $value, $fail) {
                        if ($value === '<p>&nbsp;</p>') {
                            $fail($attribute.' is required.');
                        }
                    },
                ],
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

        public function editInsight($id){
            $mainId = decrypt($id);
            $data = Insight::find($mainId);
            return view('admin.market_trends.insight.editInsight',compact('data'));
        }

        public function updateInsight(Request $request){
            $request->validate([
                'title' => [
                    'required','string','max:150',
                ],
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => [
                    function ($attribute, $value, $fail) {
                        if ($value === '<p>&nbsp;</p>') {
                            $fail($attribute.' is required.');
                        }
                    },
                ],
            ]);
            $data = Insight::find($request->dataId);
            if($request->hasFile('image')) {
            $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $news_image = $image->storeAs('uploads', $tempName, 'public');
             }
            else{
                $news_image = $data->image;
            }
            $currentDate = date('Y-m-d');

            $assets = $data->update([
                'title'=>$request->title,
                'description'=> $request->description,
                'image'=>$news_image,
                'date'=>$currentDate,
                'category'=>$request->category,
                'status'=>1,
            ]);
            if($assets){
                return redirect()->back()->with('success', 'Data Updated Successfully.');
            }

        }


        public function deleteInsight($ecryptedId){
            $id = decrypt($ecryptedId);
            $Insight = Insight::where('id',$id)->first();
            if ($Insight) {
                $Insight->delete();
                return redirect()->back();
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
                    'required','string','max:150',
                ],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => [
                    function ($attribute, $value, $fail) {
                        if ($value === '<p>&nbsp;</p>') {
                            $fail($attribute.' is required.');
                        }
                    },
                ],
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

        public function allProfile(){
            $c_profiles = CompanyProfile::orderBy('id','desc')->get();
            return view('admin.about.profiles',compact('c_profiles'));
        }

        public function removeProfile($id){
            $assetId = decrypt($id);
            $c_profile = CompanyProfile::where('id',$assetId)->first();
            if ($c_profile) {
                $c_profile->delete();
                return redirect()->back();
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
                    'required','string','max:50',
                ],
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'message' => [
                    function ($attribute, $value, $fail) {
                        if ($value === '<p>&nbsp;</p>') {
                            $fail($attribute.' is required.');
                        }
                    },
                ],
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

        public function getCorporateTeam(){
            $teams = CorporateTeam::orderBy('id','desc')->get();
            return view('admin.about.corporateTeam',compact('teams'));
        }

        public function addCompanyProfile(){
            return view('admin.about.addCorporateTeam');
        }

        public function storeCorporateTeam(Request $request){
            $request->validate([
                'name' => [
                    'required','string','max:50',
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

        public function removeTeam($id){
            $assetId = decrypt($id);
            $team = CorporateTeam::where('id',$assetId)->first();
            if ($team) {
                $team->delete();
                return redirect()->back();
            }
        }

        public function corporateTeamHeading(){
            $teamHeading = TeamHeading::first();
          return view('admin.about.corporateTeamHeading',compact('teamHeading'));
        }

        public function storeCorporateHeading(Request $request){
            $request->validate([
                'title' => [
                    'required','string','max:150',
                ],
                'description' => [
                    function ($attribute, $value, $fail) {
                        if ($value === '<p>&nbsp;</p>') {
                            $fail($attribute.' is required.');
                        }
                    },
                ],
            ]);
            $image = $request->file('image');
            if(!isset($image)){
                $teamHeading = TeamHeading::first();
              $media_image = $teamHeading->image;
            }
            else{
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $media_image = $image->storeAs('uploads', $tempName, 'public');
            }
            $teamHeading = TeamHeading::first();
             $teamHeading->update([
                 'title' =>$request->title,
                 'image'=>$media_image,
                 'description'=>$request->description,
             ]);
             return redirect()->back()->with('success', 'Data Updated Successfully.');;
        }

        public function faq(){
            $faqs = Faq::join('service_categories','faqs.service_category','service_categories.id')
            ->orderBy('faqs.id','desc')
            ->select('faqs.id','faqs.title','faqs.description','category')
            ->get();
            return view('admin.faq.faq',compact('faqs'));
        }

        public function addFaq(){
            $service_categories = ServiceCategory::where('id','!=',7)->get();
            return view('admin.faq.addFaq',compact('service_categories'));
        }

        public function storeFaq(Request $request){
            $request->validate([
                'title' => [
                    'required','string','max:150',
                ],
                'category'=>'required',
                'description' => 'required',
            ]);
            $faq = [
                'title' => $request->title,
                'description' => $request->description,
                'service_category' => $request->category,
            ];
            $store_faq = Faq::create($faq);

            if($store_faq){
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
        }

        public function deletefaq($id){
            $mainId = decrypt($id);
            $faq = Faq::where('id',$mainId)->first();
            if ($faq) {
                $faq->delete();
                return redirect()->back();
            }
        }

        public function mainSection(){
            $section = MainSection::first();
            $sectionImages = explode(',',$section->images);
            return view('admin.home.mainSection',compact('section','sectionImages'));
        }

        public function storeMainSection(Request $request){
            $request->validate([
                'main_heading' => [
                    'required','string','max:50',
                ],
                'description' => 'required',
            ]);
            $data = MainSection::find($request->sectionId);
            $images = '';
            if ($request->hasFile('image')) {
                // dd($request->file('image'));
                $keys = array_keys($request->file('image'));


            $myImages = explode(',', $data->images);
            foreach ($keys as $key) {
                $tempName = uniqid('asset_', true) . '.' . $request->file('image')[$key]->getClientOriginalExtension();
                $assetImage = $request->file('image')[$key]->storeAs('uploads', $tempName, 'public');

                $myImages[$key] = $assetImage;
                // dd($myImage);
            }
            $updatedImages = implode(',', $myImages);
            $images = $updatedImages;
        }
        else{
            $images = $data->images;
        }

            $section = $data->update([
                'main_heading'=>$request->main_heading,
                'description'=> $request->description,
                'images'=>$images,
            ]);
            if($section){
                return redirect()->back()->with('success', 'Data Updated Successfully.');
            }

        }

        public function deleteMainImage($id){
            $data = MainSection::first();
            $imageArray = explode(',',$data->images);
            unset($imageArray[$id]);
            $images = implode(',',$imageArray);
            $section = $data->update([
                'images'=>$images,
            ]);
            if($section){
                return redirect()->back()->with('success', 'Deleted Successfully.');
            }
        }

        public function aboutSection(){

            $section = AboutSection::first();
            $sectionImages = explode(',',$section->images);
            // dd($sectionImages);
            return view('admin.home.aboutSection',compact('section','sectionImages'));
        }

        public function updateAboutSection(Request $request){
            $request->validate([
                'main_heading' => [
                    'required','string','max:50',
                ],
                'description' => 'required',
            ]);
            $data = AboutSection::first();
            $images = '';
            if ($request->hasFile('image')) {
                // dd($request->file('image'));
                $keys = array_keys($request->file('image'));


            $myImages = explode(',', $data->images);
            foreach ($keys as $key) {
                $tempName = uniqid('asset_', true) . '.' . $request->file('image')[$key]->getClientOriginalExtension();
                $assetImage = $request->file('image')[$key]->storeAs('uploads', $tempName, 'public');

                $myImages[$key] = $assetImage;
                // dd($myImage);
            }
            $updatedImages = implode(',', $myImages);
            $images = $updatedImages;
            }
             else
             {
            $images = $data->images;
            }
          $section = $data->update([
            'main_heading'=>$request->main_heading,
            'description'=> $request->description,
            'images'=>$images,
            ]);
            if($section){
                 return redirect()->back()->with('success', 'Data Updated Successfully.');
            }
        }

        public function companyLogoSection(){
            $section = CompanyLogo::first();
            $sectionImages = explode(',',$section->images);
            return view('admin.home.companyLogo',compact('section','sectionImages'));

        }

        public function updateCompanyLoog(Request $request){
            // dd($request->all());
            $request->validate([
                'title' => [
                    'required','string','max:100',
                ],
            ]);
            $data = CompanyLogo::first();
            $images = '';
            if ($request->hasFile('image')) {
                // dd($request->file('image'));
                $keys = array_keys($request->file('image'));


            $myImages = explode(',', $data->images);
            foreach ($keys as $key) {
                $tempName = uniqid('asset_', true) . '.' . $request->file('image')[$key]->getClientOriginalExtension();
                $assetImage = $request->file('image')[$key]->storeAs('uploads', $tempName, 'public');

                $myImages[$key] = $assetImage;
            }
            $updatedImages = implode(',', $myImages);
            $images = $updatedImages;
            }
            else{
                $images = $data->images;
            }

            $section = $data->update([
                'title'=>$request->title,
                'images'=>$images,
            ]);
            if($section){
                return redirect()->back()->with('success', 'Data Updated Successfully.');
            }
        }

        public function deleteCompanyLogo($id){
            $data = CompanyLogo::first();
            $imageArray = explode(',',$data->images);
            unset($imageArray[$id]);
            $images = implode(',',$imageArray);
            $section = $data->update([
                'images'=>$images,
            ]);
            if($section){
                return redirect()->back()->with('success', 'Deleted Successfully.');
            }
        }

        public function checkoutSection(){
            $section = CheckoutSection::first();
            $sectionImages = explode(',',$section->images);
            $cities = City::all();

            $abc = explode(',',$section->city_id);
            $cityData = [];

            foreach ($abc as $cityId) {
                foreach ($cities as $city) {
                    if ($city->id == $cityId) {
                        $cityData[] = [
                            'cityid' => $city->id,
                            'cityname' => $city->name
                        ];
                        break;
                    }
                }
            }
        // dd($cityData);
            return view('admin.home.checoutSection',compact('section','sectionImages','cities','cityData'));
        }

        public function updateCheckoutSection(Request $request){

            // dd( implode(',',$request->city));
            $request->validate([
                'main_heading' => [
                    'required','string','max:50',
                ],
                'description' => 'required',
            ]);
            $data = CheckoutSection::first();
            $images = '';
            if ($request->hasFile('image')) {
                // dd($request->file('image'));
                $keys = array_keys($request->file('image'));


            $myImages = explode(',', $data->images);
            foreach ($keys as $key) {
                $tempName = uniqid('asset_', true) . '.' . $request->file('image')[$key]->getClientOriginalExtension();
                $assetImage = $request->file('image')[$key]->storeAs('uploads', $tempName, 'public');

                $myImages[$key] = $assetImage;
                // dd($myImage);
            }
            $updatedImages = implode(',', $myImages);
            $images = $updatedImages;
            }
             else
             {
            $images = $data->images;
            }
            $cityIds = implode(',',$request->city);
            // dd($cityIds);
          $section = $data->update([
            'main_heading'=>$request->main_heading,
            'description'=> $request->description,
            'images'=>$images,
            'city_id'=>$cityIds,
            ]);
            if($section){
                 return redirect()->back()->with('success', 'Data Updated Successfully.');
            }
        }

        public function blogSection(){
            $section = BlogSection::first();
            $sectionImages = explode(',',$section->images);

            return view('admin.home.blogSection',compact('sectionImages'));
        }

        public function updateBlogSection(Request $request){
            // dd($request->all());
            $data = BlogSection::first();
            $images = '';
            if ($request->hasFile('image')) {
                $keys = array_keys($request->file('image'));

            $myImages = explode(',', $data->images);
            foreach ($keys as $key) {
                $tempName = uniqid('asset_', true) . '.' . $request->file('image')[$key]->getClientOriginalExtension();
                $assetImage = $request->file('image')[$key]->storeAs('uploads', $tempName, 'public');

                $myImages[$key] = $assetImage;
            }
            $updatedImages = implode(',', $myImages);
            $images = $updatedImages;
            }
             else
             {
            $images = $data->images;
            }
          $section = $data->update([
            'images'=>$images,
            ]);
            if($section){
                 return redirect()->back()->with('success', 'Data Updated Successfully.');
            }
        }

        public function updateProfile(Request $request){
            // dd($request->all());
            $request->validate([
                'name' => [
                    'required','string','max:50',
                ],
              ]);
            $data = Admin_user::first();
            if($request->new_password !== null && $request->current_password !== null ){
                if (Hash::check($request->current_password, $data->password)) {
                    $request->validate([
                        'new_password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'],

                      ]);
                    $hashedPassword = Hash::make($request->new_password);
                    $section = $data->update([
                        'name'=>$request->name,
                        'email'=>$data->email,
                        'password'=>$hashedPassword,
                        'status'=>1,
                        ]);
            return redirect()->back()->with('success','Profile Updated Successfully.');

                } else {
                    return redirect()->back()->with('error','Current password not match.');
                }

            }
            $section = $data->update([
                'name'=>$request->name,
                'email'=>$data->email,
                'password'=>$data->password,
                'status'=>1,
                ]);
            return redirect()->back()->with('success','Profile Updated Successfully.');

        }



        }

