<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Admin\SocialRequest;
use App\Modles\Socials;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Socials::all();
        $settings = $this->getSettingsForTable();
        return view('backend.socials.index',compact('socials','settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting = $this->getSettingsForForm();
        return view('backend.socials.create',compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $request
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function store(SocialRequest $request, Socials $socials)
    {
        $slug = str_slug($request->link,'-');
        $request->merge(['slug' => $slug]);
        $socials->create($request->all());

        $request->session()->flash(str_slug('Create social','-'),'Social created');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Socials $social)
    {
        $setting = $this->getSettingsForForm();
        $setting['title'] = 'Edit social';
        return view('backend.socials.edit',compact('social','setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(SocialRequest $request, Socials $social)
    {
        $slug = str_slug($request->link,'-');
        $request->merge(['slug' => $slug]);
        $social->update($request->all());
        $request->session()->flash(str_slug('Edit social','-'),'Social edited');

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
    public function destroy(Request $request,Socials $social)
    {
        $social->delete();
        $request->session()->flash(str_slug('Socials','-'),'Social Deleted');
        return back();
    }

    /**
     *  Return setting array for table component
     * @return array
     */
    private function getSettingsForTable()
    {
        return  [
            'title' => 'Socials',
            'table' => 'socials',
            'createButton' => [
                'text' => "Create social",
                'url' => route('social.create')
            ],
            'columns' => [
                [
                    'label' => 'ID',
                ],
                [
                    'label' => 'Link',
                ],
                [
                    'label' => 'Icon',
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
            'title' => 'Create social',
            'flashSessionKey' => 'social',
            'flashSessionValue' => 'Socials created',
            'backButton' => [
                'text' => "Back",
                'url' => route('social.index')
            ]
        ];
    }
}
