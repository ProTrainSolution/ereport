<?php

namespace App\Http\Controllers;

use App\Models\Kpi;
use App\Models\KpiActivity;
use App\Models\User;
use Carbon\Carbon;

use App\Models\TaskActivity;
use Illuminate\Http\Request;
use App\Models\OtherActivity;
use Illuminate\Support\Facades\Auth;
use App\Http\Controller\LineManagerController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        //return ($user);

        // return view('home', [
        //     'user' => $user
        // ]);

        //$nilai = 'ini nilai dia;';

        $kpis = Kpi::where('user_id', Auth::user()->id)
                    -> where ('kpi_year', date('Y'))
                    -> get();


        if (Auth::user()->role_id == 1){
            return view('admins.dashboard');
        } else if (Auth::user()->role_id == 2){
            return view('managers.dashboard');
        } else if (Auth::user()->role_id == 3){
            $kpiActivities = KpiActivity:: where ('user_id', Auth::user()->id)
                                        -> where ('year', date('Y'))
                                        -> orderBy('created_date', 'desc')
                                        -> take(5)->get();

            $taskActivities = TaskActivity:: where ('user_id', Auth::user()->id)
                                         -> where ('year', date('Y'))
                                         -> orderBy('created_at', 'desc')
                                         -> take(5)->get();

            $otherActivities = OtherActivity:: where ('user_id', Auth::user()->id)
                                         -> where ('year', date('Y'))
                                         -> orderBy('created_at', 'desc')
                                         -> take(5)->get();

            return view('users.dashboard', [
                'nilai' => 'ini nilai',
                'nilai' => 'nilai',
                'kpis' => $kpis,
                'members' => '$members',
                'kpiActivities' => $kpiActivities,
                'taskActivities' => $taskActivities,
                'otherActivities' => $otherActivities
            ]);
        } else if (Auth::user()->role_id == 4){
            $members = User:: where('unit_id', Auth::user()->unit_id)
                           -> where ('status', 1)
                           -> get();

            // get activity values
            $kpiActivities = KpiActivity:: where ('user_id', Auth::user()->id)
                                        -> where ('year', date('Y'))
                                        -> orderBy('created_date', 'desc')
                                        -> take(5)->get();

            $taskActivities = TaskActivity:: where ('user_id', Auth::user()->id)
                                         -> where ('year', date('Y'))
                                         -> orderBy('created_at', 'desc')
                                         -> take(5)->get();

            $otherActivities = OtherActivity:: where ('user_id', Auth::user()->id)
                                         -> where ('year', date('Y'))
                                         -> orderBy('created_at', 'desc')
                                         -> take(5)->get();

            return view('linemanagers.dashboard', [
                'nilai' => 'nilai',
                'kpis' => $kpis,
                'members' => $members,
                'kpiActivities' => $kpiActivities,
                'taskActivities' => $taskActivities,
                'otherActivities' => $otherActivities
            ]);
            //return view('admins.lmdashboard');
            //app('App\Http\Controllers\LineManagerController')->method('index');
        } else {}

        // if (Auth::user()->role_id == 1){
        //     return view('admins.dashboard');
        // } else if (Auth::user()->role_id == 2){
        //     return view('managers.dashboard');
        // } else if (Auth::user()->role_id == 3){
        //     return view('users.dashboard');
        // } else if (Auth::user()->role_id == 4){
        //     return view('linemanagers.dashboard');
        //     //return ('ini dia');
        // } else {

        // }
    }

    public function getHour()
    {
        $year = date('Y');
        $total = '';
        for ($i = 1; $i <= 12; ++$i) {
            $act1 = KpiActivity::where('user_id', Auth::user()->id)
                               -> where ('year', $year)
                               -> where ('month', $i)
                               -> sum('kpi_working_hour');
            $act2 = TaskActivity::where('user_id', Auth::user()->id)
                               -> where ('year', $year)
                               -> where ('month', $i)
                               -> sum('task_working_hour');
            $act3 = OtherActivity::where('user_id', Auth::user()->id)
                               -> where ('year', $year)
                               -> where ('month', $i)
                               -> sum('other_working_hour');

            $acts = $act1 + $act2 + $act3;
            $total .= $acts . ',';
        }
        //dd($total);
        return($total);
    }

    public function getRadarLabels()
    {
        //$data = 'satu', 'dua', 'tiga', 'empat', 'lima';
        //return($data);
    }
}
