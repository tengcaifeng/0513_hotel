<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{

    function index(){

        $data = DB::table('hotel_info')
            ->join('hotel_addr','hotel_info.infoId','=','hotel_addr.infoId')
            ->join('hotel_mark','hotel_info.infoId','=','hotel_mark.infoId')
            ->select('hotel_info.*','hotel_addr.*','hotel_mark.*')
            ->limit(100)
            ->get();
        return view('index')->with('data',$data);
    }

    function query(Request $request){
        /*  $s_province = $request->input('s_province','');*/
        $s_city = $request->input('s_city','');

        $info = DB::table('hotel_info')
            ->join('hotel_addr','hotel_info.infoId','=','hotel_addr.infoId')
            ->join('hotel_mark','hotel_info.infoId','=','hotel_mark.infoId')
            ->select('hotel_info.*','hotel_addr.*','hotel_mark.*')
            ->where('city','like',$s_city)
            ->get();

        $data =  json_encode($info);
        return $data;
    }
}
