<x-headeradmin>
  <div class="flex items-center justify-center">
    <div class="bg-white rounded-lg shadow p-6 w-xl">
      <div class="mb-6 text-center">
        <h2 class="text-xl font-semibold text-gray-800">Tambah Data Pegawai</h2>
        <p class="text-sm text-gray-600 mt-1">Silakan isi form berikut untuk menambahkan data pegawai baru ke sistem.</p>
      </div>

      {{-- Menampilkan pesan error validasi --}}
      @if ($errors->any())
          <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      {{-- Menampilkan pesan sukses --}}
      @if (session('success'))
          <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
              {{ session('success') }}
          </div>
      @endif

      <form action="{{ route('pegawai.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
          {{-- PERBAIKAN: name="nama" menjadi name="name" --}}
          <input type="text" id="name" name="name" required
              class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" id="email" name="email" required
              class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" id="password" name="password" required
              class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        {{-- PERBAIKAN: Tambahkan input untuk konfirmasi password --}}
        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required
              class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
          <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
          <input type="text" id="jabatan" name="jabatan" required
              class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
          <label for="bidang" class="block text-sm font-medium text-gray-700">Bidang</label>
          <input type="text" id="bidang" name="bidang" required
              class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="text-right">
          <button type="submit"
              class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-semibold transition">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</x-headeradmin>