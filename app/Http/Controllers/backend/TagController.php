<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Admin\TagRequest;
use App\Modles\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        $settings = $this->getSettingsForTable();
        return view('backend.tag.index',compact('tags','settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting = $this->getSettingsForForm();
        return view('backend.tag.create',compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $request
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request, Tag $tag)
    {
        $slug = str_slug($request->name,'-');
        $request->merge(['slug' => $slug]);
        $tag->create($request->all());
        $request->session()->flash(str_slug('Create tag','-'),'Tag created');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $setting = $this->getSettingsForForm();
        $setting['title'] = 'Edit tag';
        return view('backend.tag.edit',compact('tag','setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $slug = str_slug($request->name,'-');
        $request->merge(['slug' => $slug]);
        $tag->update($request->all());
        $request->session()->flash(str_slug('Edit tag','-'),'Tag edited');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Author $author
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request,Tag $tag)
    {
        $tag->delete();
        $request->session()->flash(str_slug('Tags','-'),'Tag Deleted');
        return back();
    }

    /**
     *  Return setting array for table component
     * @return array
     */
    private function getSettingsForTable()
    {
        return  [
            'title' => 'Tags',
            'table' => 'tags',
            'createButton' => [
                'text' => "Create tag",
                'url' => route('tag.create')
            ],
            'columns' => [
                [
                    'label' => 'ID',
                ],
                [
                    'label' => 'Name',
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
            'title' => 'Create tag',
            'flashSessionKey' => 'tag',
            'flashSessionValue' => 'Tag created',
            'backButton' => [
                'text' => "Back",
                'url' => route('tag.index')
            ]
        ];
    }
}
