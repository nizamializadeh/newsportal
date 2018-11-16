<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Admin\TestimonailRequest;
use App\Modles\Testimonail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class TestimonailsController extends Controller
{
    public function index()
    {
        $settings = $this->getSettingsForTable();
        $testimonails=Testimonail::all();
        return view('backend.testimonail.index',compact('settings','testimonails'));
    }
    public function create()
    {
        $settings = $this->getSettingsForForm();

        return view('backend.testimonail.create',compact('settings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @return void
     */
    public function store(Request $request, Testimonail $testimonail)
    {
        if ($request->hasFile('photo'))
        {
            $image = Image::make($request->file('photo'));
            $orginalImageName = str_slug(rand().".".$request->name,'-').'.'.$request->file('photo')->getClientOriginalExtension();
            $image->save(public_path('testimonails/'.$orginalImageName));
            $request->merge(['image' => $orginalImageName]);
            $request->merge(['slug' => str_slug($request->name,'-')]);
            $request->session()->flash(str_slug('Create testimonail','-'),'Testimonail created');
        }
        $testimonail->create($request->all());
        return back();
    }

    public function edit(Testimonail $testimonail)
    {
        $settings = $this->getSettingsForForm();
        $settings['title'] = 'Edit testimonail';
        return view('backend.testimonail.edit',compact('testimonail','settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Testimonail $testimonail)
    {
        if ($request->hasFile('photo'))
        {
            (file_exists(public_path('testimonails/'.$testimonail->image)) ? unlink(public_path('testimonails/'.$testimonail->image)) : null);
            $image = Image::make($request->file('photo'));
            $orginalImageName = str_slug($request->name,'-').'.'.$request->file('photo')->getClientOriginalExtension();
//            $tumbnailImageName = "thumbnail-".str_slug($request->text,'-').'.'.$request->file('photo')->getClientOriginalExtension();
            $image->save(public_path('testimonails/'.$orginalImageName));
//
            $request->merge(['image' => $orginalImageName]);
        }
        $request->merge(['slug' => str_slug($request->text,'-')]);
        $testimonail->update($request->all());
        $request->session()->flash(str_slug('Edit testimonail','-'),'Testimonail edited');
        return back();
    }
    public function destroy(Request $request,Testimonail $testimonail)
    {
        $testimonail->delete();
        $request->session()->flash(str_slug('Testimonails','-'),'Testimonail Deleted');


        return back();
    }
    private function getSettingsForTable()
    {
        return  [
            'title' => 'Testimonail',
            'table' => 'testimonail',
            'createButton' => [
                'text' => "Create testimonail",
                'url' => route('testimonail.create')
            ],
            'columns' => [
                [
                    'label' => 'ID',
                ],
                [
                    'label' => 'Image',
                ],
                [
                    'label' => 'Name',
                ],
                [
                    'label' => 'Company',
                ],
                [
                    'label' => 'Message',
                ]
            ],
        ];
    }

    private  function  getSettingsForForm()
    {
        return [
            'title' => 'Create testimonail',
            'flashSessionKey' => 'testimonail',
            'flashSessionValue' => 'Testimonail created',
            'backButton' => [
                'text' => "Back",
                'url' => route('testimonail.index')
            ]
        ];
    }
}
