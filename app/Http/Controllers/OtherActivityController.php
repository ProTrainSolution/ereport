<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OtherActivity;
use Illuminate\Support\Facades\Auth;

class OtherActivityController extends Controller
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

        $months = OtherActivity::groupBy('month')
                              -> where('year', $year)
                              -> orderBy('month', 'asc')
                              -> get();

        $otheractivities = OtherActivity::where('user_id', '=', Auth::user()->id)
                                      -> orderBy('id', 'desc')
                                      -> get();
        //dd($otheractivities);

        // for filter result
        if (!empty($request->query('task'))){
            $otheractivities = $otheractivities->Where('task', 'LIKE', '%' . $request->task . '%');
        }

        if ($request->task_year){
            $otheractivities = $otheractivities->Where('year', $request->task_year);
        } else {
            $otheractivities = $otheractivities->Where('year', $year);
        }

        if ($request->task_month){
            $otheractivities = $otheractivities->Where('month', $request->task_month);
        } else {
        }

        return view('admins.otheractivities.index', [
            'title' => 'Other Activity',
            'active' => 'otheractivities',
            'months' => $months,
            'otheractivities' => $otheractivities
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
    public function show(OtherActivity $otheractivity)
    {
        //
        return view('admins.otheractivities.show', [
            'title' => 'Other Activity Detail',
            'active' => 'otheractivities',
            'otheractivity' => $otheractivity
            //'taskactivities' => TaskActivity::all()
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

    /**
     * Create daily process
     */

    public function createdaily()
    {
        $year = date('Y');

        return view('admins.otheractivities.createdaily', [
            'title' => 'Add Other Activities',
            'active' => 'otheractivities',
        ]);
    }

    public function storedaily(Request $request)
    {
        //return ($request);

        $validateData = $request->validate([
            'other_act' => 'required|max:255',
            'other_leader' => 'required|max:255',
            'other_description' => 'required|',
            'report_date' => 'required',
            'other_working_hour' => 'required|numeric|min:1',
            'other_remark' => ''
        ]);

        $fDate = $request->report_date;
        $fDate = explode('-', $fDate);

        $validateData['year'] = $fDate['0'];
        $validateData['month'] = $fDate['1'];

        $validateData['user_id'] = auth()->user()->id;

        // value untuk update
        //$valUpdate['id'] = $request->kpi_id;
        $valUpdate['progress'] = $request->kpi_progress;

        OtherActivity::create($validateData);

        // simpan dan redirect
        return redirect('/otheractivities')->with('success', 'Other activities has been added!');
    }

    public function editdaily($id)
    {

        //return ($id);
        $otheractivity = OtherActivity::where('id', $id)
                       ->first();

        return view('admins.otheractivities.editdaily', [
            'title' => 'Edit Other Activity',
            'active' => 'otheractivities',
            'otheractivity' => $otheractivity
        ]);
    }

    public function updatedaily(Request $request)
    {
        //return ($request);

        $validateData = $request->validate([
            'other_act' => 'required|max:255',
            'other_leader' => 'required|max:255',
            'other_description' => '',
            'report_date' => 'required',
            'other_working_hour' => 'required|numeric|min:1',
            'other_remark' => ''
        ]);

        //return ($validateData);

        // update current KPI Progress
        OtherActivity::where('id', $request->id)
                     ->update($validateData);

        // simpan dan redirect
        return redirect('/otheractivities')->with('success', 'Other activity has benn updated!');
    }

    /**
     * Create weekly activity
     */
    public function createweekly()
    {
        $year = date('Y');

        return view('admins.otheractivities.createweekly', [
            'title' => 'Add Other Activities',
            'active' => 'otheractivities',
        ]);
    }

    public function storeweekly(Request $request)
    {
        //return ($request);

        $validateData = $request->validate([
            'other_act' => 'required|max:255',
            'other_leader' => 'required|max:255',
            'other_description' => 'required|',
            'report_date' => '0000-00-00',
            'other_working_hour' => 'required|numeric|min:1',
            'other_remark' => ''
        ]);

        $fDate = $request->other_week;
        $fDate = explode('_', $fDate);

        $validateData['year'] = date('Y');
        $validateData['week'] = $fDate['0'];
        $validateData['month'] = $fDate['1'];

        $validateData['user_id'] = auth()->user()->id;

        // value untuk update
        //$valUpdate['id'] = $request->kpi_id;

        //return ($validateData);

        OtherActivity::create($validateData);

        // simpan dan redirect
        return redirect('/otheractivities')->with('success', 'Other activities has been added!');
    }

    public function editweekly($id)
    {

        //return ($id);
        $otheractivity = OtherActivity::where('id', $id)
                       ->first();

        return view('admins.otheractivities.editweekly', [
            'title' => 'Edit Other Activity',
            'active' => 'otheractivities',
            'otheractivity' => $otheractivity
        ]);
    }

    public function updateweekly(Request $request)
    {
        //return ($request);

        $validateData = $request->validate([
            'other_act' => 'required|max:255',
            'other_leader' => 'required|max:255',
            'other_description' => '',
            'other_working_hour' => 'required|numeric|min:1',
            'other_remark' => ''
        ]);

        $fDate = $request->other_week;
        $fDate = explode('_', $fDate);

        $validateData['year'] = date('Y');
        $validateData['week'] = $fDate['0'];
        $validateData['month'] = $fDate['1'];

        $validateData['user_id'] = auth()->user()->id;

        //return ($validateData);

        // update current KPI Progress
        OtherActivity::where('id', $request->id)
                     ->update($validateData);

        // simpan dan redirect
        return redirect('/otheractivities')->with('success', 'Other activity has benn updated!');
    }

}
