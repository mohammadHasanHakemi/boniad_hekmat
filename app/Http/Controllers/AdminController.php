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
                abort(403,'کونی');
            }
            return $next($request);
        });
    }
public function dashboard(){
// دریافت همه درخواست‌ها با اطلاعات کاربر
    $requests = Request::with('user')->get();

    return view('admin.dashboard', compact('requests'));
}

public function userdetail(request $request, $id){
// دریافت همه درخواست‌ها با اطلاعات کاربر
        // دریافت درخواست‌های کاربر لاگین‌شده
        $userrequest = Request::with('user')->findOrFail($id);

    $userrequest->update([

        'story' => 'check'
    ]);
    return view('admin.userdetail', compact('userrequest'))->with('success', 'درخواست با موفقیت چک شد');
}

public function epointment(request $request, $id){
        $requests = Request::with('user')->get();

// دریافت همه درخواست‌ها با اطلاعات کاربر
        // دریافت درخواست‌های کاربر لاگین‌شده
    $userrequest = Request::with('user')->findOrFail($id);

    $userrequest->update([

        'story' => 'epointment'
    ]);
    return view('admin.dashboard', compact('requests'));
}


}
