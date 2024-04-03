<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelsModel;
use App\Models\BookingModel;
use Illuminate\Support\Facades\Hash;
use DataTables;

class HotelController extends Controller
{
    //
    public function Index(Request $request)
    {
        return view("backend.hotels", ["title" => "Hotel"]);
    }
    // =================================================================================================================================
    public function MyBooking(Request $request)
    {
        return view("backend.user.my-booking", ["title" => "My Booking"]);
    }
    // =================================================================================================================================
    public function LoadAjaxHotels(Request $request)
    {
        if ($request->ajax()) {

            $data = HotelsModel::where('deleted_at', null);

            return Datatables::of($data)
                    ->addIndexColumn()
                   
            
                    ->addColumn('gambar', function($row){
                            $btn = '<div class="symbol symbol-100px" >
                            <div class="symbol-label" style="background-image:url('.url('/hotel').'/'.$row->gambar.')" ></div>
                        </div>';
                            return $btn;
                    })
                    ->addColumn('aksi', function($row){
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_1" data-id="'.$row->id.'" data-nama="'.$row->nama.'" data-id_lokasi="'.$row->id_lokasi.'" data-nama_lokasi="'.$row->nama_lokasi.'" data-image="'.url('/hotel').'/'.$row->gambar.'" data-alamat="'.$row->alamat.'" id="edit">Edit</a> <a href="javascript:void(0)" id="hapus" data-id="'.$row->id.'" class="edit btn btn-danger btn-sm ms-2">Hapus</a>';
                            return $btn;
                    })
                    ->rawColumns(['aksi','gambar'])
                    ->make(true);
        }
    }
    // ====================================================================================================================================
    public function SimpanHotel(Request $request)
    {

        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if($request->image) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('hotel'), $imageName);
        } else {
            $imageName = "";
        }
        $lokasi = explode("-", $request->lokasi);
        if($request->id != "") {
            if($imageName != "") {
                $save = HotelsModel::where("id", $request->id)->update([
                    'nama' =>  $request->name,
                    'gambar' => $imageName,
                    'id_lokasi' => $lokasi[0],
                    'nama_lokasi' => $lokasi[1],
                    'alamat' => $request->alamat
                ]);
            } else {
                $save = HotelsModel::where("id", $request->id)->update([
                    'nama' =>  $request->name,
                    'id_lokasi' => $lokasi[0],
                    'nama_lokasi' => $lokasi[1],
                    'alamat' => $request->alamat
                ]);
            }
        } else {
            if($imageName != "") {
                $save = HotelsModel::create([
                    'nama' =>  $request->name,
                    'gambar' => $imageName,
                    'id_lokasi' => $lokasi[0],
                    'nama_lokasi' => $lokasi[1],
                    'alamat' => $request->alamat
                ]);
            } else {
                $save = HotelsModel::create([
                    'nama' =>  $request->name,
                    'id_lokasi' => $lokasi[0],
                    'nama_lokasi' => $lokasi[1],
                    'alamat' => $request->alamat
                ]);
            }
            
        }
        if($save) {
            return response()->json(['code' => '200', 'message'=>'Berhasil menambahkan data']);
        }
    }
    // =======================================================================================================================================
    public function HapusHotel(Request $request)
    {
        $save = HotelsModel::where('id', $request->id)->update([
            'deleted_at' => date("Y-m-d H:i:s")
        ]);
        if($save) {
            return response()->json(['code' => '200', 'message'=>'Berhasil menghapus data']);
        }
    }
    // =======================================================================================================================================
    public function ReportReservasi(Request $request)
    {
        return view("backend.report-reservasi", ["title" => "Report Reservasi"]);
    }
    // =======================================================================================================================================
    public function LoadAjaxHotelReservasiReport(Request $request)
    {
        if ($request->ajax()) {

            $data = BookingModel::where('deleted_at', null);

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                            if($row->status == "1") {
                                return '<span class="badge badge-primary">Pending</span>';
                            } else if($row->status == "2") {
                                return '<span class="badge badge-success">Done</span>';
                            } else if($row->status == "3") {
                                return '<span class="badge badge-success">Batal</span>';
                            }
                    })
                    ->addColumn('aksi', function($row){
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_1" data-id="'.$row->id.'" id="edit">Edit</a> <a href="javascript:void(0)" id="hapus" data-id="'.$row->id.'" class="edit btn btn-danger btn-sm ms-2">Hapus</a>';
                            return $btn;
                    })
                    ->rawColumns(['aksi','status'])
                    ->make(true);
        }
    }
    // =========================================================================================================================================
    public function MyBookingAjax(Request $request)
    {
        if ($request->ajax()) {

            $data = BookingModel::where(['id_user' => session()->get("id_user"),'deleted_at' => null]);

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                            if($row->status == "1") {
                                return '<span class="badge badge-primary">Pending</span>';
                            } else if($row->status == "2") {
                                return '<span class="badge badge-success">Done</span>';
                            } else if($row->status == "3") {
                                return '<span class="badge badge-dark">Batal</span>';
                            }
                    })
                    ->addColumn('aksi', function($row){
                        if($row->status == "1") {
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_1" data-id="'.$row->id.'" data-tgl_booking="'.$row->tgl_book.'" data-jumlah_orang="'.$row->jumlah_orang.'" id="edit">Edit</a>';
                            return $btn;
                        } else {
                            return "";
                        }
                    })
                    ->rawColumns(['aksi','status'])
                    ->make(true);
        }
    }
    // =========================================================================================================================================
    public function ReportUpdateStatusBooking(Request $request)
    {
        $save = BookingModel::where('id', $request->id)->update([
            'status' => $request->status
        ]);
        if($save) {
            return response()->json(['code' => '200', 'message'=>'Berhasil menghapus data']);
        }
    }
    // =========================================================================================================================================
    public function ReportHapusBookingHotel(Request $request)
    {
        $save = BookingModel::where('id', $request->id)->update([
            'deleted_at' => date("Y-m-d H:i:s")
        ]);
        if($save) {
            return response()->json(['code' => '200', 'message'=>'Berhasil menghapus data']);
        }
    }
    // =========================================================================================================================================
    public function MyBookingUpdate(Request $request)
    {
        $save = BookingModel::where('id', $request->id)->update([
            'tgl_book' => $request->tgl_booking,
            'jumlah_orang' => $request->jumlah_orang,
            "status" =>  $request->status
        ]);
        if($save) {
            return response()->json(['code' => '200', 'message'=>'Berhasil update data']);
        }
    }
}
