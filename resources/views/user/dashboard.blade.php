@extends('leyout.user')
@section("content")
{{-- <div class="container mx-auto p-4">
    @if(Auth::check())
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
             خوش آمدید، <strong>{{ Auth::user()->name }}</strong>!
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">داشبورد ادمین</h1>
        <p>این صفحه مخصوص ادمین وارد شده است.</p>

        @if (session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif

        <h2>همه درخواست‌ها</h2>
        @if ($requests->isEmpty())
            <p>هیچ درخواستی وجود ندارد.</p>
        @else
            <ul>
                @foreach ($requests as $request)
                    <li>
                        <strong>{{ $request->title }}</strong>
                        <br>
                        کاربر: {{ $request->user->name ?? 'کاربر حذف شده' }}
                        <br>
                        نام کاربری: {{ $request->user->username ?? 'نامشخص' }}
                        <br>
                        توضیحات: {{ $request->description ?? 'بدون توضیحات' }}
                        <br>
                        وضعیت: {{ $request->status }}
                    </li>
                @endforeach
            </ul>
        @endif

        <!-- دکمه خروج -->
        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                خروج
            </button>
        </form>
    </div>
</div> --}}




    <main class="flex-1 p-8">
        <header class="bg-white shadow rounded-lg p-6 mb-8 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">لیست درخواست های شما</h1>
            <a href="{{route('user.addrequest')}}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                افزودن
            </a>
        </header>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            {{-- <th></th> --}}
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            عکس
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            نام
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                             نام خانوادگی
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            شماره تلفن
                            </th>
                            {{-- <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">جزئیات</th> --}}
                        </tr>
                    </thead>
                {{-- {{ dd($doctors) }} --}}
                    <tbody class="bg-white divide-y divide-gray-200">
                          @if ($requests->isEmpty())
                            <p class="text-gray-600">شما هیچ درخواستی ندارید.</p>
                            @else
                        @foreach ($requests as $request )
                        <tr>
                            {{-- <td><img class="w-12 h-12 rounded-full" src="{{ asset('storage/doctors/'.$doctor->avatar) }}"   /></td> --}}
                            <td class="px-6 py-4 whitespace-nowrap"><img src="{{ $request->imgpath }}" alt="" class="w-20 h-20 rounded-full"></td>
                            <td class="px-6 py-4 whitespace-nowrap"> {{$request->name}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$request->female}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$request->phone}}</td>

                            <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2 space-x-reverse">

                                <a href="{{ route('user.editrequest', ['id' => $request->id]) }}" class="text-blue-600 hover:text-blue-800 ml-2" title="جزئیات">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </a>
                                <a href="{{ route('user.deleterequest', ['id' => $request->id])}}"  class="text-red-600 hover:text-red-800" title="حذف">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                </a>
                            </td>
                        </tr>

                        @endforeach
                        @endif
                    {{--     <tr>
                            <td class="px-6 py-4 whitespace-nowrap">دکتر مریم احمدی</td>
                            <td class="px-6 py-4 whitespace-nowrap">اطفال</td>
                            <td class="px-6 py-4 whitespace-nowrap">09129876543</td>
                            <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2 space-x-reverse">
                                <a href="doctor-details.html?id=2" class="text-blue-600 hover:text-blue-800 ml-2" title="جزئیات">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </a>
                                <button class="text-red-600 hover:text-red-800" title="حذف">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                </button>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
