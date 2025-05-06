<x-headerpegawai>
  <div class="max-w-3xl mx-auto mt-6 px-4 sm:px-6 space-y-6">

    <!-- Filter Bulan -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <h2 class="text-xl font-semibold text-gray-800">Presensi Bulanan</h2>
      <select class="border border-gray-300 rounded-lg px-4 py-2 text-sm text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        <option value="05">Mei 2025</option>
        <option value="04">April 2025</option>
        <option value="03">Maret 2025</option>
      </select>
    </div>

    <!-- Tabel Presensi -->
    <div class="overflow-x-auto rounded-xl shadow-md">
      <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-blue-600 text-white text-center">
          <tr>
            <th class="px-6 py-3 font-semibold tracking-wide">Hari, Tanggal</th>
            <th class="px-6 py-3 font-semibold tracking-wide">Keterangan</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
          <tr class="hover:bg-blue-50 transition">
            <td class="px-6 py-4 text-center text-gray-700">Senin, 5 Mei 2025</td>
            <td class="px-6 py-4 text-center text-green-600 font-medium">Masuk</td>
          </tr>
          <tr class="hover:bg-blue-50 transition">
            <td class="px-6 py-4 text-center text-gray-700">Selasa, 6 Mei 2025</td>
            <td class="px-6 py-4 text-center text-yellow-600 font-medium">Izin</td>
          </tr>
          <tr class="hover:bg-blue-50 transition">
            <td class="px-6 py-4 text-center text-gray-700">Rabu, 7 Mei 2025</td>
            <td class="px-6 py-4 text-center text-red-600 font-medium">Sakit</td>
          </tr>
          <!-- Tambahkan baris lain di sini -->
        </tbody>
      </table>
    </div>

  </div>
</x-headerpegawai>
