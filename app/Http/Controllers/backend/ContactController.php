<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modles\Contact;
use App\Http\Requests\Admin\ContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        $settings = $this->getSettingsForTable();
        return view('backend.contact.index',compact('contacts','settings'));
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
    public function edit(Contact $contact)
    {
        $setting = $this->getSettingsForForm();
        $setting['title'] = 'Edit contact';
        return view('backend.contact.edit',compact('contact','setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $slug = str_slug($request->text,'-');
        $request->merge(['text' => $slug]);
        $contact->update($request->all());
        $request->session()->flash(str_slug('Edit contact','-'),'Contact edited');
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
            'title' => 'Contacts',
            'table' => 'contacts',
            'createButton' => [
                'text' => "Contact creat",
                'url' => route('contact.create')
            ],
            'columns' => [
                [
                    'label' => 'ID',
                ],
                [
                    'label' => 'Text',
                ],
                [
                    'label' => 'Adress',
                ],
                [
                    'label' => 'Phone',
                ],
                [
                    'label' => 'Email',
                ],
                [
                    'label' => 'Map',
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
                'url' => route('contact.index')
            ]
        ];
    }
}
