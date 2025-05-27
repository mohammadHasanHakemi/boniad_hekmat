<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use app\Models\User;
use App\Models\Request;
class AdminController extends Controller
{
        public function __construct()
    {
        // اعمال میدلور برای تمام متدها
        $this->middleware('auth');

        // بررسی نقش کاربر برای تمام متدها
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'admin') {
                abort(404);
            }
            return $next($request);
        });
    }
public function dashboard(){
// دریافت همه درخواست‌ها با اطلاعات کاربر
    $requests = Request::with('user')->get();

    return view('admin.dashboard', compact('requests'));
}





}
