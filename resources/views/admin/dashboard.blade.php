@extends('leyout.admin')
@section('profile')
    <div class="fixed inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center z-50 hidden "id='popup'>


        <form method="post" action="{{ route('admin.epointment', ['id' => $profile->id]) }}"
            class="bg-amber-50 rounded-2xl justify-center flex flex-col p-7 relative">
            @csrf
            <div id="closepopup" class="absolute top-2 right-2 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="red"
                    class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>

            </div>
            <div class="mt-4">

                <div
                    class="mb-4 items-center flex flex-row w-56 h-11 bg-[#569ff7] text-white rounded-sm text-center p-2 gap-1">
                    <input name="name" id="name" type="text" value="{{ $profile->name }}" disabled
                        class="bg-[#569ff7] text-white rounded-sm text-center">
                    <div id="namebutton">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline  cursor-pointer" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="flex flex-row gap-3 justify-center items-center">

                    <input class="bg-green-500 text-white px-6 py-2 rounded hover:bg-gray-400 transition w-24 h-10"
                        type="submit" value="ارسال">

                </div>
            </div>
        </form>
    </div>
@endsection
@section('content')
    @php
        use Morilog\Jalali\Jalalian;
    @endphp

    {{-- <div class="container mx-auto p-4">
    @if (Auth::check())
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
            <h1 class="text-3xl font-bold text-gray-800">داشبورد :{{ $profile->name }} {{ $profile->female }}</h1>
            <h2 class="text-2xl font-bold text-gray-800">لیست تمامی درخواست ها</h2>
            {{-- <a href="{{route('')}}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                افزودن پزشک
            </a> --}}
        </header>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            {{-- <th></th> --}}
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">نام
                                درخواست کننده</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                توضیحات</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">نام
                                کاربری</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                وضعیت</th>
                            {{-- <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">جزئیات</th> --}}
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @if ($requests->isEmpty())
                            <p class="text-gray-600">شما هیچ درخواستی ندارید.</p>
                        @else
                            @foreach ($requests as $request)
                                <tr>
                                    {{-- <td><img class="w-12 h-12 rounded-full" src="{{ asset('storage/doctors/'.$doctor->avatar) }}"   /></td> --}}
                                    <td class="px-6 py-4 whitespace-nowrap">آقای {{ $request->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $request->female }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $request->user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2 space-x-reverse ">

                                        <form method="POST"
                                            action="{{ route('admin.userdetail', ['id' => $request->id]) }}"
                                            class="text-blue-600 hover:text-blue-800 ml-2">
                                            @csrf
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>
                                        </form>
                                        {{-- <a href="{{ route('admin.userdetail', ['id' => $request->id]) }}" class="text-blue-600 hover:text-blue-800 ml-2" title="جزئیات">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </a> --}}
                                        {{-- <a href="{{ route('home', ['id' => $doctor->id])}}"  class="text-red-600 hover:text-red-800" title="حذف">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                </a> --}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex flex-row items-center gap-2 ">
                                            @switch($request->story)
                                                @case('submit')
                                                    <span class="text-blue-800">ارسال شده</span>
                                                @break

                                                @case('check')
                                                    <span class="text-yellow-800">درحال بررسی</span>
                                                @break

                                                @case('epointment')
                                                    <span>ملاقات:</span>
                                                    <p>{{ Jalalian::fromDateTime($request->date)->format('Y/m/d H:i') }}</p>
                                                @break

                                                @default
                                                    <span class="text-danger">ناشناخته (حتما گزارش کنید)</span>
                                            @endswitch
                                        </div>

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
@section('scripts')
    <script>
        let openpopup = document.getElementById('openpopup');
        let popup = document.getElementById('popup');
        let closepopup = document.getElementById('closepopup')
        openpopup.addEventListener('click', function() {
            popup.classList.remove('hidden')
        });
        closepopup.addEventListener('click', function() {
            popup.classList.add('hidden')
        });





        let namebutton = document.getElementById('namebutton');
        let name = document.getElementById('name');
        let nametuch = false
        namebutton.addEventListener('click', function() {
            if (nametuch === false) {
                // حالت فعال
                name.disabled = false;
                name.focus();
                name.placeholder = "حالا می‌توانید تایپ کنید...";
                name.value = "";
                namebutton.innerHTML = `
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6 cursor-pointer ">
    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
  </svg>
`;
            } else {
                // حالت غیرفعال
                name.disabled = true;
                name.placeholder = "نام شما";
                name.value = "{{ $profile->name }}"; // مقدار پیش‌فرض
                namebutton.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline  cursor-pointer" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
`
            }
            nametuch = !nametuch; // معکوس کردن مقدار
        });
    </script>
@endsection
