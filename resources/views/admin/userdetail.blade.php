@extends('leyout.admin')
@section('head')
        <link rel="stylesheet" href="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('content')
    <main class="flex-1 p-8">
        <header class="bg-white shadow rounded-lg p-6 mb-8">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">جزئیات درخواست از {{ $userrequest->user->name }}</h1>

                <a href="doctors.html" class="text-blue-600 hover:text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
            </div>
        </header>

        <!-- Doctor Information -->
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <div class="flex flex-col md:flex-row">
                <!-- Doctor Profile Section -->
                <div class="md:w-1/3 mb-6 md:mb-0 md:border-l md:pl-6">
                    <div class="flex flex-col items-center">
                        <div class="w-32 h-32 mb-4 rounded-full overflow-hidden bg-gray-200 border-4 border-blue-100">
                            <img src="https://ui-avatars.com/api/?name=دکتر+علی+رضایی&background=0D8ABC&color=fff&size=128"
                                alt="دکتر علی رضایی" class="w-full h-full object-cover">
                        </div>
                        <h2 class="text-xl font-bold text-gray-800 mb-1">{{ $userrequest->name }}</h2>
                        <p class="text-gray-600 font-medium mb-2">{{ $userrequest->grade }}پایه

                        </p>
                        <div class="flex items-center text-sm text-gray-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>کد ملی: {{ $userrequest->nationalcode }}</span>
                        </div>
                        <div class="w-full bg-gray-50 rounded-lg p-4 mb-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-600">بیماران</span>
                                <span class="font-bold text-blue-600">۱۲۴ نفر</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">نسخه‌ها</span>
                                <span class="font-bold text-green-600">۳۵۶ نسخه</span>
                            </div>
                        </div>
                        <div class="w-full">
                            <a id='openpopup' href="#"
                                class="block w-full text-center py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition mb-2">
                                دریافت نوبت
                            </a>
                            <div
                                class="fixed inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center z-50 hidden "id='popup'>


                                <form method="post" action="{{ route('admin.epointment',['id' => $userrequest->id]) }}" class="bg-amber-50 rounded-2xl justify-center flex flex-col p-7">
                                            @csrf
                                    <div class="mb-4 items-center flex flex-col">
                                        <input data-jdp name="mydate" id="mydate" type="text" value="دریافت"
                                            placeholder="انتخاب تاریخ و زمان شمسی"
                                            class="w-52 h-11 bg-[#569ff7] text-white rounded-sm text-center ">
                                    </div>
                                    <div class="flex flex-row gap-3 justify-center items-center">

                                        <input
                                            class="bg-green-500 text-white px-6 py-2 rounded hover:bg-gray-400 transition w-24 h-10"
                                            type="submit" value="ارسال">
                                        <a href="#" id='closepopup'
                                            class="bg-red-700 text-white px-6 py-2 rounded hover:bg-gray-400 transition w-24 h-10">انصراف</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Doctor Details Section -->
                <div class="md:w-2/3 md:pr-6">
                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-3">اطلاعات تماس</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1 ml-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <div>
                                    <p class="text-gray-600 text-sm">شماره تماس</p>
                                    <p class="font-medium">09121234567</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1 ml-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <p class="text-gray-600 text-sm">ایمیل</p>
                                    <p class="font-medium">dr.rezaei@example.com</p>
                                </div>
                            </div>
                            <div class="flex items-start md:col-span-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1 ml-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <p class="text-gray-600 text-sm">آدرس مطب</p>
                                    <p class="font-medium">تهران، خیابان ولیعصر، پلاک ۱۲۳، طبقه ۴</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-3">مدارک و تخصص‌ها</h3>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <ul class="list-disc list-inside space-y-2 text-gray-700">
                                <li>بورد تخصصی داخلی</li>
                                <li>عضو انجمن پزشکان داخلی ایران</li>
                                <li>دارای بیش از ۱۵ سال سابقه در درمان بیماری‌های داخلی</li>
                                <li>تخصص در درمان بیماری‌های گوارشی و تنفسی</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
 <script type="text/javascript" src="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js"></script>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            // تنظیمات JalaliDatePicker برای تاریخ و زمان شمسی
            jalaliDatepicker.startWatch({
                time: true,
                minDate: 'today',
                    separatorChars: {
                        date: '-',
                        between: ' ',
                        time: ':'
                    }
            });

            // تنظیمات Flatpickr برای انتخاب زمان
            flatpickr("#timePicker", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                defaultHour: 10,  // ساعت پیش‌فرض (با توجه به زمان فعلی 10:02)
                defaultMinute: 2, // دقیقه پیش‌فرض (با توجه به زمان فعلی)
                minuteIncrement: 1,
                disableMobile: false,
                showCloseBtn: true,

            });
        });
    </script>
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
    </script>
@endsection
