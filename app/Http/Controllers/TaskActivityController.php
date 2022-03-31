<?php

namespace App\Http\Controllers;

use App\Models\TaskActivity;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class TaskActivityController extends Controller
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

        $months = TaskActivity::groupBy('month')
                              -> where('year', $year)
                              -> orderBy('month', 'asc')
                              -> get();

        $taskactivities = TaskActivity::where('user_id', '=', Auth::user()->id)
                                      -> orderBy('id', 'desc')
                                      -> get();
        // for filter result
        if (!empty($request->query('task'))){
            $taskactivities = $taskactivities->Where('task', 'LIKE', '%' . $request->task . '%');
        }

        if ($request->task_year){
            $taskactivities = $taskactivities->Where('year', $request->task_year);
        } else {
            $taskactivities = $taskactivities->Where('year', $year);
        }

        if ($request->task_month){
            $taskactivities = $taskactivities->Where('month', $request->task_month);
        } else {
        }

        return view('admins.taskactivities.index', [
            'title' => 'Non KPI Activity',
            'active' => 'taskactivity',
            'months' => $months,
            'taskactivities' => $taskactivities
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
    public function destroy(TaskActivity $taskactivity)
    {
        //return ($taskactivity);
        //
        TaskActivity::destroy($taskactivity->id);

        // simpan dan redirect
        return redirect('/taskactivities')->with('delete', 'Activity has been deleted!');
    }

    // ------------------------------
    // new task activity daily
    // ------------------------------
    public function createdaily()
    {
        $year = date('Y');

        $tasks = Task::where('user_id', Auth::user()->id)
                    -> where ('task_year', $year)
                    -> where ('status', 1)
                    ->get();

        return view('admins.taskactivities.createdaily', [
            'title' => 'Task Activities',
            'active' => 'taskactivities',
            'tasks' => $tasks
        ]);
    }

    public function storedaily(Request $request)
    {
        $validateData = $request->validate([
            'task_act' => 'required',
            'task_description' => '',
            'report_date' => 'required',
            'task_working_hour' => 'required|numeric|min:1',
            'task_progress' => 'required|numeric|between:1,100'
        ]);

        $fDate = $request->report_date;
        $fDate = explode('-', $fDate);

        $validateData['year'] = $fDate['0'];
        $validateData['month'] = $fDate['1'];

        $validateData['user_id'] = auth()->user()->id;

        TaskActivity::create($validateData);

        //return ($validateData);

        // simpan dan redirect
        return redirect('/taskactivities')->with('success', 'New task activities has been added!');
    }

    public function editdaily($id)
    {
        $year = date('Y');
        $tasks = Task::where('user_id', Auth::user()->id)
               -> where('task_year', $year)
               ->get();

        //return ($id);
        $taskactivity = TaskActivity::where('id', $id)
                      ->first();

        return view('admins.taskactivities.editdaily', [
            'title' => 'Edit Non KPI Activity',
            'active' => 'taskactivities',
            'tasks' => $tasks,
            'taskactivity' => $taskactivity
        ]);
    }

    public function updatedaily(Request $request)
    {
        $validateData = $request->validate([
            'task_act' => 'required',
            'task_description' => '',
            'report_date' => 'required',
            'task_working_hour' => 'required|numeric|min:1',
            'task_progress' => 'required|numeric|between:1,100'
        ]);

        //return ($request);
        TaskActivity::where('id', $request->id)
                    ->update($validateData);

        // simpan dan redirect
        return redirect('/taskactivities')->with('success', 'Task activity has benn updated!');
    }

    // -------------------- close daily task activity ----------------------

    // ------------------------------
    // new task activity weekly
    // ------------------------------
    public function createweekly()
    {
        $year = date('Y');

        $tasks = Task::where('user_id', Auth::user()->id)
                    -> where ('task_year', $year)
                    -> where ('status', 1)
                    ->get();

        return view('admins.taskactivities.createweekly', [
            'title' => 'Task Activities',
            'active' => 'taskactivities',
            'tasks' => $tasks
        ]);
    }

    public function storeweekly(Request $request)
    {
        $validateData = $request->validate([
            'task_act' => 'required',
            'task_description' => '',
            'week' => 'required',
            'task_working_hour' => 'required|numeric|min:1',
            'task_progress' => 'required|numeric|between:1,100'
        ]);

        //return ($validateData);

        $fDate = $request->week;
        $fDate = explode('_', $fDate);

        $validateData['year'] = date('Y');
        $validateData['week'] = $fDate['0'];
        $validateData['month'] = $fDate['1'];

        $validateData['user_id'] = auth()->user()->id;

        TaskActivity::create($validateData);

        //return ($validateData);

        // simpan dan redirect
        return redirect('/taskactivities')->with('success', 'New task activities has been added!');
    }

    // edit weekly activity
    public function editweekly($id)
    {
        $year = date('Y');
        $tasks = Task::where('user_id', Auth::user()->id)
               -> where('task_year', $year)
               ->get();

        //return ($id);
        $taskactivity = TaskActivity::where('id', $id)
                      ->first();

        return view('admins.taskactivities.editweekly', [
            'title' => 'Edit Non KPI Activity',
            'active' => 'taskactivities',
            'tasks' => $tasks,
            'taskactivity' => $taskactivity
        ]);
    }

    public function updateweekly(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'task_act' => 'required',
            'task_description' => '',
            'week' => 'required',
            'task_working_hour' => 'required|numeric|min:1',
            'task_progress' => 'required|numeric|between:1,100'
        ]);

        $fDate = $request->week;
        $fDate = explode('_', $fDate);

        $validateData['year'] = date('Y');
        $validateData['week'] = $fDate['0'];
        $validateData['month'] = $fDate['1'];

        //return ($request);
        //return ($validateData);
        TaskActivity::where('id', $request->id)
                    ->update($validateData);

        // simpan dan redirect
        return redirect('/taskactivities')->with('success', 'Task activity has benn updated!');
    }
}
