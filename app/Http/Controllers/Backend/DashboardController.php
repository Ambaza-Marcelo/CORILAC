<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function index()
    {
        if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view dashboard !');
        }


        $month = ['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];
        return view('backend.pages.dashboard.index')->with('month',json_encode($month,JSON_NUMERIC_CHECK));
    }

    public function changeLang(Request $request){
        \App::setlocale($request->lang);
        session()->put("locale",$request->lang);

        return redirect()->back();
    }
}
