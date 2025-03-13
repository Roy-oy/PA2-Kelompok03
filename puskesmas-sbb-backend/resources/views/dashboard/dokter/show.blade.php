@extends('layouts.app')

@section('title', 'Detail Dokter')
@section('page_title', 'Detail Dokter')
@section('page_subtitle', 'Melihat rincian informasi dokter')

@section('content')
<div class="px-4 py-5">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div class="flex items-center mb-4 md:mb-0">
            <a href="{{ route('dokter.index') }}" class="mr-3 text-gray-500 hover:text-gray-700 transition-colors">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-user-md text-green-600 mr-3"></i>
                {{ $dokter->nama }}
            </h1>
            <span class="ml-3 bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                ID: {{ $dokter->id }}
            </span>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('dokter.edit', $dokter->id) }}" class="inline-flex items-center px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600">
                <i class="fas fa-edit mr-2"></i>
                Edit Data
            </a>
            <button type="button" id="delete-button" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                <i class="fas fa-trash mr-2"></i>
                Hapus Data
            </button>
            <a href="{{ route('dokter.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                <i class="fas fa-list mr-2"></i>
                Daftar Dokter
            </a>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
            <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-6">
                <h2 class="text-xl font-bold text-white text-center mb-1">{{ $dokter->nama }}</h2>
                <p class="text-white text-center">{{ $dokter->spesialis }}</p>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-center text-sm">
                        <i class="fas fa-phone text-green-500 mr-3"></i>
                        <p class="font-medium text-gray-800">{{ $dokter->telepon }}</p>
                    </div>
                    <div class="flex items-center text-sm">
                        <i class="fas fa-envelope text-blue-500 mr-3"></i>
                        <p class="font-medium text-gray-800">{{ $dokter->email }}</p>
                    </div>
                    <div class="flex items-center text-sm">
                        <i class="fas fa-hospital text-purple-500 mr-3"></i>
                        <p class="font-medium text-gray-800">{{ $dokter->alamat }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
