<x-headeradmin>
    <div class="flex items-center justify-center">
      <div class="bg-white rounded-lg shadow p-6 w-xl">
        <!-- Informasi Sebelum Form -->
        <div class="mb-6 text-center">
          <h2 class="text-xl font-semibold text-gray-800">Edit Data Pegawai</h2>
          <p class="text-sm text-gray-600 mt-1">Silakan edit form berikut untuk memperbarui data pegawai.</p>
        </div>
  
        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" class="space-y-4">
          @csrf
          @method('PUT')
          
          <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $pegawai->name) }}" required
    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
          </div>
  
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $pegawai->email) }}" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
          </div>
  
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <p class="text-xs text-gray-500 mt-1">Minimal 8 karakter</p>
          </div>
  
          <div>
            <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
            <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan', $pegawai->jabatan) }}" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
          </div>
  
          <div>
            <label for="bidang" class="block text-sm font-medium text-gray-700">Bidang</label>
            <input type="text" id="bidang" name="bidang" value="{{ old('bidang', $pegawai->bidang) }}" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
          </div>
  
          <div class="flex justify-between pt-4">
            <a href="{{ route('pegawai.index') }}" 
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-md font-semibold transition">
              Kembali
            </a>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-semibold transition">
              Update
            </button>
          </div>
        </form>
      </div>
    </div>
</x-headeradmin>