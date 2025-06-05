<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;
use app\Models\User;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Models\Request as modelrequest;
use App\Models\profile;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpKernel\Profiler\Profile as ProfilerProfile;

class AdminController extends Controller
{
    public function __construct()
    {
        // اعمال میدلور برای تمام متدها
        $this->middleware('auth');

        // بررسی نقش کاربر برای تمام متدها
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'admin') {
                return redirect()->route('login');
            }
            $thisadmin = Auth::user();
            if (!$thisadmin->profile && !$request->is('admin/addprofile') && !$request->is('admin/storeprofile')) {

                return redirect()->route('admin.addprofile');
            }
            return $next($request);
        });
    }
    public function dashboard()
    {

        // دریافت همه درخواست‌ها با اطلاعات کاربر
        $requests = modelrequest::with('user')->get();
        $profile = Auth::user()->profile;
        return view('admin.dashboard', compact('requests','profile'));
    }
public function storeprofile(Request $request)
{
// $profile = $request->validate(
//     [
//             'name' => 'required|string|max:25',
//             'female' => 'required|string|max:50',
//             'nationalcode' => 'required|string|max:12',
//             'phone' => 'required|string|max:15',
//             'position' => 'required|string|max:50',
//     ]
//     );
    // Profile::create(
    //     [
    //         'user_id' => Auth::user()->id,
    //         'name' => $profile['name'],
    //         'female' => $profile['female'],
    //         'nationalcode' => $profile['nationalcode'],
    //         'phone' => $profile['phone'],
    //         'position' => $profile['position'],


    //     ]
    // );
        Profile::create(
        [
            'user_id' => Auth::user()->id,
            'name' => $request['name'],
            'female' => $request['female'],
            'nationalcode' => $request['nationalcode'],
            'phone' => $request['phone'],
            'position' => $request['position'],


        ]
    );
    return redirect()->route('admin.dashboard')->with('success' ,'پروفایل با موفقیت تکمیل شد');
}
public function addprofile(Request $request)
{
    return view('admin.addprofile');

}
    public function dashboardsubmit()
    {
        // دریافت همه درخواست‌ها با اطلاعات کاربر
        $requests = modelrequest::with('user')->get()->where('story', '=',  'submit');

        return view('admin.dashboard', compact('requests'));
    }
    public function dashboardcheck()
    {
        // دریافت همه درخواست‌ها با اطلاعات کاربر
        $requests = modelrequest::with('user')->get()->where('story', '=',  'check');

        return view('admin.dashboard', compact('requests'));
    }
    public function dashboardepointment()
    {
        // دریافت همه درخواست‌ها با اطلاعات کاربر
        $requests = modelrequest::with('user')->get()->where('story', '=',  'epointment');

        return view('admin.dashboard', compact('requests'));
    }
    public function userdetail(request $request, $id)
    {
        // دریافت همه درخواست‌ها با اطلاعات کاربر
        // دریافت درخواست‌های کاربر لاگین‌شده
        $userrequest = modelrequest::with('user')->findOrFail($id);

        $userrequest->update([

            'story' => 'check'
        ]);
        return view('admin.userdetail', compact('userrequest'))->with('success', 'درخواست با موفقیت چک شد');
    }

    public function epointment(Request $request, $id)
    {
        $userrequest = modelrequest::with('user')->findOrFail($id);

        try {
            // فرمت ورودی
            $jalaliDate = $request->mydate;

            // جدا کردن زمان و تاریخ
            [$date, $time] = explode(' ', $jalaliDate);

            // جدا کردن ساعت و دقیقه
            [$hour, $minute, $second] = explode(':', $time);
            // جدا کردن سال، ماه، روز
            [$year, $month, $day] = explode('-', $date);
            $month = str_pad($month, 2, '0', STR_PAD_LEFT);
            $day = str_pad($day, 2, '0', STR_PAD_LEFT);

            // ساخت رشته‌ی تاریخ شمسی با فرمت درست
            $formattedJalaliDate = "$year-$month-$day";

            // تبدیل به تاریخ میلادی با ساعت
            $gregorianDate = Jalalian::fromFormat('Y-m-d', $formattedJalaliDate)
                ->toCarbon()
                ->setTime($hour, $minute, $second);

            // ذخیره در دیتابیس
            $userrequest->update([
                'story' => 'epointment',
                'date' => $gregorianDate
            ]);
            return redirect()->route('admin.dashboard')->with('success', 'درخواست با موفقیت چک شد');
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'خطا تو تاریخ لعنتی!',
                'received_date' =>  $jalaliDate,
                'format_issue' => 'فرمت باید باشه: ساعت:دقیقه سال-ماه-روز (مثل 11:45 1404-12-3)',
                'error_message' => $e->getMessage()
            ], 422);
        }
    }
}
