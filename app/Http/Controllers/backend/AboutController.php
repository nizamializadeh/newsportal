<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modles\About;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function index()
    {
        $settings = $this->getSettingsForTable();
        $abouts=About::all();
        return view('backend.about.index',compact('settings','abouts'));
    }
    public function edit(About $about)
    {
        $settings = $this->getSettingsForForm();
        $settings['title'] = 'Edit about';
        return view('backend.about.edit',compact('about','settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,About $about)
    {
        if ($request->hasFile('photo'))
        {
            (file_exists(public_path('about/'.$about->image)) ? unlink(public_path('about/'.$about->image)) : null);
            $image = Image::make($request->file('photo'));
            $orginalImageName = str_slug($request->text,'-').'.'.$request->file('photo')->getClientOriginalExtension();
//            $tumbnailImageName = "thumbnail-".str_slug($request->text,'-').'.'.$request->file('photo')->getClientOriginalExtension();
            $image->save(public_path('about/'.$orginalImageName));
//            $image->resize(600, null, function ($constraint) {
//                $constraint->aspectRatio();
//            });
//            $image->save(public_path('about/'.$tumbnailImageName));
            $request->merge(['image' => $orginalImageName]);
        }
        $about->update($request->all());
        $request->session()->flash(str_slug('Edit about','-'),'About edited');
        return back();
    }
    private function getSettingsForTable()
    {
        return  [
            'title' => 'Abouts',
            'table' => 'about',
            'createButton' => [
                'text' => "Edit about",
                'url' => route('abouts.create')
            ],
            'columns' => [
                [
                    'label' => 'ID',
                ],
                [
                    'label' => 'Title',
                ],
                [
                    'label' => 'Image',
                ],
                [
                    'label' => 'Text',
                ]
            ],
        ];
    }

    private  function  getSettingsForForm()
    {
        return [
            'title' => 'Edit about',
            'flashSessionKey' => 'about',
            'flashSessionValue' => 'About edit',
            'backButton' => [
                'text' => "Back",
                'url' => route('abouts.index')
            ]
        ];
    }

}
