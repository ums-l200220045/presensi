<x-headerpegawai>
    <div class="container mx-auto px-4 py-8 max-w-md">
        <!-- Profile Card -->
        <div class="bg-white rounded-lg p-4 mb-6 border border-gray-200 shadow-sm">
            <div class="flex items-start">
                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-black">Yakub Firman Mustofa</h2>
                    <p class="text-gray-600 text-sm mb-3">Stat Bidang Teknologi Informasi</p>
                </div>
            </div>
        </div>

        <!-- Check In/Out Section -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-white rounded-lg p-3 text-center border border-gray-200 shadow-sm">
                <p class="text-sm text-gray-600 mb-1">Check In</p>
            </div>
            <div class="bg-white rounded-lg p-3 text-center border border-gray-200 shadow-sm">
                <p class="text-sm text-gray-600 mb-1">Check Out</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-3 gap-3 mb-6">
            <!-- Kehadiran Card -->
            <div class="bg-white rounded-lg p-3 text-center border border-gray-200 shadow-sm">
                <p class="text-2xl font-bold text-black">10</p>
                <p class="text-xs text-gray-600 mt-1">Kehadiran</p>
            </div>

            <!-- Tidak Hadir Card -->
            <div class="bg-white rounded-lg p-3 text-center border border-gray-200 shadow-sm">
                <p class="text-2xl font-bold text-black">7</p>
                <p class="text-xs text-gray-600 mt-1">Tidak Hadir</p>
            </div>
        </div>

        <!-- Divider -->
        <hr class="border-gray-300 my-4">

        <!-- Divider -->
        <hr class="border-gray-300 my-4">

        <!-- Rekap Presensi Section -->
        <div>
            <h3 class="text-sm font-semibold text-black mb-1">Rekap Presensi</h3>
            <p class="text-gray-600 text-sm">Daftar rekap presensi</p>
        </div>
    </div>
</x-headerpegawai>