<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register_proses(Request $request)
    {
        $response = array(
            'status' => 'failed', 
            'errors' => 'register', 
            'msg' => 'Gagal mendaftar. Cek kembali data anda', 
            'item' => '1'
        );

        // Clean the input data - trim whitespace and normalize
        $cleanedData = $request->all();
        if (isset($cleanedData['password'])) {
            $cleanedData['password'] = trim($cleanedData['password']);
        }
        if (isset($cleanedData['password_confirmation'])) {
            $cleanedData['password_confirmation'] = trim($cleanedData['password_confirmation']);
        }

        // Debug logging
        Log::info('Registration attempt', [
            'original_password' => $request->password ? 'exists' : 'missing',
            'original_confirmation' => $request->password_confirmation ? 'exists' : 'missing',
            'cleaned_password' => $cleanedData['password'] ?? 'missing',
            'cleaned_confirmation' => $cleanedData['password_confirmation'] ?? 'missing',
            'original_password_length' => strlen($request->password ?? ''),
            'original_confirmation_length' => strlen($request->password_confirmation ?? ''),
            'cleaned_password_length' => strlen($cleanedData['password'] ?? ''),
            'cleaned_confirmation_length' => strlen($cleanedData['password_confirmation'] ?? ''),
            'original_are_identical' => ($request->password === $request->password_confirmation),
            'cleaned_are_identical' => (($cleanedData['password'] ?? '') === ($cleanedData['password_confirmation'] ?? '')),
            'all_data_keys' => array_keys($request->all())
        ]);

        $validator = Validator::make($cleanedData, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',
            // 'captcha' => 'captcha|required' // Temporarily disabled due to missing GD extension
        ], [
            'password_confirmation.same' => 'Password dan konfirmasi password harus sama persis. Pastikan tidak ada spasi atau karakter tersembunyi.',
        ]);

        if ($validator->fails()) {
            Log::info('Validation failed', [
                'errors' => $validator->errors()->all(),
                'failed_rules' => $validator->errors()->keys()
            ]);
            
            return response()->json([
                'status' => 'failed', 
                'errors' => $validator->errors()->all(), 
                'msg' => 'Gagal mendaftar. ' . $validator->errors()->first(), 
                'item' => '2'
            ]);
        } else {
            try {
                // Create new user with default role (role = 2)
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => 2, // Default role: 2
                    'status' => 'aktif',
                    'user_type' => '1'
                ]);

                $response = array(
                    'status' => 'success', 
                    'errors' => '', 
                    'msg' => 'Pendaftaran berhasil! Silakan login dengan akun Anda', 
                    'item' => '0'
                );
            } catch (\Exception $e) {
                $response = array(
                    'status' => 'failed', 
                    'errors' => 'register', 
                    'msg' => 'Terjadi kesalahan saat mendaftar. Silakan coba lagi', 
                    'item' => '3'
                );
            }
        }

        return response()->json($response);
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img('mini')]);
    }
}
