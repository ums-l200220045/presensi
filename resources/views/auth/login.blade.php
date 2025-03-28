<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Presensi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-blue-500">

    <!-- Logo -->
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/logo-presensi.png') }}" alt="Logo" class="h-12">
    </div>
    
    <div class="w-[90%] max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-blue-600">Login</h2>

        <form method="POST" action="{{ route('login.post') }}" class="mt-6">
            @csrf

            <div class="space-y-4">
                <!-- Email -->
                <div>
                    <label class="text-gray-700 text-sm font-medium">Email</label>
                    <input type="email" name="email" required value="{{ old('email') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan Email">
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="text-gray-700 text-sm font-medium">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan Password">
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Login -->
                <div class="mt-6">
                    <button type="submit" class="w-full py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-400">
                        Login
                    </button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
