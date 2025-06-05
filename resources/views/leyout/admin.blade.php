<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد مدیریتی</title>
    <script src="{{ asset('assets/js/tail.js') }}"></script>
    <script src="{{ asset('assets/js/chart.js') }}"></script>
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
        }
    </style>
    @yield('head')
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="bg-gray-800 w-64 min-h-screen p-4 flex flex-col justify-between">
            <div class="flex flex-col">

                <div class="text-white text-2xl font-bold mb-8"> داشبورد ادمینی</div>

                    <div class="flex flex-col justify-between h-11/12">

                        <ul class="space-y-2 ">
                            <li class="flex flex-col gap-2.5">
                                <div
                                    class="flex-row text-white flex justify-between py-2.5 px-4 rounded transition duration-200 hover:bg-gray-400 bg-gray-700 cursor-pointer select-none" id="openpopup">
                                    پروفایل
                                </div>
                                @yield('profile')
                            </li>
                            <li class="flex flex-col gap-2.5">
                                <div id="home"
                                    class="flex-row text-white flex justify-between py-2.5 px-4 rounded transition duration-200 hover:bg-gray-400 bg-gray-700 cursor-pointer select-none">
                                    صفحه اصلی

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6 transition-transform duration-300 ease-in-out rotate-90" id="icon">
                                        <path fill-rule="evenodd"
                                            d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                </div>
                                <ul id="dropdown"
                                    class="flex flex-col gap-0.5 max-h-0 opacity-0 overflow-hidden transition-all duration-300 ease-in-out">
                                    <li
                                        class="text-white block py-1 px-4 rounded transition duration-200 hover:bg-gray-500 bg-[#6d66664b]">
                                        <a href="{{ route('admin.dashboard') }}">همه درخواست ها</a></li>
                                    <li
                                        class="text-white block py-1 px-4 rounded transition duration-200 hover:bg-gray-500 bg-[#6d66664b]">
                                        <a href=" {{ route('admin.dashboardsubmit') }}">درخواست ثبت شده</a></li>
                                    <li
                                        class="text-white block py-1 px-4 rounded transition duration-200 hover:bg-gray-500 bg-[#6d66664b]">
                                        <a href="{{ route('admin.dashboardchek') }}">درخواست های مورد بررسی</a></li>
                                    <li
                                        class="text-white block py-1 px-4 rounded transition duration-200 hover:bg-gray-500 bg-[#6d66664b]">
                                        <a href="{{ route('admin.dashboardepointmet') }}">درخواست های ملاقاتی</a></li>

                                </ul>
                            </li>

                        </ul>
                    </div>
            </div>

                <a href="{{ route('logout') }}"
                    class="text-white block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-400 bg-[#721111]  cursor-pointer">
                    خروج
                </a>
        </aside>

        <!-- Main Content -->
        @yield('content')
    </div>
    @yield('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const home = document.getElementById('home');
            const dropdown = document.getElementById('dropdown');
            const icon = document.getElementById('icon');

            if (home && dropdown && icon) {
                home.addEventListener('click', function() {
                    if (dropdown.classList.contains('max-h-0')) {
                        // نمایش منو با اسلاید به پایین
                        dropdown.classList.remove('max-h-0', 'opacity-0');
                        dropdown.classList.add('max-h-96');
                        // چرخش آیکون به سمت پایین (180 درجه)
                        icon.classList.remove('rotate-90');
                        icon.classList.add('rotate-0');
                    } else {
                        // مخفی کردن منو با اسلاید به بالا
                        dropdown.classList.remove('max-h-96');
                        dropdown.classList.add('max-h-0', 'opacity-0');
                        // برگرداندن آیکون به حالت اولیه
                        icon.classList.remove('rotate-0');
                        icon.classList.add('rotate-90');
                    }
                });
            } else {
                console.error('المان home، dropdown یا icon پیدا نشد!');
            }
        });
    </script>
</body>

</html>
