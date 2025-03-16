@extends('layouts.app')

@section('title', 'Edit Data Dokter')
@section('page_title', 'Edit Data Dokter')
@section('page_subtitle', 'Memperbarui informasi dokter')

@section('content')
<div class="px-4 py-5">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div class="flex items-center mb-4 md:mb-0">
            <a href="{{ route('dokter.show', $dokter->id) }}" class="mr-3 text-gray-500 hover:text-gray-700 transition-colors">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-user-edit text-amber-500 mr-3"></i>
                Edit Data Dokter
            </h1>
            <span class="ml-3 bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full flex items-center">
                NO_STR: {{ $dokter->no_str }}
            </span>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('dokter.show', $dokter->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors focus:ring-4 focus:ring-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                Lihat Detail
            </a>
            <a href="{{ route('dokter.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors focus:ring-4 focus:ring-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                Daftar Dokter
            </a>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
        <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-4">
            <h2 class="text-lg font-semibold text-white flex items-center">
                <i class="fas fa-clipboard-list mr-2"></i>
                Edit Data Dokter: {{ $dokter->nama }}
            </h2>
            <p class="text-amber-100 text-sm mt-1">Perbarui data dokter dengan informasi terbaru</p>
        </div>
        <div class="p-6">
            <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 gap-8">
                    <!-- Informasi Pribadi -->
                    <div>
                        <h3 class="text-lg font-medium text-gray-800 mb-3 pb-2 border-b border-gray-200">
                            <i class="fas fa-user text-green-600 mr-2"></i>
                            Informasi Pribadi
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama -->
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                    <input type="text" id="nama" name="nama" value="{{ old('nama', $dokter->nama) }}" 
                                        class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 @error('nama') border-red-500 @enderror" 
                                        placeholder="Masukkan nama lengkap" required>
                                </div>
                                @error('nama')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Spesialisasi -->
                            <div>
                                <label for="spesialisasi" class="block text-sm font-medium text-gray-700 mb-1">
                                    Spesialisasi <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-stethoscope text-gray-400"></i>
                                    </div>
                                    <input type="text" id="spesialisasi" name="spesialisasi" value="{{ old('spesialisasi', $dokter->spesialisasi) }}" 
                                        class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 @error('spesialisasi ') border-red-500 @enderror" 
                                        placeholder="Masukkan spesialisasi dokter" required>
                                </div>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-envelope text-gray-400"></i>
                                    </div>
                                    <input type="email" id="email" name="email" value="{{ old('email', $dokter->email) }}" 
                                        class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 @error('email') border-red-500 @enderror" 
                                        placeholder="Masukkan email" required>
                                </div>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- No Telepon -->
                            <div>
                                <label for="no_telepon" class="block text-sm font-medium text-gray-700 mb-1">
                                    No. Telepon <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-phone text-gray-400"></i>
                                    </div>
                                    <input type="text" id="no_telepon" name="no_telepon" value="{{ old('no_telepon', $dokter->no_telepon) }}" 
                                        class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 @error('no_telepon') border-red-500 @enderror" 
                                        placeholder="Masukkan nomor telepon">
                                </div>
                                @error('no_telepon')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- No STR -->
                            <div>
                                <label for="no_str" class="block text-sm font-medium text-gray-700 mb-1">
                                    Nomor STR <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-id-badge text-gray-400"></i>
                                        </div>
                                        <input type="text" id="no_str" name="no_str" value="{{ old('no_str', $dokter->no_str) }}" 
                                            class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 @error('no_str') border-red-500 @enderror" 
                                            placeholder="Masukkan nomor STR" required>
                                    </div>
                                    @error('no_rm')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            <!-- Jenis Kelamin -->
                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-1">
                                    Jenis Kelamin <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-venus-mars text-gray-400"></i>
                                    </div>
                                    <select id="jenis_kelamin" name="jenis_kelamin" 
                                        class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 @error('jenis_kelamin') border-red-500 @enderror" 
                                        required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin', $dokter->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin', $dokter->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                @error('jenis_kelamin')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Profil -->
                            <div>
                                <label for="profil" class="block text-sm font-medium text-gray-700 mb-1">
                                    Foto Profil <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-id-badge text-gray-400"></i>
                                    </div>
                                    <input type="file" id="profil" name="profil" value="{{ old('profil', $dokter->profil) }}" 
                                        class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 @error('profil') border-red-500 @enderror" 
                                        placeholder="Masukkan foto profil" required>
                                </div>
                                @error('profil')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-check-circle text-green-400"></i>
                                    </div>
                                    <select id="status" name="status" 
                                        class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 @error('status') border-red-500 @enderror" 
                                        required>
                                        <option value="active" {{ old('status', $dokter->status) == 'aktive' ? 'selected' : '' }}>Aktif</option>
                                        <option value="inactive" {{ old('status', $dokter->status) == 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
                                    </select>
                                </div>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                
                            <!-- Tanggal Lahir -->
                            <div>
                                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">
                                    Tanggal Lahir <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-calendar-alt text-gray-400"></i>
                                    </div>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $dokter->tanggal_lahir->format('Y-m-d')) }}" 
                                        class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 @error('tanggal_lahir') border-red-500 @enderror" 
                                        required>
                                </div>
                                @error('tanggal_lahir')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Alamat -->
                            <div class="md:col-span-2">
                                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                                    Alamat <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                                        <i class="fas fa-home text-gray-400"></i>
                                    </div>
                                    <textarea id="alamat" name="alamat" rows="3" 
                                        class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 @error('alamat') border-red-500 @enderror" 
                                        placeholder="Masukkan alamat lengkap" required>{{ old('alamat', $dokter->alamat) }}</textarea>
                                </div>
                                @error('alamat')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                           </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end items-center space-x-3 mt-8 pt-5 border-t border-gray-200">
                    <a href="{{ route('dokter.show', $dokter->id) }}" class="inline-flex items-center px-4 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors focus:ring-4 focus:ring-gray-200">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </a>
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-amber-600 text-white font-medium rounded-lg hover:bg-amber-700 transition-colors focus:ring-4 focus:ring-amber-300">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
