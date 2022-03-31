<?php

namespace App\Http\Controllers;

use App\Models\KpiType;
use Illuminate\Http\Request;

class KpiTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admins.kpitypes.index', [
            'title' => 'KPI Type',
            'active' => 'kpitype',
            'kpitypes' => KpiType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admins.kpitypes.create', [
            'title' => 'KPI Type',
            'active' => 'kpitype'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'remark' => '',
        ]);

        KpiType::create($validateData);

        return redirect('/kpitypes')->with('success', 'New KPI type has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(KpiType $kpitype)
    {
        //
        return view('admins.kpitypes.edit', [
            'title' => 'KPI Type',
            'active' => 'kpitype',
            'kpitype' => $kpitype
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
