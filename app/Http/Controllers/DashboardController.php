<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user()->role;
        // dd($user);
        if ($user == 'admin') {
            $data = Dashboard::getdataall();
            $datachart = Dashboard::datachart();
            $datachartfee = Dashboard::datachartfee();
            return view('admin.dashboard',['data' => $data,'datachart' => $datachart,'datachartfee' => $datachartfee]);
        }elseif ($user == 'user') {
            $data = Dashboard::getdatabyuser(Auth::user()->id);
            // dd($data);
            return view('user.dashboard',['data' => $data]);
        }

        return view('dashboard');
    }

    public function adminDashboard(){

        return 'admin dashboard';
    }
    public function userDashboard(){

        return 'user dashboard';
    }
}
