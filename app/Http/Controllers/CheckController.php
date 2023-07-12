<?php

namespace App\Http\Controllers;

use App\Models\Check;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info("nam");
        $checks = Check::orderBy('id', 'asc')->paginate(5);
        return view('checks.index', compact('checks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ngaycheckin' => 'required',
            'giocheckin' => 'required',
            'ngaycheckout' => 'required',
            'giocheckout' => 'required',
            'nhanvienid' => 'required',
        ]);

        Check::create($request->post());

        return redirect()->route('checks.index')->with('success', 'Check has been created successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkin(Request $request)
    {
        $request->validate([
            'nhanvienid' => 'required',
        ]);

        $ngaycheckin = date("y-m-d");
        $giocheckin = date("h:i:s");

        Check::create(
            ['nhanvienid' => $request->nhanvienid, 'ngaycheckin' => $ngaycheckin, 'giocheckin' => $giocheckin]
        );

        return redirect()->back()->with('message', 'Check in Successful !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\check  $check
     * @return \Illuminate\Http\Response
     */
    public function show(Check $check)
    {
        return view('checks.show', compact('check'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function edit(Check $check)
    {
        return view('checks.edit', compact('check'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\check  $check
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Check $check)
    {
        $request->validate([
            'ngaycheckin' => 'required',
            'giocheckin' => 'required',
            'ngaycheckout' => 'required',
            'giocheckout' => 'required',
            'nhanvienid' => 'required',
        ]);

        $check->fill($request->post())->save();

        return redirect()->route('checks.index')->with('success', 'Check Has Been updated successfully');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\check  $check
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request, Check $check)
    {
        $request->validate([
            'nhanvienid' => 'required',
        ]);

        $ngaycheckout = date("y-m-d");
        $giocheckout = date("h:i:s");

        // $check->fill(
        //     ['nhanvienid' => $request->nhanvienid, 'ngaycheckout' => $ngaycheckout, 'giocheckout' => $giocheckout]
        // )->save();
        Check::where('nhanvienid', $request->nhanvienid)
            ->orderBy('id','desc')
            ->take(1)
            ->update(['ngaycheckout' => $ngaycheckout, 'giocheckout' => $giocheckout]);

        return redirect()->back()->with('message', 'Check out Successful !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function destroy(Check $check)
    {
        $check->delete();
        return redirect()->route('checks.index')->with('success', 'Check has been deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $checks = Check::where('id', 'LIKE', '%' . $request->search . "%")
            ->orWhere('ngaycheckin', 'LIKE', '%' . $request->search . "%")
            ->orWhere('giocheckin', 'LIKE', '%' . $request->search . "%")
            ->orWhere('ngaycheckout', 'LIKE', '%' . $request->search . "%")
            ->orWhere('giocheckout', 'LIKE', '%' . $request->search . "%")
            ->orderBy('id', 'asc')->paginate(5);
        return view('checks.search', compact('checks'));
    }
}
