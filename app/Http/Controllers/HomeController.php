<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelsModel;
use App\Models\BookingModel;
class HomeController extends Controller
{
    //
    public function Index(Request $request)
    {
        return view("frontend.home", ["title" => "MyHotel | Home"]);
    }
    // =================================================================================================
    public function Search(Request $request)
    {   
        $hotel = HotelsModel::where('nama', 'LIKE', "%$request->name%")->orWhere('nama_lokasi', 'LIKE', "%$request->name%")->get();
        return view("frontend.framesearch", ["title" => "Hasil pencarian '".$request->name."'", "data" => $hotel]);
    }
    // =================================================================================================
    public function BookNow(Request $request)
    {
        $hotel = HotelsModel::where('id', $request->id)->first();
        $save = BookingModel::create([
            'id_hotel' => $request->id,
            'nama_hotel'=>  $hotel->nama,
            'id_user'=> session()->get("id_user"),
            'nama_user'=> session()->get("name"),
            'tgl_book'=> $request->tgl_booking,
            'jumlah_orang'=> $request->jumlah_orang,
            'status'=> "1"
        ]);
        if($save) {
            return response()->json(['code' => '200', 'message'=>'Berhasil booking hotel']);
        }
    }
}
