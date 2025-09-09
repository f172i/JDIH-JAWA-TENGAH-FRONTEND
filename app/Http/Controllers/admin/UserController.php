<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {
        $role = DB::table('users_role')->get();
        return view('admin.page.user.index',compact('role'));
    }
    public function datatable(Request $request)
    {
        $model = DB::table('users')->select('*','users.id as userid')->join('users_role','users.role','=','users_role.id');
        $counter = clone $model;
        $counter->count();
        return DataTables::query($model)
            ->addColumn('action', function ($data) {
                $html = '<a href="#" class="btn btn-sm btn-danger hapususer" style="margin:5px;" id="'.$data->userid.'">Hapus </a>';
                $html .= '<a href="#" class="btn btn-sm btn-success edituser" style="margin:5px;" id="'.$data->userid.'" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app2">Edit </a>';
                return $html;
                })
            ->addIndexColumn()
            ->setTotalRecords($counter)
            ->toJson();
    }

    public function store(Request $request)
    {
        $pass = password_hash($request->password, PASSWORD_DEFAULT);
        $create = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => $pass,
            'role' => $request->role,
            'status' => 'aktif'
        ]);
        if($create){
            return response()->json(['status' => 'success','message' => 'Tambah user baru Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Tambah user baru gagal'], 400);
        }
    }
    
    public function delete(Request $request)
    {
        $hapus = User::where('id',$request->iduser)->delete();
        if($hapus){
            return response()->json(['status' => 'success','message' => 'Hapus User Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Hapus User Gagal'], 400);
        }
    }

    public function update($id=null)
    {
        $data = User::where('id',$id)->first();
        $role = DB::table('users_role')->get();
        return view('admin.page.user.update',compact('data','role'));
    }

    public function update_proses(Request $request)
    {
        $update = User::where('id',$request->id)
        ->update([
            'email' => $request->email,
            'name' => $request->name,
            'role' => $request->role
        ]);
        if($update){
            return response()->json(['status' => 'success','message' => 'Update data User Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Update data User Gagal'], 400);
        }
    }
}
