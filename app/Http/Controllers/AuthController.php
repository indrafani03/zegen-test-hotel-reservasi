<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
     // =================================================================
     public function Login(Request $request)
     {
         return view("auth.login", ["title" => "Login | MyHotel"]);
     }
     // =================================================================
     public function Register(Request $request)
     {
         return view("auth.register", ["title" => "Register | MyHotel"]);
     }
    // =================================================================
    public function DoRegister(Request $request)
    {
        // check Email
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
    // ==========================================================================
    public function DoLogin(Request $request)
    {
         // check Email
         $email = UsersModel::where(["email" => $request->email, "deleted_at" => null])->first();
         if($email) {
            if (Hash::check($request->password, $email->password)) {
                // The passwords match...
                $request->session()->put('isLogin', true);
                $request->session()->put('id_user', $email->id);
                $request->session()->put('name', $email->name);
                $request->session()->put('email', $email->email);
                $request->session()->put('type', $email->type);
                return response()->json(['code' => '200', 'message'=> 'Berhasil Login']);
            } else {
                return response()->json(['code' => '204', 'message'=>'Email atau password salah']);
            }
         } else {
             return response()->json(['code' => '204', 'message'=>'Email atau password salah']);
         }
    }
    // ==========================================================================
    public function Logout(Request $request)
    {
        $request->session()->forget('isLogin');
        $request->session()->forget('id_user');
        $request->session()->forget('name');
        $request->session()->forget('email');
        $request->session()->forget('type');
        return redirect('/');
    }
}
