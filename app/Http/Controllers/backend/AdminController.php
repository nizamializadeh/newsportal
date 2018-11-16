<?php

namespace App\Http\Controllers\backend;
use App\Http\Requests\Admin\LoginRequest;
use App\Modles\Category;
use App\Modles\ContactForum;
use App\Modles\Post;
use App\Modles\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function setStatus(Request $request)
    {
        if ($request->ajax())
        {
            DB::table($request->table)->where('id',$request->id)->update(['status' => $request->status]);
            $resultMessage = ($request->status) ? "Status changed to active" : "Status changed to deactive";
            return response($resultMessage,200);

        }
    }
    public function dashboard()
    {
        $settings = $this->getSettingsForTable();
        $user=User::all();
        $post=Post::all();
        $tag=Tag::all();
        $category=Category::all();
        $contactforums = ContactForum::orderBy('id', 'DESC')->get();


        return view('backend.dashboard',compact('user','post','tag','category','contactforums','settings'));
    }

    public function login()
    {
        return view('backend.admin.login');
    }
    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email,'password' => $request->password, 'role'=>1 ]))
        {

           return redirect(route('dashboard'));
        }
        else {
            return back();
        }
    }

    private function getSettingsForTable()
    {
        return  [
            'title' => 'Dashboard',
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
                    'label' => 'Name',
                ],
                [
                    'label' => 'Surname',
                ],
                [
                    'label' => 'Email',
                ],
                [
                    'label' => 'Phone',
                ],
                [
                    'label' => 'Message',
                ],
                [
                    'label' => 'SendTime',
                ]
            ],
        ];
    }

}
