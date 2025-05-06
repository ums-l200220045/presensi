<x-headeradmin>
    <!-- Tabel -->
<div class="overflow-x-auto rounded-xl shadow-md">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
      <thead class="bg-blue-600 text-white text-center">
        <tr>
          <th class="px-6 py-3 font-semibold tracking-wide">Nama</th>
          <th class="px-6 py-3 font-semibold tracking-wide">Email</th>
          <th class="px-6 py-3 font-semibold tracking-wide">Jabatan</th>
          <th class="px-6 py-3 font-semibold tracking-wide">Bidang</th>
          <th class="px-6 py-3 font-semibold tracking-wide">Aksi</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-100">
        @forelse ($pegawais as $pegawai)
          <tr class="hover:bg-blue-50 transition">
            <td class="px-6 py-4 text-center text-gray-800">{{ $pegawai->name }}</td>
            <td class="px-6 py-4 text-center text-gray-700">{{ $pegawai->email }}</td>
            <td class="px-6 py-4 text-center text-gray-700">{{ $pegawai->jabatan }}</td>
            <td class="px-6 py-4 text-center text-gray-700">{{ $pegawai->bidang }}</td>
            <td class="px-6 py-4 text-center">
              <div class="flex items-center justify-center gap-2">
                <a href=""
                   class="px-3 py-1 bg-yellow-400 text-white rounded-md text-xs hover:bg-yellow-500 transition">
                  Edit
                </a>
                <form action="" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                          class="px-3 py-1 bg-red-500 text-white rounded-md text-xs hover:bg-red-600 transition">
                    Hapus
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="px-6 py-4 text-center text-gray-500 italic">Belum ada data pegawai.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  
</x-headeradmin>