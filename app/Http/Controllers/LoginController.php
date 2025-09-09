<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Hash;
use App\Helpers\Helper;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login_proses(Request $request)
    {
        $response = array(
            'status' => 'failed', 'errors' => 'login', 'msg' => 'Gagal Login. Cek kembali data anda', 'item' => '1'
        );
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            // 'captcha' => 'captcha|required' // Temporarily disabled due to missing GD extension
        ])->stopOnFirstFailure(true);
        if ($validator->fails()) {
            return response()->json(['status' => 'failed', 'errors' => $validator->errors()->all(), 'msg' => 'Gagal Login. Cek kembali data anda', 'item' => '2']);
        } else {
            // LOGIN ATTEMP
            $credentials = ['email' => $request->email, 'password' => $request->password];
            if (Auth::attempt($credentials)) {
                $sess = Helper::checkAuth(auth()->user()->id);
                Session::put('id', @$sess[0]->id_users);
                Session::put('email', @$sess[0]->email);
                Session::put('name', @$sess[0]->name);
                Session::put('role', @$sess[0]->roles_name);
                $response = array(
                    'status' => 'success', 'errors' => '', 'msg' => 'Login Sukses, Selamat datang di admin JDIH Provinsi Jawa Tengah', 'item' => '0'
                );
            } else {
                $response = array(
                    'status' => 'failed', 'errors' => 'login', 'msg' => 'username atau password anda salah', 'item' => '3'
                );
            }
        }
        /** END OF VALIDATION */
        return response()->json($response);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img('mini')]);
    }
}
