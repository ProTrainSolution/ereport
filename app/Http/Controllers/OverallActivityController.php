<?php

namespace App\Http\Controllers;

use App\Models\KpiActivity;

use App\Models\TaskActivity;
use Illuminate\Http\Request;
use App\Models\OtherActivity;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class OverallActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $year = date('Y');

        $months = KpiActivity::groupBy('month')
                              -> where('year', $year)
                              -> orderBy('month', 'asc')
                              -> get();

        $kpiactivities = KpiActivity::where('year', $year)->where('user_id', Auth::user()->id)->get();

        return view ('admins.overallactivities.index', [
            'title' => 'Overall Activities',
            'active' => 'overallactivities',
            'months' => $months,
            'kpiactivities' => $kpiactivities

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
}
