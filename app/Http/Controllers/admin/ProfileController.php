<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::id();   
        $user = User::select('*','users.id as userid')->where('users.id',$id)->join('users_role','users.role','=','users_role.id')->first();
       return view('admin.page.profile.index',compact('user'));
    }
    public function update(request $request)
    {
        $id = Auth::id();
        $update = User::where('users.id',$id)->update([
            'name' => $request->name
        ]);
        if($update){
            return response()->json(['status' => 'success','message' => 'Update Profile Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Update Profile Gagal'], 400);
        }
    }
}
