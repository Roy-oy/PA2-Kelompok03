@extends('layouts.app')

@section('title', 'Daftar Jadwal Dokter')
@section('page_title', 'Daftar Jadwal Dokter')
@section('page_subtitle', 'Mengelola jadwal dokter puskesmas')

@section('content')
<div class="px-4 py-5">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div class="w-full md:w-2/5">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" id="search-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full pl-10 p-2.5" placeholder="Cari jadwal dokter berdasarkan nama, hari...">
            </div>
        </div>
        <a href="{{ route('jadwal_dokter.create') }}" class="inline-flex items-center px-4 py-2.5 bg-green-600 text-white font-medium text-sm rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 transition-colors">
            <i class="fas fa-plus mr-2"></i>
            Tambah Jadwal Dokter
        </a>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="p-4 mb-6 rounded-lg bg-green-50 border-l-4 border-green-500 relative" role="alert">
        <div class="flex items-center">
            <i class="fas fa-check-circle text-green-500 mr-3 text-lg"></i>
            <span class="text-green-800 font-medium">{{ session('success') }}</span>
        </div>
        <button type="button" class="absolute top-4 right-4 text-green-600 hover:text-green-800" onclick="this.parentElement.style.display='none'">
            <i class="fas fa-times"></i>
        </button>
    </div>
    @endif

    <!-- Data Table -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
        <div class="p-5 border-b border-gray-200 bg-gray-50/80">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-calendar-alt mr-2 text-green-600"></i>
                    Data Jadwal Dokter
                </h2>
                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Total: {{ $doctor_schedules->total() }}</span>
            </div>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 table-fixed" id="dataTable">
                    <thead>
                        <tr class="bg-gray-50 border-b">
                            <th scope="col" class="py-3.5 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Dokter
                            </th>
                            <th scope="col" class="py-3.5 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Hari
                            </th>
                            <th scope="col" class="py-3.5 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jam Mulai
                            </th>
                            <th scope="col" class="py-3.5 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jam Selesai
                            </th>
                            <th scope="col" class="py-3.5 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cluster
                            </th>
                            <th scope="col" class="py-3.5 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="py-3.5 px-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($doctor_schedules as $schedule)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                {{ $schedule->doctor->nama }}
                            </td>
                            <td class="py-4 px-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $schedule->day_of_week }}
                            </td>
                            <td class="py-4 px-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $schedule->start_time }}
                            </td>
                            <td class="py-4 px-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $schedule->end_time }}
                            </td>
                            <td class="py-4 px-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $schedule->cluster->name }}
                            </td>
                            <td class="py-4 px-4 text-sm text-gray-500 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $schedule->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($schedule->status) }}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-sm text-center whitespace-nowrap">
                                <div class="flex justify-center space-x-1">
                                    <a href="{{ route('jadwal_dokter.edit', $schedule->id) }}" class="text-white bg-amber-500 hover:bg-amber-600 p-2 rounded-lg transition-colors" title="Edit Dokter">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                            <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                            <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                        </svg>
                                    </a>
                                    <button type="button" 
                                            class="text-white bg-red-600 hover:bg-red-700 p-2 rounded-lg transition-colors delete-btn" title="Hapus Dokter" data-id="{{ $schedule->id }}" data-name="{{ $schedule->nama }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                                <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                            </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-calendar-times text-gray-300 text-5xl mb-4"></i>
                                    <p class="text-gray-500 text-lg">Belum ada jadwal dokter</p>
                                    <p class="text-gray-400 text-sm mt-1">Tambahkan jadwal dokter baru untuk memulai</p>
                                    <a href="{{ route('jadwal_dokter.create') }}" class="mt-3 inline-flex items-center px-3 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700">
                                        <i class="fas fa-plus mr-2"></i> Tambah Jadwal Dokter
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="flex justify-between items-center mt-6">
                <p class="text-sm text-gray-500">
                    Menampilkan {{ $doctor_schedules->firstItem() ?? 0 }} - {{ $doctor_schedules->lastItem() ?? 0 }} dari {{ $doctor_schedules->total() }} jadwal
                </p>
                {{ $doctor_schedules->links() }}
            </div>
        </div>
    </div>
</div>
@endsection