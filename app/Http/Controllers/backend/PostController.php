<?php

namespace App\Http\Controllers\backend;

use App\Modles\Category;
use App\Modles\Image;
use App\Modles\Post;
use App\Modles\PostTag;
use App\Modles\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $images = Image::all();
        $settings = $this->getSettingsForTable();
        return view('backend.post.index',compact('posts','settings','images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = $this->getSettingsForForm();
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.post.create',compact('settings','users','categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @return void
     */
    public function store(Request $request,Post $post)
    {
//        if ($request->hasFile('photo'))
//        {
//            $image = Image::make($request->file('photo'));
//            $orginalImageName = str_slug($request->title,'-').'.'.$request->file('photo')->getClientOriginalExtension();
//            $tumbnailImageName = "thumbnail-".str_slug($request->title,'-').'.'.$request->file('photo')->getClientOriginalExtension();
//            $image->save(public_path('post/'.$orginalImageName));
//            $image->resize(600, null, function ($constraint) {
//                $constraint->aspectRatio();
//            });
//            $image->save(public_path('post/'.$tumbnailImageName));
//            $request->merge(['image' => $orginalImageName]);
//
//        }
        $request->merge(['count' => 0]);
        $request->merge(['user_id' => Auth::id()]);
        $request->merge(['slug' => str_slug($request->title,'-')]);
        $request->session()->flash(str_slug('Create post','-'),'Post created');
        $post = Post::create($request->all())->id;
        foreach ($request->tags as $tag)
        {
            PostTag::create(['post_id' =>$post,'tag_id' => $tag]);
        }
        $files = $request->file('photo');
        if ($request->hasFile('photo')){
            foreach ($files as $file) {
                $name = rand(). "." . $file->getClientOriginalExtension();
                $file->move(public_path('posts'), $name);
                $image = new Image();
                $image->post_id =$post;
                $image->photo = $name;
                $image->save();
            }
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $settings = $this->getSettingsForForm();
        $users= User::all();
        $categories = Category::all();
        $imagess = Image::all();
        $tags = Tag::all();
        $settings['title'] = 'Edit post';
        return view('backend.post.edit',compact('post','settings','tags','categories','imagess','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param  \App\Models\Post $post
     * @return void
     */
    public function update(PostRequest $request, Post $post)
    {
        if ($request->hasFile('photo'))
        {
            (file_exists(public_path('post/'.$post->image)) ? unlink(public_path('post/'.$post->image)) : null);
            (file_exists(public_path('post/thumbnail-'.$post->image)) ? unlink(public_path('post/thumbnail-'.$post->image)) : null);
            $image = Image::make($request->file('photo'));
            $orginalImageName = str_slug($request->title,'-').'.'.$request->file('photo')->getClientOriginalExtension();
            $tumbnailImageName = "thumbnail-".str_slug($request->title,'-').'.'.$request->file('photo')->getClientOriginalExtension();
            $image->save(public_path('post/'.$orginalImageName));
            $image->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save(public_path('post/'.$tumbnailImageName));
            $request->merge(['image' => $orginalImageName]);
        }

        $request->merge(['slug' => str_slug($request->title,'-')]);
        $post->update($request->all());
        $post->tags()->sync($request->tags);
        $request->session()->flash(str_slug('Edit post','-'),'Post edited');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
    /**
     *  Return setting array for table component
     * @return array
     */
    private function getSettingsForTable()
    {
        return  [
            'title' => 'Posts',
            'table' => 'posts',
            'createButton' => [
                'text' => "Create post",
                'url' => route('post.create')
            ],
            'columns' => [
                [
                    'label' => 'ID',
                ],
                [
                    'label' => 'Title',
                ],
                [
                    'label' => 'Author',
                ],
                [
                    'label' => 'View',
                ],
                [
                    'label' => 'Status',
                ]
            ],
        ];
    }

    /**
     * Return setting array for form component
     * @return array
     */
    private  function  getSettingsForForm()
    {
        return [
            'title' => 'Create post',
            'flashSessionKey' => 'post',
            'flashSessionValue' => 'Post created',
            'backButton' => [
                'text' => "Back",
                'url' => route('post.index')
            ]
        ];
    }

}
