<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Surat</title>
    
    <!-- Memanggil Vite untuk Tailwind CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans text-slate-800 antialiased flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-md w-full space-y-8 bg-white p-8 sm:p-10 rounded-2xl shadow-xl border border-slate-200/80">
        
        <!-- Header / Logo -->
        <div class="text-center">
            <div class="mx-auto w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center text-white text-2xl font-bold shadow-lg shadow-blue-500/30 mb-4">
                📦
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                Masuk ke SIM-Surat
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Silakan masukkan email dan kata sandi Anda
            </p>
        </div>

        <!-- Form Login -->
        <form class="mt-8 space-y-6" method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="space-y-4">
                <!-- Input Email -->
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">
                        Alamat Email
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition duration-200 @error('email') border-rose-500 ring-rose-100 @enderror"
                        placeholder="nama@domain.com"
                    >
                    @error('email')
                        <p class="mt-1.5 text-xs text-rose-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Password -->
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">
                        Kata Sandi
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        required 
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition duration-200 @error('password') border-rose-500 ring-rose-100 @enderror"
                        placeholder="••••••••"
                    >
                    @error('password')
                        <p class="mt-1.5 text-xs text-rose-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Tombol Submit -->
            <div>
                <button 
                    type="submit" 
                    class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl text-sm shadow-lg shadow-blue-500/25 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2"
                >
                    Masuk ke Sistem
                </button>
            </div>
        </form>

        <!-- Footer Kecil -->
        <div class="text-center pt-4 border-t border-slate-100">
            <p class="text-xs text-slate-400">
                &copy; 2026 Sistem Informasi Pengelolaan Surat
            </p>
        </div>

    </div>

</body>
</html>