@extends('leyout.app')
@section("title")
داشبور ادمین
@endsection
@section("content")
<div class="container mx-auto p-4">
    @if(Auth::check())
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
               خوش آمدید مدیر، <strong>{{ Auth::user()->name }}</strong>!
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">داشبورد مدیرتی</h1>
        <p>این صفحه مخصوص مدیر است.</p>

        <!-- دکمه خروج -->
        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                خروج
            </button>
        </form>
    </div>
</div>
@endsection
