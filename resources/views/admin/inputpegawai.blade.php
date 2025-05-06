<x-headeradmin>
<div class="p-6">
    <div class="bg-white rounded-lg shadow p-6 max-w-xl">
        <form action="{{ route('pegawai.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="nama" name="nama" required
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