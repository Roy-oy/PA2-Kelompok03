    @extends('layouts.app')

    @section('title', 'Tambah Dokter Baru')
    @section('page_title', 'Tambah Dokter Baru')
    @section('page_subtitle', 'Menambahkan data dokter baru ke sistem')

    @section('content')
    <div class="px-4 py-5">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div class="flex items-center mb-4 md:mb-0">
                <a href="{{ route('dokter.index') }}" class="mr-3 text-gray-500 hover:text-gray-700 transition-colors">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-user-md text-green-600 mr-3"></i>
                    Tambah Dokter Baru
                </h1>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden mb-6">
            <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4">
                <h2 class="text-lg font-semibold text-white flex items-center">
                    <i class="fas fa-clipboard-list mr-2"></i>
                    Formulir Data Dokter
                </h2>
                <p class="text-green-100 text-sm mt-1">Isi data dokter dengan lengkap dan benar</p>
            </div>
            <div class="p-6">
                <form action="{{ route('dokter.store') }}" method="POST">
                    @csrf
                    
                    <!-- Form Sections -->
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
                                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" 
                                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                        placeholder="Masukkan nama lengkap" required>
                                    @error('nama')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Spesialisasi -->
                                <div>
                                    <label for="spesialisasi" class="block text-sm font-medium text-gray-700 mb-1">
                                        Spesialisasi <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="spesialisasi" name="spesialisasi" value="{{ old('spesialisasi') }}" 
                                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                        placeholder="Masukkan spesialisasi dokter" required>
                                    @error('spesialisasi')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                        Email <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" 
                                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                        placeholder="Masukkan email" required>
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- No Telepon -->
                                <div>
                                    <label for="no_telepon" class="block text-sm font-medium text-gray-700 mb-1">
                                        No. Telepon
                                    </label>
                                    <input type="text" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}" 
                                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                        placeholder="Masukkan nomor telepon">
                                    @error('no_telepon')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- No STR -->
                                <div>
                                    <label for="no_str" class="block text-sm font-medium text-gray-700 mb-1">
                                        Nomor STR <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="no_str" name="no_str" value="{{ old('no_str') }}" 
                                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                        placeholder="Masukkan nomor STR" required>
                                    @error('no_str')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Jenis Kelamin -->
                                <div>
                                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-1">
                                        Jenis Kelamin <span class="text-red-500">*</span>
                                    </label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" 
                                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                        required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Profil -->
                                <div>
                                    <label for="profil" class="block text-sm font-medium text-gray-700 mb-1">
                                        Profil
                                    </label>
                                    <input type="file" id="profil" name="profil"
                                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    @error('foto_profil')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Status -->
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                                        Status <span class="text-red-500">*</span>
                                    </label>
                                    <select id="status" name="status" required 
                                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
                                    </select>
                                    @error('status')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tanggal Lahir -->
                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">
                            Tanggal Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" 
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                            required>
                        @error('tanggal_lahir')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Alamat -->
                    <div class="md:col-span-2">
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                            Alamat <span class="text-red-500">*</span>
                        </label>
                        <textarea id="alamat" name="alamat" rows="3" 
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                            placeholder="Masukkan alamat lengkap" required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Form Actions -->
                    <div class="flex justify-end items-center space-x-3 mt-8 pt-5 border-t border-gray-200">
                        <a href="{{ route('dokter.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                            <i class="fas fa-times mr-2"></i> Batal
                        </a>
                        <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            <i class="fas fa-save mr-2"></i> Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
