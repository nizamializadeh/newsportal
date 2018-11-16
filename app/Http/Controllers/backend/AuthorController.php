<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function index()
    {
        return view('backend.author.index');
    }
    public function login()
    {
        return view('backend.author.login');
    }
    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email,'password' => $request->password, 'role' =>0 ]))
        {
            if(auth()->user()->accept == 1){
                return redirect(route('authorpost.index'));
            }
            else{
                return redirect(route('test.index'));

            }
        }
        else {
            return back();
        }
    }
}
