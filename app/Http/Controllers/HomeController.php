<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\{Project, Property_source, Property_status, Property_Type, Bedroom, Property,City,PostUser,Subscriber,Testimonial,Service,Community,Feature,InquiryData,PropertyCategory,FeatureAmenities,News,Media,Blog,Insight};
use Session;
use GuzzleHttp\Client;
use DB;

class HomeController extends Controller
{
    public function index(){
        $projects = Property::orderBy('id', 'desc')
        ->take(6)
        ->get();
        $projects->each(function ($project) {
            $configurations = json_decode($project->configuration);
            $configArray = (array) $configurations;
            $project->configuration = $configArray;
    });
        $projects->each(function ($project) {
            $project->images = explode(',', $project->images);
        });

        $testimonials = Testimonial::take(5)->get();
      return view('frontend.home',compact('projects','testimonials'));
    }

    public function sell_property(){

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
        $user_id = Session::get('user_id');
        $get_property = Property::where('user_id', $user_id)->get();
        $property_count = $get_property->count();
        $subscriber = Subscriber::where('user_id',$user_id)->first();
        if (Session::has('user_id')) {

            return view('frontend.sell_property',compact('property_types','bedrooms','property_status','property_sources','configurations','post_users','property_count','subscriber'));
        }
        else{
            return redirect()->route('loginpage');
        }
    }



    function BuyPropertyList($id){
        $property_cat_id = decrypt($id);

        $property_status = Property_status::all();
        $cities = City::all();
        $post_users = PostUser::all();
        $property_type = PropertyCategory::where('id',$property_cat_id)->first();
        // dd($property_type);

        $properties = Property::join('property_categories', 'properties.property_category', '=', 'property_categories.id')
              ->join('property_status', 'properties.property_status', '=', 'property_status.id')
              ->where('properties.property_category',$property_cat_id)
              ->where('properties.category_status',1)
              ->select('properties.id','property_categories.category_name as type','property_status.name as status','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price','properties.images','properties.configuration')
              ->paginate(12);
        $properties->each(function ($property) {
            $configurations = json_decode($property->configuration);
            $configArray = (array) $configurations;
            $property->configuration = $configArray;
    });
        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
    });
        return view('frontend.propertyList',compact('post_users','cities','property_status','properties','property_type'));
    }

    function RentPropertyList($id){
        $property_cat_id =  decrypt($id);
        // dd($property_cat_id);
        $property_status = Property_status::all();
        $cities = City::all();
        $post_users = PostUser::all();
        $property_type = PropertyCategory::where('id',$property_cat_id)->first();
        $properties = Property::join('property_categories', 'properties.property_category', '=', 'property_categories.id')
              ->join('property_status', 'properties.property_status', '=', 'property_status.id')
              ->where('properties.property_category',$property_cat_id)
              ->where('properties.category_status',2)
              ->select('properties.id','property_categories.category_name as type','property_status.name as status','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price','properties.images','properties.configuration')
              ->paginate(12);
        $properties->each(function ($property) {
            $configurations = json_decode($property->configuration);
            $configArray = (array) $configurations;
            $property->configuration = $configArray;
    });
        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
    });
        return view('frontend.propertyList',compact('post_users','cities','property_status','properties','property_type'));
    }


    function PgPropertyList($id){
        // dd('test');
        $property_cat_id = decrypt($id);
        $property_status = Property_status::all();
        $cities = City::all();
        $post_users = PostUser::all();
        $property_type = PropertyCategory::where('id',$property_cat_id)->first();
        $properties = Property::join('property_categories', 'properties.property_category', '=', 'property_categories.id')
              ->join('property_status', 'properties.property_status', '=', 'property_status.id')
              ->where('properties.property_category',$property_cat_id)
              ->where('properties.category_status',3)
              ->select('properties.id','property_categories.category_name as type','property_status.name as status','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price','properties.images','properties.configuration')
              ->paginate(12);
        $properties->each(function ($property) {
            $configurations = json_decode($property->configuration);
            $configArray = (array) $configurations;
            $property->configuration = $configArray;
    });
        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
    });
        return view('frontend.propertyList',compact('post_users','cities','property_status','properties','property_type'));
    }

    function CommPropertyList($id){
        // dd('test');
        $property_cat_id = decrypt($id);
        $property_status = Property_status::all();
        $cities = City::all();
        $post_users = PostUser::all();
        $property_type = PropertyCategory::where('id',$property_cat_id)->first();
        $properties = Property::join('property_categories', 'properties.property_category', '=', 'property_categories.id')
              ->join('property_status', 'properties.property_status', '=', 'property_status.id')
              ->where('properties.property_category',$property_cat_id)
              ->where('properties.category_status',3)
              ->select('properties.id','property_categories.category_name as type','property_status.name as status','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price','properties.images','properties.configuration')
              ->paginate(12);
        $properties->each(function ($property) {
            $configurations = json_decode($property->configuration);
            $configArray = (array) $configurations;
            $property->configuration = $configArray;
    });
        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
    });
        return view('frontend.propertyList',compact('post_users','cities','property_status','properties','property_type'));
    }

    public function propertyDetail($id){
        $pro_id = decrypt($id);
        $property = Property:: join('property_categories', 'properties.property_category', '=', 'property_categories.id')
        ->join('property_sources', 'properties.property_source', '=', 'property_sources.id')
        ->join('property_status', 'properties.property_status', '=', 'property_status.id')
        ->where('properties.id', $pro_id)
        ->select('properties.id','property_categories.category_name as type','properties.property_category as type_id','property_sources.name as source','property_status.name as status','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price','properties.images','properties.features','properties.feature_image','properties.configuration')
        ->first();
        $property->images = explode(',', $property->images);

        $feature = $property->features;
        $feature_img = $property->feature_image;
        $featureArray = explode(',',$feature);
        $featureImgArray = explode(',',$feature_img);

        $features = [];
        foreach ($featureArray as $key => $value) {
            if (isset($featureImgArray[$key])) {
                $features[] = [$value, $featureImgArray[$key]];
            }
        }
        $jsonString = $property->configuration;
        $configArray = json_decode($jsonString, true);

        $configString = implode(', ', array_map(function ($key, $value) {
            return "$value $key";
        }, array_keys($configArray), $configArray));

        $similar_properties = Property::join('property_categories', 'properties.property_category', '=', 'property_categories.id')
              ->where('properties.property_category',$property->type_id)
              ->where('properties.id', '<>', $property->id)
              ->select('properties.id','property_categories.category_name as type','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price','properties.images','properties.configuration')
              ->take(4)
              ->get();
        $similar_properties->each(function ($similar_property) {
            $configurations = json_decode($similar_property->configuration);
            $configArray = (array) $configurations;
            $similar_property->configuration = $configArray;
    });
        $similar_properties->each(function ($similar_property) {
            $similar_property->images = explode(',', $similar_property->images);
    });
    // dd($similar_properties);

       return view('frontend.propertyDetail',compact('property','features','configString','similar_properties'));
    }

    public function getbedroom(Request $request){
        $minvalue = $request->input('min_area');
        $maxvalue = $request->input('max_area');
        $minBudget = $request->input('min_budget');
        $maxBudget = $request->input('max_budget');
        $location = $request->input('location');
        $configurations = $request->input('configurations');
        $categories = $request->input('category');
        $postBy = $request->input('post_user');
        $status = $request->input('construction_status');
        $bedroomArray = explode(',', $configurations['bedroom']);
        $bathroomArray = explode(',',$configurations['bathroom']);
        $categoryArray = explode(',', $categories);
        $postByArray = explode(',', $postBy);
        $statusArray = explode(',', $status);
        $cat_status_id  = $request->cat_status_id;
        $pro_cat_id  = $request->property_type;

        $properties = Property::join('property_categories', 'properties.property_category', '=', 'property_categories.id')
        ->join('property_status', 'properties.property_status', '=', 'property_status.id');

        if (isset($request->property_type)){
            $properties->where('properties.property_category', $request->property_type);
        } elseif (isset($request->cat_status_id)) {
            $properties->where('properties.category_status', $request->cat_status_id);
        }
        if(!empty($minBudget) && !empty($maxBudget)){
            $properties->whereBetween('properties.price', [$minBudget, $maxBudget]);
        }
        if(!empty($minvalue) && !empty($maxvalue)){
            $properties->whereBetween('properties.area', [$minvalue, $maxvalue]);
        }
        if (!empty($categoryArray[0])) {
            $properties->whereIn('properties.category', $categoryArray);
        }
        if (!empty($postByArray[0])) {
            $properties->whereIn('properties.post_user', $postByArray);
        }
        if (!empty($statusArray[0])) {
            $properties->whereIn('properties.property_status', $statusArray);
        }
        if (!empty($location)) {
            $locationArray = explode(',', $location);
            $properties->where(function ($query) use ($locationArray) {
                foreach ($locationArray as $loc) {
                    $query->orWhere('properties.property_location', 'LIKE', '%' . trim($loc) . '%');
                }
            });
        }
        if (!empty($bedroomArray[0])) {
            $properties->where(function ($query) use ($bedroomArray) {
                foreach ($bedroomArray as $bedroom) {
                    $query->orWhereJsonContains('properties.configuration->Bedroom', $bedroom);
                }
            });
        }
        if (!empty($bathroomArray[0])) {
            $properties->where(function ($query) use ($bathroomArray) {
                foreach ($bathroomArray as $bathroom) {
                    $query->orWhereJsonContains('properties.configuration->Bathroom', $bathroom);
                }
            });
        }
        if (isset($request->property_type)){
        $properties = $properties->select('properties.id','property_categories.category_name as type','property_status.name as status','properties.property_name','properties.property_location','properties.description','properties.area','properties.price','properties.configuration','properties.images')->get();
        }
        elseif (isset($request->cat_status_id)) {
            $properties = $properties->select('properties.id','property_categories.category_name as type','property_status.name as status','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price','properties.configuration','properties.images')->get();
        }

        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
            $property->encrptId = Crypt::encrypt($property->id);
        });
             return response()->json($properties);
    }

    public function getcategory(Request $request ){

        $properties = Property::join('property__types', 'properties.property_type', '=', 'property__types.id')
        ->join('property_status', 'properties.property_status', '=', 'property_status.id')
        ->where('properties.property_type',$request->property_type)
        ->where('properties.category',$request->category)
        ->select('properties.id','property__types.name as type','property_status.name as status','properties.porperty_name','properties.property_location','properties.category','properties.message','properties.area','properties.price','properties.bedroom','properties.bathroom','properties.images')
        ->get();
        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
            $property->encrptId = Crypt::encrypt($property->id);
        });
             return response()->json($properties);

    }

    public function getstatus(Request $request){
        $properties = Property::join('property__types', 'properties.property_type', '=', 'property__types.id')
        ->join('property_status', 'properties.property_status', '=', 'property_status.id')
        ->where('properties.property_type',$request->property_type)
        ->where('properties.property_status',$request->status)
        ->select('properties.id','property__types.name as type','property_status.name as status','properties.porperty_name','properties.property_location','properties.category','properties.message','properties.area','properties.price','properties.bedroom','properties.bathroom','properties.images')
        ->get();
        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
            $property->encrptId = Crypt::encrypt($property->id);
        });
             return response()->json($properties);
    }


    public function featureAmenities(Request $request){

        $type = (int)$request->typeValue;
        $feature_cat = PropertyCategory::where('id',$type)->first();
        $featureAmenities= FeatureAmenities::where('category_id', $feature_cat->id)->get();
        $featureArray = [];
        foreach($featureAmenities as $featureAmenity){
           array_push($featureArray, $featureAmenity->feature );
             }
         return response()->json($featureArray);
    }

    public function reviews(){
        $testimonials = Testimonial::get();
        return view('frontend.reviews',compact('testimonials'));
    }

    public function communities(){
        $communities = Community::all();
        return view('frontend.communities',compact('communities'));
    }

    public function commProperty($id){
        $comm_id = decrypt($id);
        $community = Community::find($comm_id);
        $features = Feature::where('community',$comm_id)->get();
        return view('frontend.communityPlace',compact('community','features'));
    }
    function storeInquiryData(Request $request){
        // dd($request->all());
        $request->validate([
            'Name' => [
                'required','string','max:50',
            ],
            'email'=>'required|email',
            'Number' => 'required|max:10|min:10',
            'message'=>'required',
        ]);
       $inquiry_data = InquiryData::create([
        'name'=>$request->Name,
        'email'=>$request->email,
        'phone'=>$request->Number,
        'description'=>$request->message,
        'property_id'=>$request->property_id,
       ]);
       if($inquiry_data){
        return response()->json(['status'=> 1,'success'=>'successful']);
       }
    }

    public function propertyList($id){
        $property_cat_status = decrypt($id);
        $property_status = Property_status::all();
        $cities = City::all();
        $post_users = PostUser::all();
        $property_cat_status_id = Property::where('category_status',$property_cat_status)->first();
        $properties = Property::join('property_categories', 'properties.property_category', '=', 'property_categories.id')
              ->join('property_status', 'properties.property_status', '=', 'property_status.id')
              ->where('properties.category_status',$property_cat_status)
              ->select('properties.id','property_categories.category_name as type','property_status.name as status','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price','properties.images','properties.configuration')
              ->paginate(12);
        $properties->each(function ($property) {
            $configurations = json_decode($property->configuration);
            $configArray = (array) $configurations;
            $property->configuration = $configArray;
    });
        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
    });
        return view('frontend.propertyList',compact('post_users','cities','property_status','properties','property_cat_status_id'));
    }

    public function news(){
        $news = News::where('status',1)->orderBy('id','desc')->get();
        return view('frontend.market_trends.news.News',compact('news'));
    }
    public function singleNews($id){
        $newsId = decrypt($id);

        $news = News::where('id',$newsId)->first();
        return view('frontend.market_trends.news.singleNews',compact('news'));
    }
    public function reports(){
        return view('frontend.market_trends.reports');
    }
    public function insights(){
        $insights = Insight::where('status',1)->orderBy('id','desc')->get();
        return view('frontend.market_trends.insight.insights',compact('insights'));
    }
    public function singleInsight($id){
        $insightId = decrypt($id);
        $insight = Insight::where('id',$insightId)->first();
        return view('frontend.market_trends.insight.singleInsight',compact('insight'));
    }
    public function media(){
        $media = Media::where('status',1)->orderBy('id','desc')->get();
        return view('frontend.market_trends.media.media',compact('media'));
    }
    public function singleMedia($id){
        $mediaId = decrypt($id);
        $media = Media::where('id',$mediaId)->first();
        return view('frontend.market_trends.media.singleMedia',compact('media'));
    }
    public function blog(){
        $blogs = Blog::where('status',1)->orderBy('id','desc')->get();
        return view('frontend.market_trends.blog.blogs',compact('blogs'));
    }
    public function singleBlog($id){
        $blogId = decrypt($id);
        $blog = Blog::where('id',$blogId)->first();
        return view('frontend.market_trends.blog.singleBlog',compact('blog'));
    }

    public function newsSearch(Request $request){
          $searchValue = $request->id;
          $newsData = News::orderBy('id','desc')
          ->where('title', 'like', '%' . $searchValue . '%')->get();
          return response()->json($newsData);
    }
    public function InsightSearch(Request $request){
        $searchValue = $request->id;
        $insightData = Insight::orderBy('id','desc')
        ->where('title', 'like', '%' . $searchValue . '%')->get();
        return response()->json($insightData);
    }
    public function BlogSearch(Request $request){
        $searchValue = $request->id;
        $blogData = Blog::orderBy('id','desc')
        ->where('title', 'like', '%' . $searchValue . '%')->get();
        return response()->json($blogData);
    }
    public function MediaSearch(Request $request){
        $searchValue = $request->id;
        $mediaData = Media::orderBy('id','desc')
        ->where('title', 'like', '%' . $searchValue . '%')->get();
        return response()->json($mediaData);
    }
}
