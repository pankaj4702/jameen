<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\{Property_status,Property,City,PostUser,Testimonial,InquiryData,PropertyCategory,FeatureAmenities,News,Media,Blog,Insight,CompanyProfile,CompanyMessage,CorporateTeam,TeamHeading};
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
        $testimonials = Testimonial::orderBy('id','desc')->take(5)->where('status',1)->get();
      return view('frontend.home',compact('projects','testimonials'));
    }

    public function propertyList($id){
        $property_cat_status = decrypt($id);
        $property_status = Property_status::all();
        $cities = City::all();
        $post_users = PostUser::all();
        $property_cat_status_id = Property::where('category_status',$property_cat_status)->first();
        $properties = Property::join('property_categories', 'properties.property_category', '=', 'property_categories.id')
              ->leftjoin('property_status', 'properties.property_status', '=', 'property_status.id')
              ->where('properties.category_status',$property_cat_status)
              ->select('properties.id','property_categories.category_name as type','property_status.name as status','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price','properties.images','properties.configuration')
              ->paginate(21);
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

    function BuyPropertyList($id){
        $property_cat_id = decrypt($id);

        $property_status = Property_status::all();
        $cities = City::all();
        $post_users = PostUser::all();
        $property_type = PropertyCategory::where('id',$property_cat_id)->first();
        $properties = Property::join('property_categories', 'properties.property_category', '=', 'property_categories.id')
              ->leftjoin('property_status', 'properties.property_status', '=', 'property_status.id')
              ->where('properties.property_category',$property_cat_id)
              ->where('properties.category_status',1)
              ->select('properties.id','property_categories.category_name as type','property_status.name as status','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price','properties.images','properties.configuration')
              ->paginate(21);
        $properties->each(function ($property) {
            $configurations = json_decode($property->configuration);
            $configArray = (array) $configurations;
            $property->configuration = $configArray;
    });
        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
    });
        $cat_name = 'Buy';
        return view('frontend.propertyList',compact('cat_name','post_users','cities','property_status','properties','property_type'));
    }

    function RentPropertyList($id){
        $property_cat_id =  decrypt($id);
        $property_status = Property_status::all();
        $cities = City::all();
        $post_users = PostUser::all();
        $property_type = PropertyCategory::where('id',$property_cat_id)->first();
        $properties = Property::join('property_categories', 'properties.property_category', '=', 'property_categories.id')
              ->leftjoin('property_status', 'properties.property_status', '=', 'property_status.id')
              ->where('properties.property_category',$property_cat_id)
              ->where('properties.category_status',2)
              ->select('properties.id','property_categories.category_name as type','property_status.name as status','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price','properties.images','properties.configuration')
              ->paginate(21);
        $properties->each(function ($property) {
            $configurations = json_decode($property->configuration);
            $configArray = (array) $configurations;
            $property->configuration = $configArray;
    });
        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
    });
    $cat_name = 'Rent';
        return view('frontend.propertyList',compact('cat_name','post_users','cities','property_status','properties','property_type'));
    }


    function PgPropertyList($id){
        $property_cat_id = decrypt($id);
        $property_status = Property_status::all();
        $cities = City::all();
        $post_users = PostUser::all();
        $property_type = PropertyCategory::where('id',$property_cat_id)->first();
        $properties = Property::join('property_categories', 'properties.property_category', '=', 'property_categories.id')
              ->leftjoin('property_status', 'properties.property_status', '=', 'property_status.id')
              ->where('properties.property_category',$property_cat_id)
              ->where('properties.category_status',3)
              ->select('properties.id','property_categories.category_name as type','property_status.name as status','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price','properties.images','properties.configuration')
              ->paginate(21);
        $properties->each(function ($property) {
            $configurations = json_decode($property->configuration);
            $configArray = (array) $configurations;
            $property->configuration = $configArray;
    });
        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
    });
    $cat_name = 'PG';
        return view('frontend.propertyList',compact('cat_name','post_users','cities','property_status','properties','property_type'));
    }

    function CommPropertyList($id){
        $property_cat_id = decrypt($id);
        $property_status = Property_status::all();
        $cities = City::all();
        $post_users = PostUser::all();
        $property_type = PropertyCategory::where('id',$property_cat_id)->first();
        $properties = Property::join('property_categories', 'properties.property_category', '=', 'property_categories.id')
              ->leftjoin('property_status', 'properties.property_status', '=', 'property_status.id')
              ->where('properties.property_category',$property_cat_id)
              ->where('properties.category_status',4)
              ->select('properties.id','property_categories.category_name as type','property_status.name as status','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price','properties.images','properties.configuration')
              ->paginate(21);
        $properties->each(function ($property) {
            $configurations = json_decode($property->configuration);
            $configArray = (array) $configurations;
            $property->configuration = $configArray;
    });
        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
    });
    $cat_name = 'Commercial';
        return view('frontend.propertyList',compact('cat_name','post_users','cities','property_status','properties','property_type'));
    }

    public function propertyDetail($id){
        $pro_id = decrypt($id);
        $property = Property:: join('property_categories', 'properties.property_category', '=', 'property_categories.id')
        ->leftjoin('property_status', 'properties.property_status', '=', 'property_status.id')
        ->where('properties.id', $pro_id)
        ->select('properties.id','property_categories.category_name as type','properties.property_category as type_id','property_status.name as status','properties.property_name','properties.property_location','properties.category_status','properties.description','properties.area','properties.price','properties.images','properties.features','properties.feature_image','properties.configuration')
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
       return view('frontend.propertyDetail',compact('property','features','configString','similar_properties'));
    }

    public function propertyFilter(Request $request){
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
        $statusArray = explode(',', $status);
        $cat_status_id  = $request->cat_status_id;
        $pro_cat_id  = $request->property_type;
        $bedroom = $configurations['bedroom'];
        $bathroom = $configurations['bathroom'];


        $propertyArray = [$bedroom,$bathroom,$minvalue,$maxvalue,$minBudget,$maxBudget,$categories,$postBy,$status,$location];  
        $isNull = true;
        foreach ($propertyArray as $value) {
            if ($value !== null) {
                $isNull = false;
                // break;
            }
        }
        if($isNull == false){

        $properties = Property::join('property_categories', 'properties.property_category', '=', 'property_categories.id')
        ->leftjoin('property_status', 'properties.property_status', '=', 'property_status.id');

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
        if (!empty($postBy)) {
            $postByArray = explode(',',$postBy);
            $properties->where(function ($query) use ($postByArray) {
                foreach ($postByArray as $loc) {
                    $query->orWhere('properties.post_user', $loc);
                }
            });
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
    else{
        $properties = '';
        return response()->json($properties);
    }

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
        $testimonials = Testimonial::orderBy('id','desc')->where('status', 1)->get();
        return view('frontend.reviews',compact('testimonials'));
    }

    function storeInquiryData(Request $request){
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
          $newsData->each(function ($data) {
            $data->encrptId = Crypt::encrypt($data->id);
        });
          return response()->json($newsData);
    }
    public function InsightSearch(Request $request){
        $searchValue = $request->id;
        $insightData = Insight::orderBy('id','desc')
        ->where('title', 'like', '%' . $searchValue . '%')->get();
        $insightData->each(function ($data) {
            $data->encrptId = Crypt::encrypt($data->id);
        });

        return response()->json($insightData);
    }
    public function BlogSearch(Request $request){
        $searchValue = $request->id;
        $blogData = Blog::orderBy('id','desc')
        ->where('title', 'like', '%' . $searchValue . '%')->get();
        $blogData->each(function ($data) {
            $data->encrptId = Crypt::encrypt($data->id);
        });
        return response()->json($blogData);
    }
    public function MediaSearch(Request $request){
        $searchValue = $request->id;
        $mediaData = Media::orderBy('id','desc')
        ->where('title', 'like', '%' . $searchValue . '%')->get();
        $mediaData->each(function ($data) {
            $data->encrptId = Crypt::encrypt($data->id);
        });
        return response()->json($mediaData);
    }

    public function companyProfile(){
        $profiles = CompanyProfile::where('status',1)->get();
        $features = CompanyProfile::where('status',2)->get();
        return view('frontend.about.companyProfile',compact('profiles','features'));
    }
    public function chairmanMessage(){
        $profile = CompanyMessage::where('status',2)->first();
        return view('frontend.about.chairmanMessage',compact('profile'));
    }
    public function ceoMessage(){
        $profile = CompanyMessage::where('status',1)->first();
       return view('frontend.about.ceoMessage',compact('profile'));
    }
    public function corporateTeam(){
        $teams = CorporateTeam::where('status',1)->get();
        $teamHeading = TeamHeading::first();
        return view('frontend.about.corporateTeam',compact('teams','teamHeading'));

    }

    public function privacyPolicy(){
      return view('frontend.privacy');
    }

    public function termsCondition(){
       return view('frontend.termsCondition');
    }
}
