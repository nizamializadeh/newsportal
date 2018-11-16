<?php

namespace App\Http\Controllers\backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcceptAuthorController extends Controller
{
    public function index()
    {
        $users = User::all();
        $settings = $this->getSettingsForTable();
        return view('backend.acceptauthor.index',compact('users','settings'));
    }

    public function edit($id)
    {
        $settings = $this->getSettingsForForm();
        $user=User::findorFail($id);
        return view('backend.acceptauthor.edit',compact('user','settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param  \App\Models\Post $post
     * @return void
     */
    public function update(Request $request, User $acceptauthor)
    {
        $acceptauthor->update($request->all());
        $request->session()->flash(str_slug('Edit author','-'),'Author edited');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,User $user)
    {
        $user->delete();
        $request->session()->flash(str_slug('posts','-'),'Post Deleted');
        return back();
    }

    private function getSettingsForTable()
    {
        return  [
            'title' => 'Authors',
            'table' => 'authors',
            'createButton' => [
                'text' => "Create author",
                'url' => route('authorpost.create')
            ],
            'columns' => [
                [
                    'label' => 'ID',
                ],
                [
                    'label' => 'Name',
                ],
                [
                    'label' => 'Email',
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
                'url' => route('authorpost.index')
            ]
        ];
    }
}
