<x-headerpegawai>
    <div class="max-w-2xl mx-auto space-y-4 mt-4 px-4 sm:px-6"> <!-- Menambahkan padding horizontal pada perangkat kecil -->

      <!-- Filter Bulan -->
      <div class="flex items-center justify-between">
        <h2 class="text-lg font-semibold text-gray-700">Presensi Bulanan</h2>
        <select class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option value="05">Mei 2025</option>
          <option value="04">April 2025</option>
          <option value="03">Maret 2025</option>
          <!-- Tambahkan opsi sesuai kebutuhan -->
        </select>
      </div>

      <!-- Tabel Presensi -->
      <div class="overflow-x-auto"> <!-- Overflow-x-auto untuk responsif -->
        <table class="w-full text-sm text-left shadow-sm rounded-lg overflow-hidden">
          <thead class="bg-blue-600 text-white">
            <tr>
              <th class="px-6 py-3 text-center">Hari, Tanggal</th>
              <th class="px-6 py-3 text-center">Keterangan</th>
            </tr>
          </thead>
          <tbody class="[&>tr:nth-child(even)]:bg-gray-50">
            <tr class="hover:bg-gray-100">
              <td class="px-6 py-4 text-center">Senin, 5 Mei 2025</td>
              <td class="px-6 py-4 text-center">Masuk</td>
            </tr>
            <tr class="hover:bg-gray-100">
              <td class="px-6 py-4 text-center">Selasa, 6 Mei 2025</td>
              <td class="px-6 py-4 text-center">Izin</td>
            </tr>
            <tr class="hover:bg-gray-100">
              <td class="px-6 py-4 text-center">Rabu, 7 Mei 2025</td>
              <td class="px-6 py-4 text-center">Sakit</td>
            </tr>
            <!-- Tambahkan baris sesuai kebutuhan -->
          </tbody>
        </table>
      </div>

    </div>
</x-headerpegawai>
