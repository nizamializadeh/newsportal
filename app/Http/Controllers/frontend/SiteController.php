<?php

namespace App\Http\Controllers\frontend;

use App\Modles\About;
use App\Modles\Category;
use App\Modles\Contact;
use App\Modles\ContactForum;
use App\Modles\Post;
use App\Modles\Testimonail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index ()
    {
        $posts = Post::orderBy('id', 'DESC')->take(8)->get();
        $posts=$posts->chunk(5);
        $categories=Category::whereSatatus(1);
        $trend= Post::orderBy('id', 'DESC')->take(4)->get();





        return view('frontend.index',compact('posts','trend_post'));

    }
    public function about ()
    {
        $about = About::first();
        return view('frontend.about',compact('about'));
    }
    public function testimonail ()
    {
        $testimonails = Testimonail::all();
        return view('frontend.testimonail',compact('testimonails'));
    }
    public function contact ()
    {
        $contact = Contact::first();
        return view('frontend.contact',compact('contact'));
    }
    public function contactus (Request $request,ContactForum $contactForum)
    {
        $contactForum->create($request->all());
        $request->session()->flash(str_slug('Create contact','-'),'Contact created');
        return back();
    }

}
