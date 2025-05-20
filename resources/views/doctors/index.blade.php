
@extends('layouts.app')

@section('content')
         <!-- Main Content -->
    <main class="flex-1 p-8">
        <header class="bg-white shadow rounded-lg p-6 mb-8 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">لیست پزشکان</h1>
            <a href="{{ route('doctors.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                افزودن پزشک
            </a>
        </header>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th></th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">نام پزشک</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">تخصص</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">شماره تماس</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">جزئیات</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($doctors as $doctor )
                        <tr>
                            <td><img class="w-12 h-12 rounded-full" src="{{ asset('storage/doctors/'.$doctor->avatar) }}"   /></td>
                            <td class="px-6 py-4 whitespace-nowrap">دکتر {{$doctor->name}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$doctor->major}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$doctor->phone}}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2 space-x-reverse">
                                <a href="{{ route('doctors.edit',$doctor->id)}}" class="text-blue-600 hover:text-blue-800 ml-2" title="جزئیات">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </a>
                                <a  href="{{ route('doctors.destroy',$doctor->id)}}" class="text-red-600 hover:text-red-800" title="حذف">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                </a>
                            </td>
                        </tr>

                        @endforeach
                        
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
   