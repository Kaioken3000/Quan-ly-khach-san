<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\CatrucNhanvien;

class FullCalenderController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function index(Request $request)
    // {

    //     if ($request->ajax()) {

    //         $data = Event::whereDate('start', '>=', $request->start)
    //             ->whereDate('end',   '<=', $request->end)
    //             ->get(['id', 'title', 'start', 'end']);

    //         return response()->json($data);
    //     }

    //     return view('fullcalender');
    // }
    public function index(Request $request)
    {

        if ($request->ajax()) { 

            $data = CatrucNhanvien::whereDate('ngaybatdau', '>=', $request->start)
                ->whereDate('ngayketthuc',   '<=', $request->end)
                ->get(['id','nhanvienid as title','ngaybatdau as start', 'ngayketthuc as end']);
            
            return response()->json($data);
        }

        return view('fullcalender');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {

        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = Event::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }
}
