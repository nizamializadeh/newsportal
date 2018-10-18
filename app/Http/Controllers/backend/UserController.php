<?php

namespace App\Http\Controllers\backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit(User $user)
    {

        return view('backend.user.edit', compact('s'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user= Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password!=null)
        {
            $user->password =  bcrypt($request->password);
        }

        if ($request->hasFile('file')){
            $name = time().".".$request->file("file")->extension();
            $user->image = $name;

            $request->file("file")->move(public_path().'/images/', $name);
        }

        $user->save();
        return redirect(route('dashboard'));

    }
}
