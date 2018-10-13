<?php

namespace App\Http\Controllers\backend;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function setStatus(Request $request)
    {
        if ($request->ajax())
        {
            DB::table($request->table)->update(['status' => $request->status]);
            $resultMessage = ($request->status) ? "Status changed to active" : "Status changed to deactive";
            return response($resultMessage,200);
        }
    }
    public function login()
    {
        return view('backend.admin.login');
    }
    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email,'password' => $request->password]))
        {
            return redirect(route('tag.index'));
        }
        else {
            return back();
        }
    }

}
