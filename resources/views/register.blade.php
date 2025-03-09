<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Pinjam</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold text-center text-gray-800">Daftar Akun</h2>

        <form method="POST" action="{{ route('register') }}" class="mt-4 space-y-3">
            @csrf

            <div>
                <label class="block text-sm font-semibold">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full px-3 py-2 border rounded-md bg-gray-100" required>
            </div>

            <div>
                <label class="block text-sm font-semibold">Email</label>
                <input type="email" name="email" class="w-full px-3 py-2 border rounded-md bg-gray-100" required>
            </div>

            <div>
                <label class="block text-sm font-semibold">NIP</label>
                <input type="text" name="nip" class="w-full px-3 py-2 border rounded-md bg-gray-100" required>
            </div>

            <div>
                <label class="block text-sm font-semibold">Peran</label>
                <select name="role" class="w-full px-3 py-2 border rounded-md bg-gray-100" required>
                    <option value="admin">Admin</option>
                    <option value="peminjam">Peminjam</option>
                </select>
            </div>

            <!-- Input Tambahan untuk Peminjam -->
            <div id="extraFields" class="hidden">
                <div>
                    <label class="block text-sm font-semibold">Jabatan</label>
                    <input type="text" name="jabatan" class="w-full px-3 py-2 border rounded-md bg-gray-100">
                </div>

                <div>
                    <label class="block text-sm font-semibold">Departemen</label>
                    <input type="text" name="departemen" class="w-full px-3 py-2 border rounded-md bg-gray-100">
                </div>

                <div>
                    <label class="block text-sm font-semibold">Foto KTP</label>
                    <input type="file" name="foto_ktp" class="w-full px-3 py-2 border rounded-md bg-gray-100">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold">Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 border rounded-md bg-gray-100" required>
            </div>

            <div>
                <label class="block text-sm font-semibold">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full px-3 py-2 border rounded-md bg-gray-100" required>
            </div>
            <button type="submit" class="bg-primary2 w-full mt-4 rounded-md font-bold p-2 text-center text-white hover:opacity-80">
                Daftar
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-3">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 font-semibold">Masuk</a>
        </p>
    </div>

    <script>
        document.querySelector("select[name='role']").addEventListener("change", function() {
            let extraFields = document.getElementById("extraFields");
            extraFields.style.display = this.value === "peminjam" ? "block" : "none";
        });
    </script>

</body>
</html>
