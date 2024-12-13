<?php

namespace App\Http\Controllers;
use App\Models\Mvc;
use App\Models\Post;
use App\Models\Team;
use App\Models\About;
use App\Models\Video;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\Service;
use App\Models\Category;
use App\Models\CoverImage;
use App\Models\News;
use App\Models\Vacancy;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class FrontViewController extends Controller
{
    //

    public function searchServices(Request $request)
    {
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $services = Service::oldest()->get()->take(5);
        # code...
        if($request->search){
            $searchServices = Service::where('title','LIKE','%'.$request->search.'%')->latest()->paginate(6);
            $projects = Project::where('title','LIKE','%'.$request->search.'%')->latest()->paginate(6);
            $news = News::where('title','LIKE','%'.$request->search.'%')->latest()->paginate(6);
            
            return view('portal.search',compact('searchServices','projects','news','sitesetting','abouts','services'));

        }else{
            return redirect()->back()->with('message','Empty Search');

        }

    }

    public function index()
    {
        # code...
        $coverimages = CoverImage::latest()->get()->take(3);
        $categories = Category::latest()->get()->take(10);
        // $mvcone = Mvc::where('id',[1])->get();
        $mvcs = Mvc::latest()->get()->take(3);
        $gallerys = Gallery::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(6);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(6);
        }])->whereIn('id',[2])->get();
        $projects = Project::latest()->get()->take(6);
        $abouts = About::first();
        $serviceone = Service::where('id', '<=', 3)->get();
        $servicetwo = Service::where('id', '>=', 4)->get();
        $services = Service::latest()->get()->take(5);
        $sitesetting = SiteSetting::first();
        $testimonials= Testimonial::latest()->get()->take(6);
        $clients = Client::latest()->get()->take(9);
        $teams = Team::get()->take(6);
        $videos = Video::get()->take(4);
        $contacts = Contact::first();
        $projectCount = Project::count();
        $teamCount = Team::count();
        $latestVacancies = Vacancy::where('to_date', '>=', Carbon::today())->get();
        return view('index',[
            'coverimages' => $coverimages,
            'categories' => $categories,
            'mvcs' => $mvcs,
            // 'mvcone'=> $mvcone,
            'gallerys' => $gallerys,
            'posts' => $posts,
            'categorieson' => $categorieson,
            'categoriesone' => $categoriesone,
            'projects' => $projects,
            'abouts' => $abouts,
            'services' => $services,
            'serviceone' => $serviceone,
            'servicetwo' => $servicetwo,
            // 'servicestwo' => $servicestwo,
            // "serviceOne" => $serviceOne,
            // "serviceTwo" => $serviceTwo,
            // "serviceThree" => $serviceThree,
            // "serviceFour" => $serviceFour,
            // "serviceFive" => $serviceFive,
            'sitesetting' => $sitesetting,
            'testimonials' => $testimonials,
            'clients' => $clients,
            'teams' => $teams,
            'videos' => $videos,
            'contacts' => $contacts,
            'projectCount' => $projectCount,
            'teamCount' => $teamCount,
            'latestVacancies' => $latestVacancies,
        ]);
    }
    
}
