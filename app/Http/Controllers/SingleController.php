<?php




namespace App\Http\Controllers;




use App\Models\Faq;
use App\Models\Mvc;
use App\Models\News;
use App\Models\Post;
use App\Models\Team;
use App\Models\About;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Pricing;
use App\Models\Project;
use App\Models\Service;
use App\Models\Category;
use App\Models\CoverImage;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\LegalDocument;
use App\Models\Vacancy;
use App\Models\Video;




class SingleController extends Controller
{
    //
    public function render_about(Request $request ){
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'About Us';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
        return view('portal.aboutus', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title',));




    }

    public function render_testimonial(Request $request ){

        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'Testimonials';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $testimonials = Testimonial::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
        return view('portal.testimonial', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title', 'testimonials'));
    }

    public function render_team(Request $request)
    {
        # code...
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'Our Team';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
       
        return view('portal.team', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title',));
    }

    public function render_faq(Request $request) {

        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'FAQs';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $faqs = Faq::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
       
        return view('portal.faq', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title', 'faqs'));
       
    }

    public function render_pricing(Request $request)

    {
        # code...
        $pricing = Pricing::all();
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'Pricing';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
        return view('portal.pricing', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title','pricing'));
    }

   public function render_projects(Request $request)

    {
        # code...
        $projects = Project::all();
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'Our Projects';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
        return view('portal.project', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title','projects'));
    }

    public function render_services(Request $request)

    {
        # code...
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'Our Services';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
        return view('portal.service', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title'));
    }

    public function render_single_services($slug)
    {
        # Get the current service first
        $service = Service::where('slug', $slug)->firstOrFail();
       
        # Get all services except current one using ID
        $remainingservices = Service::where('id', '!=', $service->id)
                                   ->latest()
                                   ->get();
       
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage = CoverImage::latest()->get()->take(4);
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $services = Service::all();
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts' => function($query) {
            $query->latest()->take(8);
        }])->whereIn('id', [1])->get();
        $categoriesone = Category::with(['get_posts' => function($query) {
            $query->latest()->take(8);
        }])->whereIn('id', [2])->get();
       
        // Get service images if they exist
        $serviceImages = $service->images ?? [];
       
        return view('portal.singleservice', compact(
            'sitesetting',
            'mvcs',
            'coverimage',
            'posts',
            'teams',
            'categories',
            'categorieson',
            'categoriesone',
            'abouts',
            'service',
            'services',
            'remainingservices',
            'serviceImages'
        ));
    }
    
    public function render_news(Request $request)

    {
        # code...
        $news = News::all();
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'News';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
        return view('portal.news', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title','news'));
    }




    public function render_contact(Request $request)




    {
        # code...
        $contacts = Contact::all();
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'Contact Us';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
        return view('portal.contact', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title','contacts'));
    }
     
    public function render_image(Request $request)
    {
        # code...
       
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'Our Gallery';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $gallerys = Gallery::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
        return view('portal.image', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title', 'gallerys'));
    }


    public function render_single_image(Request $request, $slug)

    {
        # code...
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $service = Service::where("slug", $slug)->first();
        $services = Service::latest()->get()->take(6);
        $gallery = Gallery::where('slug', $slug)->first();
        $gallerys = Gallery::all();
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
        return view('portal.singleimage', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','service', 'services','gallery','gallerys','service'));
    }




    public function render_video(Request $request)




    {
        # code...
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'Our Videos';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $videos = Video::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
        return view('portal.video', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title', 'videos'));
    }




    public function render_client(Request $request)




    {
        # code...
        $clients = Client::all();
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'Our Clients';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
        return view('portal.client', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title','clients'));
    }




    public function render_legaldocument(Request $request)




    {
        # code...
        $legaldocuments = LegalDocument::all();
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'Legal Documents';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
        return view('portal.legaldocument', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title','legaldocuments'));
    }




    public function render_vacancy(Request $request)








    {
        # code...
        $legaldocuments = LegalDocument::all();
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'Legal Documents';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
        $vacancies = Vacancy::latest()->get()->take(10);
        return view('portal.vacancy', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title','legaldocuments','vacancies'));
    }




   
    public function render_vacancy_single(Request $request , $id)








    {
     
        $legaldocuments = LegalDocument::all();
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'Legal Documents';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
        $vacancies = Vacancy::findOrFail($id);
        $recentVacancies = Vacancy::where('id', '!=', $id)
                             ->latest()
                             ->take(3)  
                             ->get();
        return view('portal.singlevacancy', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title','legaldocuments','vacancies','recentVacancies'));
    }    


    public function apply($id)
    {
        $legaldocuments = LegalDocument::all();
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimage= CoverImage::latest()->get()->take(4);
        $page_title = 'Legal Documents';
        $sitesetting = SiteSetting::first();
        $abouts = About::first();
        $teams = Team::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('get_categories')->latest()->get()->take(3);
        $categorieson = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[1])->get();
        $categoriesone = Category::with(['get_posts'=>function($query){
            $query->latest()->take(8);
        }])->whereIn('id',[2])->get();
        $demand = Vacancy::findOrFail($id);
        return view('portal.application', compact('sitesetting','mvcs','coverimage','posts','teams','categories','categorieson','categoriesone','abouts','services','page_title','legaldocuments','demand'));
    }

    public function careers()
{
    $vacancies = Vacancy::latest()->paginate(10); 
    return view('portal.careers', compact('vacancies'));
}
   
}
