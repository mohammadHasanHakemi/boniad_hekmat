<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;


class UserController extends Controller
{
    public function __construct()
    {
        // اعمال میدلور برای تمام متدها
        $this->middleware('auth');

        // بررسی نقش کاربر برای تمام متدها
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'user') {
                abort(403, 'ختسینمتسشبی');
            }
            return $next($request);
        });
    }
public function dashboard(){
    // دریافت درخواست‌های کاربر لاگین‌شده
       $requests = Auth::user()->requests()
                ->where('story', '!=','cancel')
                ->get();


        return view('user.dashboard', compact('requests'));
}

public function addrequest(){
        // دریافت درخواست‌های کاربر لاگین‌شده
        $requests = Auth::user()->requests()->get();

        return view('user.addrequest', compact('requests'));
}
public function storerequest( Request $request){
$data = $request->validate([
        'name' => 'required|string|max:25',
        'female' => 'required|string|max:50',
        'phone' => 'required|string|max:15',
        'nationalcode' => 'required|string|max:10',
    ]);

    Auth::user()->requests()->create([
        'name' => $data['name'],
        'female' => $data['female'],
        'phone' => $data['phone'],
        'nationalcode' => $data['nationalcode'],

    ]);

    return redirect()->route('user.dashboard')->with('success', 'درخواست با موفقیت ثبت شد.');

}
public function editrequest($id){
        // دریافت درخواست‌های کاربر لاگین‌شده
        $request = Auth::user()->requests()->find($id);
        return view('user.editrequest', compact('request'));
}
public function updaterequest(Request $request , $id){
    $data = $request->validate([
        'name' => 'required|string|max:25',
        'female' => 'required|string|max:50',
        'phone' => 'required|string|max:15',
        'nationalcode' => 'required|string|max:10',
    ]);

    $thisis = Auth::user()->requests()->findOrFail($id);
    $thisis ->update($data);
        return redirect()->route('user.dashboard')->with('success', 'اطلاعات درخواست با موفقیت ویرایش شد.');
}
public function deleterequest(Request $request , $id){
    $thisis = Auth::user()->requests()->findOrFail($id);

    $thisis->update([

        'story' => 'cancel'
    ]);
     return redirect()->back()->with('success', 'درخواست با موفقیت غیرفعال شد');
}
}
