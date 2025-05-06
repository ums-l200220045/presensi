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
            <a href="{{route('rekap')}}" class="flex items-center justify-between p-4 rounded-lg hover:bg-gray-100 transition">
                <div class="flex items-center space-x-3">
                  <!-- Icon Kalender -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <!-- Teks -->
                  <div>
                    <div class="text-sm font-semibold text-gray-900">Rekap Presensi</div>
                    <div class="text-sm text-gray-500">Daftar rekap presensi</div>
                  </div>
                </div>
                <!-- Panah -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </a>
              
        </div>
    </div>
</x-headerpegawai>