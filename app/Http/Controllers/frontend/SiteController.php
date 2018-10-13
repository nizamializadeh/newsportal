<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Models\Post;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use MetaTag;
use App\Model\About;

class SiteController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        $featuredPosts = Post::with('category','author')->where([['status', 1],['type' , 0]])->orderBy('created_at','DESC')->take(6)->get();
//        $categories = Category::with('posts.author')->whereStatus(1)->take(6)->get();
//        $editorPicks = Post::with('category','author')->where([['status', 1],['type' , 1]])->orderBy('created_at','DESC')->take(8)->get();
//        $recommendeds = Post::with('author')->where([['status', 1],['type' , 2]])->orderBy('created_at','DESC')->take(2)->get();
//        return view('site.index',compact('featuredPosts','categories','editorPicks','recommendeds'));
        $post=Post::all();
    }

    /**
     * Show about page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        $id=1;
        $abouts=About::find($id);
        return view('site.about',compact('abouts'));
    }

    /**
     *  Show post single page
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postSingle($slug)
    {
        $post = Post::with('author','category.posts')->where([['status', 1],['slug' , $slug]])->first();
        if (isset($post))
        {
            $post->view = $post->view + 1;
            $post->save();
            $popularPost = Post::with('author')->where('status', 1)->orderBy('view','DESC')->take(6)->get();
            $previous = Post::where('id', ($post->id - 1))->first();
            $previous = (isset($previous)) ? $previous : false;
            $next = Post::where('id', ($post->id + 1 ))->first();
            $next = (isset($next)) ? $next : false;

            MetaTag::set('description', strip_tags($post->description));
            MetaTag::set('image',asset('post/thumbnail-'.$post->image));

            return view('site.post_single',compact('post','popularPost','previous','next'));
        }
        else
        {
            return view('errors.404');
        }

    }

    /**
     *  Show posts bu category
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategory($slug)
    {
        $category = Category::with('posts.author')->where([['status', 1],['slug' , $slug]])->first();
        if (isset($category))
        {
            $posts = $category->posts()->paginate(4);
            $categories = Category::with('posts.author')->whereStatus(1)->take(8)->get();
            return view('site.category',compact('category','posts','categories'));
        }
        else
        {
            return view('errors.404');
        }
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function searchPost(Request $request)
    {
        $query = Input::get('post',false);
        if (isset($query)) {
            $posts = Post::with('author','category')->where('title', 'like', '%' . $query . '%')->orWhere('description', 'like', '%' . $query. '%')->paginate(6);
            return view('site.search_result',compact('query','posts'));
        }
        return back();
    }

    public function team()
    {
        $teams = Team::whereStatus(1)->get();
        return view('site.team',compact('teams'));
    }
}
