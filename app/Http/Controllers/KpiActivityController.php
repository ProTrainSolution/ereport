<?php

namespace App\Http\Controllers;

use App\Models\Kpi;
use App\Models\KpiActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class KpiActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $year = date('Y');

        $months = KpiActivity::groupBy('month')
                              -> where('year', $year)
                              -> orderBy('month', 'asc')
                              -> get();

        // $months = DB::table('kpi_activities')
        //         -> select([
        //             DB::raw('sum(kpi_working_hour) as jumlah')
        //         ])
        //         -> where ('year', $year)
        //         -> where ('user_id', Auth::user()->id)
        //         ->groupBy('month')
        //         -> get();

        $kpiactivities = KpiActivity::where('user_id', '=', Auth::user()->id)
                                      -> orderBy('id', 'desc')
                                      -> get();
        //ddd($kpiactivities);

        // for filter result
        if (!empty($request->query('kpi'))){
            $kpiactivities = $kpiactivities->Where('kpi', 'LIKE', '%' . $request->kpi . '%');
        }

        if ($request->kpi_year){
            $kpiactivities = $kpiactivities->Where('year', $request->kpi_year);
        } else {
            $kpiactivities = $kpiactivities->Where('year', $year);
        }

        if ($request->kpi_month){
            $kpiactivities = $kpiactivities->Where('month', $request->kpi_month);
        } else {
        }

        return view('admins.kpiactivities.index', [
            'title' => 'KPI Activity',
            'active' => 'kpiactivities',
            'months' => $months,
            'kpiactivities' => $kpiactivities
            //'taskactivities' => TaskActivity::all()
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

    /**
     * Custom function
     */
    public function createdaily()
    {
        $year = date('Y');

        $kpis = Kpi::where('user_id', Auth::user()->id)
                    -> where ('kpi_year', $year)
                    -> where ('status', 1)
                    -> get();

        return view('admins.kpiactivities.createdaily', [
            'title' => 'KPI Activities',
            'active' => 'kpiactivities',
            'kpis' => $kpis
        ]);
    }

    public function storedaily(Request $request)
    {
        //return ($request);

        $validateData = $request->validate([
            'kpi_id' => 'required',
            'kpi_description' => '',
            'report_date' => 'required',
            'kpi_working_hour' => 'required|numeric|min:1',
            'kpi_progress' => 'required|numeric|between:1,100'
        ]);

        $fDate = $request->report_date;
        $fDate = explode('-', $fDate);

        $validateData['year'] = $fDate['0'];
        $validateData['month'] = $fDate['1'];

        $validateData['user_id'] = auth()->user()->id;

        // value untuk update
        //$valUpdate['id'] = $request->kpi_id;
        $valUpdate['progress'] = $request->kpi_progress;

        KpiActivity::create($validateData);

        // update current KPI Progress
        KPI::where('id', $request->kpi_id)
                   ->update($valUpdate);

        // simpan dan redirect
        return redirect('/kpiactivities')->with('success', 'New KPI activities has been added!');
    }

    public function editdaily($id)
    {
        $year = date('Y');
        $kpis = Kpi::where('user_id', Auth::user()->id)
               -> where('kpi_year', $year)
               -> get();

        //return ($id);
        $kpiactivity = KpiActivity::where('id', $id)
                      ->first();

        return view('admins.kpiactivities.editdaily', [
            'title' => 'Edit KPI Activity',
            'active' => 'kpiactivities',
            'kpis' => $kpis,
            'kpiactivity' => $kpiactivity
        ]);
    }

    public function updatedaily(Request $request)
    {
        $validateData = $request->validate([
            'kpi_description' => '',
            'report_date' => 'required',
            'kpi_working_hour' => 'required|numeric|min:1',
            'kpi_progress' => 'required|numeric|between:1,100'
        ]);

        //return ($request);
        KpiActivity::where('id', $request->id)
                    ->update($validateData);

        $valUpdate['progress'] = $request->kpi_progress;

        // update current KPI Progress
        KPI::where('id', $request->kpi_id)
            ->update($valUpdate);

        // simpan dan redirect
        return redirect('/kpiactivities')->with('success', 'Kpi activity has benn updated!');
    }

    /**
     * Manage weekly KPI
     */
    public function createweekly ()
    {
        $year = date('Y');

        $kpis = Kpi::where('user_id', Auth::user()->id)
                    -> where ('kpi_year', $year)
                    -> where ('status', 1)
                    -> get();

        return view('admins.kpiactivities.createweekly', [
            'title' => 'Create Weekly KPI Activity',
            'active' => 'kpiactivities',
            'kpis' => $kpis

        ]);
    }

    public function storeweekly(Request $request)
    {
        //return ($request);

        $validateData = $request->validate([
            'kpi_id' => 'required',
            'kpi_description' => '',
            'kpi_week' => 'required',
            'kpi_working_hour' => 'required|numeric|min:1',
            'kpi_progress' => 'required|numeric|between:1,100'
        ]);

        //return ($validateData);

        $fDate = $request->kpi_week;
        $fDate = explode('_', $fDate);

        $validateData['year'] = date('Y');
        $validateData['week'] = $fDate['0'];
        $validateData['month'] = $fDate['1'];

        $validateData['user_id'] = auth()->user()->id;

        // value untuk update
        //$valUpdate['id'] = $request->kpi_id;
        $valUpdate['progress'] = $request->kpi_progress;

        KpiActivity::create($validateData);

        // update current KPI Progress
        KPI::where('id', $request->kpi_id)
                   ->update($valUpdate);

        // simpan dan redirect
        return redirect('/kpiactivities')->with('success', 'New KPI activities has been added!');
    }

    public function editweekly($id)
    {
        $year = date('Y');
        $kpis = Kpi::where('user_id', Auth::user()->id)
               -> where('kpi_year', $year)
               -> get();

        //return ($id);
        $kpiactivity = KpiActivity::where('id', $id)
                      ->first();

        return view('admins.kpiactivities.editweekly', [
            'title' => 'Edit KPI Activity',
            'active' => 'kpiactivities',
            'kpis' => $kpis,
            'kpiactivity' => $kpiactivity
        ]);
    }

    public function updateweekly(Request $request)
    {
        $validateData = $request->validate([
            'kpi_id' => 'required',
            'kpi_description' => '',
            'kpi_working_hour' => 'required|numeric|min:1',
            'kpi_progress' => 'required|numeric|between:1,100'
        ]);

        $fDate = $request->kpi_week;
        $fDate = explode('_', $fDate);

        $validateData['year'] = date('Y');
        $validateData['week'] = $fDate['0'];
        $validateData['month'] = $fDate['1'];

        //return ($request);

        //return ($validateData);

        KpiActivity::where('id', $request->id)
                    ->update($validateData);

        $valUpdate['progress'] = $request->kpi_progress;

        // update current KPI Progress
        KPI::where('id', $request->kpi_id)
            ->update($valUpdate);

        // simpan dan redirect
        return redirect('/kpiactivities')->with('success', 'Kpi activity has benn updated!');
    }

    /**
     * Check current progress
     */
    public function getCategory($category_id)
    {
        $data = DB::table('kpis')->where('id',$category_id)->get();
        return response()->json(['data' => $data]);
    }

    public function getHour($id){
        //return ($id);
        $jumlah = DB::table("kpi_activities")
                ->select(DB::raw("SUM(kpi_working_hour) as count"))
                -> where ('user_id', Auth::user()->id)
                -> where ('month', $id)
                -> where ('year', 2022)
                -> get();
        //dd($jumlah);
        return ($jumlah);
    }
}
