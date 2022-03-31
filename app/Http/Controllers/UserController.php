<?php

namespace App\Http\Controllers;

use App\Models\Kpi;
use App\Models\Role;
use App\Models\User;
use App\Mail\SendMail;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $userrole = Auth::user()->role_id;

        if($userrole == 1){
            return view('admins.users.index', [
                'title' => 'User',
                'active' => 'user',
                'users' => User::where('users.status', '=', 1)
                        ->get()
            ]);
        } else {
            return view('admins.users.index', [
                'title' => 'User',
                'active' => 'user',
                'users' => User::where('users.unit_id', '=', Auth::user()->unit_id)
                        ->where('users.status', '=', 1)
                        //->join('roles', 'users.role_id', '=', 'roles.id')
                        //->join('departments', 'users.department_id', '=', 'departments.id')
                        ->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['department'] = DB::table('departments')->orderBy('name', 'asc')->get();
        $data['roles'] = DB::table('roles')->orderBy('name', 'asc')->get();

        return view('admins.users.create', [
            'title' => 'User',
            'active' => 'user',
            //'departments' => Department::all()
        ], $data);
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

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'department_id' => 'required',
            'unit_id' => '',
            'role_id' => ''
        ]);

        $validatedData['password'] = Hash::make('1Love@imu');
        $validatedData['username'] = $validatedData['email'];

        //return ($validateData);
        User::create($validatedData);

        // simpan dan redirect
        return redirect('/users')->with('success', 'New user has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $data['department'] = DB::table('departments')->orderBy('name', 'asc')->get();
        $data['roles'] = DB::table('roles')->orderBy('name', 'asc')->get();

        return view('admins.users.show', [
            'title' => 'User Detail',
            'active' => 'user',
            'user' => $user
        ], $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        //return ($request);

        $rules = [
            'name' => 'required|max:255',
            'position' => '',
            'phone' => '',
            'mobile' => '',
            'department_id' => 'required',
            'unit_id' => 'required',

        ];

        if ($request->file('image')){

            $rules = [
                'image' => 'image|file|max:1024',
            ];

            $validateData['image'] = $request->file('image')->store('post-image');

            $validateData = $request->validate($rules);
        } else {
            $validateData = $request->validate($rules);
        }

        if ($request->file('image')){
            $validateData['image'] = $request->file('image')->store('post-image');
        }

        User::where('id', $user->id)
            ->update($validateData);

        // simpan dan redirect
        return redirect('/users/' . $user->id)->with('success', 'User has benn updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    // profile function


    // get unit dropdown
    public function getState(Request $request)
    {
        $cid=$request->post('cid');
		$state=DB::table('units')->where('department_id',$cid)->orderBy('name','asc')->get();
		$html='<option value="0">Select Unit</option>';
		foreach($state as $list){
			$html.='<option value="'.$list->id.'">'.$list->name.'</option>';
		}
		echo $html;
    }

    // get team name
    public function team()
    {
        $userunit = Auth::user()->unit_id;
        $userrole = Auth::user()->role_id;

        $cYear = date('Y');

        if($userrole == 1){
            return view('admins.users.team', [
                'title' => 'Team Members',
                'active' => 'kpi',
                'users' => User::where('users.status', '=', 1)
                        ->get()
            ]);
        } else {
            return view('admins.users.team', [
                'year' => $cYear,
                'title' => 'User',
                'active' => 'user',
                'users' => User::where('users.unit_id', '=', Auth::user()->unit_id)
                        ->where('users.status', '=', 1)
                        //->join('kpis', 'users.id', '=', 'kpis.user_id')
                        //->where('kpis.kpi_year', $cYear)
                        //->groupBy('kpis.user_id')
                        //->join('roles', 'users.role_id', '=', 'roles.id')
                        //->join('departments', 'users.department_id', '=', 'departments.id')
                        ->get()
            ]);
        }
    }

    public function pizza($id)
    {
        $year = date('Y');
        $user = User::where('users.id', '=', $id)-> first();

        //return ($user);

        //return ($id);
        return view('admins.users.pizza', [
            'title' => 'Individual KPI',
            'active' => 'kpi',
            'user' => $user,
            'kpis' => Kpi::where('user_id', $id)
                   -> where('kpis.kpi_year', $year)
                   -> get()
        ]);
    }

    // kpi detail
    public function kpidetail($id)
    {
        $year = date('Y');
        $kpi = Kpi::where('id', '=', $id)-> first();
        $user = User::where('id', '=', $kpi->user_id)-> first();

        //return ($user);


        //return ($kpi->user_id);

        //return ($id);
        return view('admins.users.kpidetail', [
            'title' => 'Individual KPI',
            'active' => 'kpi',
            'kpi' => $kpi,
            'user' => $user
            // 'user' => User::where('users.id', '=', $kpi->user_id)
            //        -> get()
        ]);
    }

    // test email


    public function send_email()
    {
        return view('admins.users.send-email', [
            'title' => 'User Feedback',
            'active' => 'users'
        ]);
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data = array(
            'name' => $request->name,
            'message' => $request->message
        );

        $id = 2;

        Mail::to($request->email)->send(new SendMail($data, $id));

        return back()->with('success', 'Thanks for contacting us');
    }
}
