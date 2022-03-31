<?php

namespace App\Http\Controllers;

use App\Models\Kpi;
use App\Models\Scorecard;
use Illuminate\Http\Request;

class KpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admins.kpis.create', [
            'title' => 'KPI',
            'active' => 'kpi',
            'scorecards' => Scorecard::all()
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
            'target' => 'required',
            'measurement' => 'required',
            'remark' => '',
        ]);

        //return($request);

        $validateData['user_id'] = auth()->user()->id;

        Kpi::create($validateData);

        // simpan dan redirect
        return redirect('/kpis')->with('success', 'New KPI has been added!');
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
    public function edit(Kpi $kpi)
    {
        //
        return view('admins.kpis.edit', [
            'title' => 'KPI',
            'active' => 'kpi',
            'kpi' => $kpi,
            'scorecards' => Scorecard::all()
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

    public function individual(){
        return view('admins.kpis.individual', [
            'title' => 'KPI',
            'active' => 'kpi',
            //'kpis' => Kpi::all()
            'kpis' => Kpi::where('user_id', auth()->user()->id)->get()
        ]);
    }

    // store individual
    public function storeindividual(Request $request){
        //return ($request);

        $validateData = $request->validate([
            'kpi' => 'required|max:255',
            'scorecard_id' => 'required',
            'kpi_year' => 'required',
            'weightage' => 'required',
            // 'description' => '',
            'target' => 'required',
            'measurement' => 'required',
            'remark' => '',
        ]);

        //return($request);

        $validateData['kpi_type_id'] = 4;
        $validateData['kpi_department_id'] = 0;
        //$validateData['weightage'] = 20;
        $validateData['user_id'] = auth()->user()->id;

        Kpi::create($validateData);

        // simpan dan redirect
        return redirect('/kpis/individual')->with('success', 'New KPI has been added!');
    }

    //
    public function showkpi(Request $request)
    {
        //$where = array('id' => $id);
        //$kpi  = Kpi::where('kpis.id', $request->title)->first();
        $id = $request->title;

        $where = array('id' => $id);
        $kpi  = Kpi::where($where)->first();

        return response()->json($kpi);
    }
}
