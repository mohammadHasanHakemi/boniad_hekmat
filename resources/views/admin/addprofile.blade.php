@extends('leyout.admin')
@section('content')
    <!-- Main Content -->
    <main class="flex-1 p-8">
        <header class="bg-white shadow rounded-lg p-6 mb-8">
            <h1 class="text-2xl font-bold text-gray-800">فرم تکمیل پروفایل</h1>
        </header>
        <div class="bg-white rounded-lg shadow p-6 max-w-xl mx-auto">
            <form method="Post" action="{{ route('admin.storerequest') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="name" >نام</label>
                    <input id="name" name="name" type="text" value='{{ old('name') }}'
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="female" >نام
                        خانوادگی</label>
                    <input id="female" name="female" type="text" value='{{ old(key: 'female') }}'
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                @error('female')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="phone" >شماره تماس</label>
                    <input id="phone" name="phone" type="text" value='{{ old('phone') }}'
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                @error('phone')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="nationalcode" >کد
                        ملی</label>
                    <input id="nationalcode" name="nationalcode" type="text" value='{{ old('nationalcode') }}'
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                @error('nationalcode')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="position" >جایگاه</label>
                    <input id="position" name="position" type="text" value='{{ old('position') }}'
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                @error('position')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
                <div class="flex justify-between">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition"> طلایذخیره</button>
                    <a href="{{ route('user.dashboard') }}"
                        class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400 transition">انصراف</a>
                </div>
            </form>
        </div>
    </main>
@endsection
