<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        $settings = $this->getSettingsForTable();
        return view('home',compact('settings'));
    }
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
                    'label' => 'Image',
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

}
