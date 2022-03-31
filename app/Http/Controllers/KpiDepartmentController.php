<?php

namespace App\Http\Controllers;

use App\Models\KpiDepartment;
use App\Models\Scorecard;
use Illuminate\Http\Request;

class KpiDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admins.kpidepartments.index', [
            "title" => "Department KPI",
            "active" => "kpidepartment",
            "kpidepartments" => KpiDepartment::all()
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
        return view('admins.kpidepartments.create', [
            "title" => "Department KPI",
            "active" => "kpidepartment",
            "scorecards" => Scorecard::all()
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
        //return($request);

        $validateData = $request->validate([
            'kpi' => 'required|max:255',
            'scorecard_id' => 'required',
            'kpi_year' => 'required',
            'description' => '',
            'target' => '',
            'measurement' => '',
            'remark' => '',
        ]);

        //return($request);

        $validateData['user_id'] = auth()->user()->id;

        KpiDepartment::create($validateData);

        // simpan dan redirect
        return redirect('/kpidepartments')->with('success', 'New department KPI has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kpidepartment $kpidepartment)
    {
        //
        return view('admins.kpidepartments.show', [
            "title" => "Department KPI",
            "active" => "kpidepartment",
            "kpidepartment" => $kpidepartment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
