<?php

namespace App\Http\Controllers\frontend;

use App\Modles\About;
use App\Modles\Category;
use App\Modles\Contact;
use App\Modles\ContactForum;
use App\Modles\Post;
use App\Modles\Testimonail;
use DemeterChain\C;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index ()
    {
        $breaks = Post::orderBy('id', 'DESC')->where('break', '=', 0)->get();
        $trends = Post::where('trend', '=', 0)->orderBy('id', 'DESC')->take(5)->get();
        $heads = Post::where('head', '=', 0)->orderBy('id', 'DESC')->take(4)->get();
        $features = Post::orderBy('id', 'DESC')->take(3)->get();
        $statuses =Category::where('status', '=', 1)->get();
        $latests= Post::orderBy('id', 'DESC')->take(5)->get();
        $latests=$latests->chunk(4);
        $populars= Post::orderBy('count', 'DESC')->take(5)->get();
        $populars=$populars->chunk(4);
        $trends=$trends->chunk(4);
        $heads=$heads->chunk(3);
        return view('frontend.index',compact('breaks','trends','heads','features','latests','populars','statuses'));
    }
    public function postSingle ($slug)
    {
        $post = Post::where([['status', 1],['slug' , $slug]])->first();
        if (isset($post))
        {
            $post->count = $post->count + 1;
            $post->save();
            $popularPost = Post::where('status', 1)->orderBy('count','DESC')->take(6)->get();


            return view('frontend.post_single',compact('post','popularPost'));
        }
        else
        {
            return view('errors.404');
        }
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
