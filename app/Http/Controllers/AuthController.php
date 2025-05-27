<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;

class AuthController extends Controller
{
    // نمایش فرم ورود
    public function showLoginForm()
    {
        return view('login'); // ایجاد این ویو در مرحله بعد
    }
public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string|min:8',
    ]);

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();

        session([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'ip_address' => $request->ip(),
            'last_activity' => now()->timestamp
        ]);

        return redirect()->intended(route('roler'))
               ->with('security_token', \Illuminate\Support\Str::random(40));
    }

    return back()->withErrors([
        'username' => 'نام کاربری یا رمز عبور اشتباه است.',
    ])->withInput($request->only('username', 'remember'));
}
public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

public function roler (){
// بررسی لاگین بودن کاربر
        // if (!Auth::check()) {
        //     return redirect()->route('login'); // ریدایرکت به صفحه لاگین
        // }

        // دریافت کاربر لاگین‌شده
        $user = Auth::user();

        // بررسی نقش کاربر
        if ($user->role === 'user') {
            return redirect()->route('user.dashboard');
        }
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

}









}
