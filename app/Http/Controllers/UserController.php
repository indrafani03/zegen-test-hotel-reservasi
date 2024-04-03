<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Hash;
use DataTables;

class UserController extends Controller
{
    //
    public function Index(Request $request)
    {
        return view("backend.users", ["title" => "Users"]);
    }
    // =================================================================================================================================
    public function LoadAjaxUser(Request $request)
    {
        if ($request->ajax()) {

            $data = UsersModel::where('deleted_at', null);

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('type', function($row){
                        if($row->type == "1") {
                            return '<span class="badge badge-primary">User</span>';
                        } else {
                            return '<span class="badge badge-success">Admin</span>';
                        }
                    })
                    ->addColumn('aksi', function($row){
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_1" data-id="'.$row->id.'" data-name="'.$row->name.'" data-email="'.$row->email.'" data-type="'.$row->type.'" id="edit">Edit</a> <a href="javascript:void(0)" id="hapus" data-id="'.$row->id.'" class="edit btn btn-danger btn-sm ms-2">Hapus</a>';
                            return $btn;
                    })
                    ->rawColumns(['type','aksi'])
                    ->make(true);
        }
    }
    // ====================================================================================================================================
    public function SimpanUser(Request $request)
    {
        if($request->id != "") {
            if($request->password != "") {
                $save = UsersModel::where('id', $request->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'type' => $request->type,
                    'password' => Hash::make($request->password)
                ]);
            } else {
                $save = UsersModel::where('id', $request->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'type' => $request->type
                ]);
                
            }
            if($save) {
                return response()->json(['code' => '200', 'message'=>'Berhasil update data']);
            }
        } else {
            $email = UsersModel::where(["email" => $request->email, "deleted_at" => null])->first();
            if(!$email) {
                $save = UsersModel::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'type' => '1',
                    'password' => Hash::make($request->password)
                ]);
                if($save) {
                    return response()->json(['code' => '200', 'message'=>'Berhasil mendaftar']);
                } else {
                    return response()->json(['code' => '200', 'message'=>'Gagal mendaftar']);
                }
            } else {
                return response()->json(['code' => '204', 'message'=>'Email sudah terdaftar']);
            }
        }
    }
    // =======================================================================================================================================
    public function HapusUser(Request $request)
    {
        $save = UsersModel::where('id', $request->id)->update([
            'deleted_at' => date("Y-m-d H:i:s")
        ]);
        if($save) {
            return response()->json(['code' => '200', 'message'=>'Berhasil menghapus data']);
        }
    }
}
