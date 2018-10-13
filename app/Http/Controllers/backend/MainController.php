<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Admin\MainRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modles\Main;
use Intervention\Image\Facades\Image;

class MainController extends Controller
{
    public function index()
    {
        $mains = Main::all();
        $settings = $this->getSettingsForTable();
        return view('backend.main.index',compact('mains','settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param Category $tag
     * @return void
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Main $main)
    {
        $setting = $this->getSettingsForForm();
        $setting['title'] = 'Edit main';
        return view('backend.main.edit',compact('main','setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Main $main)
    {
        if ($request->hasFile('photo')){
            $name = rand().".".$request->file("photo")->extension();
            $singe_page_img = rand().".".$request->file("page_img")->extension();
            $site_share_img = rand().".".$request->file("share_img")->extension();
            $main->logo = $name;
            $main->site_share_img = $site_share_img;
            $main->singe_page_img =$singe_page_img;
            $request->file("photo")->move(public_path().'/mains/', $name);
            $request->file("page_img")->move(public_path().'/mains/', $singe_page_img);
            $request->file("share_img")->move(public_path().'/mains/', $site_share_img);
        }
        $request->merge(['slug' => str_slug($request->site_title,'-')]);
        $main->update($request->all());
        $request->session()->flash(str_slug('Edit main','-'),'Main edited');
        return redirect('/admin/main');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy()
    {

    }

    /**
     *  Return setting array for table component
     * @return array
     */
    private function getSettingsForTable()
    {
        return  [
            'title' => 'Mains',
            'table' => 'mains',
            'createButton' => [
                'text' => "Main creat",
                'url' => route('main.create')
            ],
            'columns' => [
                [
                    'label' => 'ID',
                ],
                [
                    'label' => 'logo',
                ],
                [
                    'label' => 'site_share_img',
                ],
                [
                    'label' => 'singe_page_img',
                ],
                [
                    'label' => 'site_title',
                ],
                [
                    'label' => 'site_desc',
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
            'title' => 'Create category',
            'flashSessionKey' => 'category',
            'flashSessionValue' => 'Category created',
            'backButton' => [
                'text' => "Back",
                'url' => route('main.index')
            ]
        ];
    }
}
