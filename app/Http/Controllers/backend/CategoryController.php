<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Admin\CategoryRequest;
use App\Modles\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $settings = $this->getSettingsForTable();
        return view('backend.category.index',compact('categories','settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting = $this->getSettingsForForm();
        return view('backend.category.create',compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, Category $category)
    {
        $slug = str_slug($request->name,'-');
        $request->merge(['slug' => $slug]);
        $category->create($request->all());
        $request->session()->flash(str_slug('Create category','-'),'Category created');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param Category $tag
     * @return void
     */
    public function show(Category $tag)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $setting = $this->getSettingsForForm();
        $setting['title'] = 'Edit category';
        return view('backend.category.edit',compact('category','setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $slug = str_slug($request->name,'-');
        $request->merge(['slug' => $slug]);
        $category->update($request->all());
        $request->session()->flash(str_slug('Edit category','-'),'Category edited');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request,Category $category)
    {
        $category->delete();
        $request->session()->flash(str_slug('Categories','-'),'Category Deleted');
        return back();
    }

    /**
     *  Return setting array for table component
     * @return array
     */
    private function getSettingsForTable()
    {
        return  [
            'title' => 'Categories',
            'table' => 'categories',
            'createButton' => [
                'text' => "Create category",
                'url' => route('category.create')
            ],
            'columns' => [
                [
                    'label' => 'ID',
                ],
                [
                    'label' => 'Name',
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
            'title' => 'Create category',
            'flashSessionKey' => 'category',
            'flashSessionValue' => 'Category created',
            'backButton' => [
                'text' => "Back",
                'url' => route('category.index')
            ]
        ];
    }
}
