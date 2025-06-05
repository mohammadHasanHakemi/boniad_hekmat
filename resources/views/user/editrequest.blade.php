@extends('leyout.user')
@section('content')
    <!-- Main Content -->
    <main class="flex-1 p-8">
        <header class="bg-white shadow rounded-lg p-6 mb-8">
            <h1 class="text-2xl font-bold text-gray-800">فرم درخواست بورسیه</h1>
        </header>
        <div class="bg-white rounded-lg shadow p-6 max-w-xl mx-auto">
            <form method="Post" action="{{ route('user.updaterequest' , ['id' => $request->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="name">نام</label>
                    <input id="name" name="name" type="text" value="{{ $request->name }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="name">نام خانوادگی</label>
                    <input id="female" name="female" type="text" value="{{ $request->female }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="name">شماره تماس</label>
                    <input id="phone" name="phone" type="text" value="{{ $request->phone }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="name">کد ملی</label>
                    <input id="nationalcode" name="nationalcode" type="text" value="{{ $request->nationalcode }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="name">پایه</label>
                    <input id="grade" name="grade" type="text" value="{{ $request->grade }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="name">عکس</label>
                    <input id="imgpath" name="imgpath" type="file" accept="image/*"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="name"> عکس قبلی</label>
                    <img src="{{ $request->imgpath }}" alt="">
                </div>
                <div class="flex justify-between">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">ذخیره</button>

                    <a href="{{ route('user.dashboard') }}"
                        class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400 transition">انصراف</a>
                </div>
            </form>
            <!-- نمایش تمام خطاهای اعتبارسنجی -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        </div>
    </main>
@endsection
