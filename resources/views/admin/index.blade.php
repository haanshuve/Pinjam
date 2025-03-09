<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</head>

<body class="bg-slate-200">
    <div class="flex">
        <!-- Sidebar -->
        <div id="sidebar"
            class="flex flex-col absolute md:fixed inset-y-0 left-0 z-50 bg-white w-64 h-full p-5 transition-transform transform -translate-x-full md:translate-x-0 shadow-sm">
            <button id="closeSidebar" class="md:hidden text-2xl mb-4 self-end">✕</button>
            <div class="flex w-36 mb-10">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo">
            </div>

            <ul class="flex flex-col gap-4 text-primary2 font-semibold text-sm">
                <li class="hover:bg-slate-200 rounded-l-full p-2"><a href="dashboard"
                        class="flex items-center"><ion-icon name="apps" class="text-2xl pr-2"></ion-icon>Dashboard</a>
                </li>
                <li class="hover:bg-slate-200 rounded-l-full p-2"><a href="pinjam-kendaraan"
                        class="flex items-center"><ion-icon name="calendar" class="text-2xl pr-2"></ion-icon>Pinjam
                        Kendaraan</a></li>
                <li class="hover:bg-slate-200 rounded-l-full p-2"><a href="#" class="flex items-center"><ion-icon
                            name="car" class="text-2xl pr-2"></ion-icon>Tambah Kendaraan</a></li>
                <li class="hover:bg-slate-200 rounded-l-full p-2"><a href="#" class="flex items-center"><ion-icon
                            name="person-add" class="text-2xl pr-2"></ion-icon>Tambah User</a></li>
                <li class="hover:bg-slate-200 rounded-l-full p-2"><a href="#" class="flex items-center"><ion-icon
                            name="alert" class="text-2xl pr-2"></ion-icon>Call Service</a></li>
                <li class="hover:bg-slate-200 rounded-l-full p-2"><a href="logout" class="flex items-center"><ion-icon
                            name="log-out" class="text-2xl pr-2"></ion-icon>Keluar</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 min-h-screen p-6 w-full md:ml-64">
            <!-- Tombol Sidebar -->
            <button id="openSidebar" class="md:hidden text-2xl mb-4">☰</button>

            <!-- Navbar -->
            <div class="flex justify-between">
                <h1 class="font-poppins font-bold text-xl sm:text-2xl flex items-center">Analiytics</h1>

                <button class="flex w-fit gap-3" id="openPopupProfile">
                    <div class="flex flex-col text-sm">
                        <h1>Hey, <b>{{ $user->nama }}</b>.</h1>
                        <p class="text-left">{{ $user->role }}</p>
                    </div>
                    <div class="flex">
                        <div class="w-9 h-9 overflow-hidden rounded-full my-auto bg-center bg-cover shadow-sm"
                            style="background-image: url(../assets/user\ \(2\).jpg);"></div>
                    </div>
                </button>

                <!-- Popup (Modal) -->
                <div id="popupProfile"
                    class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full max-h-[90vh] overflow-y-auto">
                        <h2 class="text-xl font-semibold mb-4">Form: Data Diri</h2>

                        <!-- Modal Form -->
                        <form id="popupFormProfile">
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium">Nama</label>
                                <input type="text" id="name" name="nama" required
                                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    value="{{ $user->nama }}">
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium">Email</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    value="{{ $user->email }}">
                            </div>

                            <div class="mb-4">
                                <label for="no-hp" class="block text-sm font-medium">No Whatsapp</label>
                                <input type="text" id="no-hp" name="no-hp" required
                                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    maxlength="18" value="{{ $user->phone }}">
                            </div>

                            <div class="mb-4 relative">
                                <label for="pass" class="block text-sm font-medium">Password</label>
                                <input type="password" id="pass" name="pass" required
                                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    value="******">
                            
                                <!-- Tombol Show/Hide Password -->
                                <button type="button" id="togglePass" class="absolute right-2 top-8 text-xl text-gray-500">
                                    <ion-icon id="eyeIcon" name="eye-off"></ion-icon>
                                </button>
                            </div>

                            <!-- Jika pengguna BUKAN admin, tampilkan field tambahan -->
                            @if ($user->role !== 'admin')
                                <div class="mb-4">
                                    <label for="ktp" class="block text-sm font-medium">KTP</label>
                                    <input type="file" id="ktp" name="ktp" required
                                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                </div>

                                <div class="flex justify-between gap-2">
                                    <div class="mb-4 w-full">
                                        <label for="jabatan" class="block text-sm font-medium">Jabatan</label>
                                        <input type="text" id="jabatan" name="jabatan" required
                                            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                                            value="{{ $user->jabatan }}">
                                    </div>

                                    <div class="flex flex-col w-full">
                                        <label for="depart" class="block text-sm font-medium">Departemen</label>
                                        <select name="departemen" id="depart" class="p-2 border rounded-md w-full focus:ring-2 focus:ring-blue-400">
                                            <option value="informatika" {{ $user->departemen == 'informatika' ? 'selected' : '' }}>Informatika</option>
                                            <option value="mesin" {{ $user->departemen == 'mesin' ? 'selected' : '' }}>Mesin</option>
                                            <option value="bisnis" {{ $user->departemen == 'bisnis' ? 'selected' : '' }}>Manajemen Bisnis</option>
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="flex justify-end space-x-2">
                                <button type="button" id="closePopupProfile" class="bg-gray-300 text-black px-4 py-2 rounded-md">Cancel</button>
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Konten Utama -->
            <div class="flex flex-col sm:flex-row justify-between mt-5 gap-5">
                <div
                    class="flex justify-between text-primary2 h-fit w-full sm:w-1/2 xl:w-80 p-5 xl:p-10 rounded-md bg-white shadow-md hover:bg-primary2 hover:text-white">
                    <div class="flex flex-col gap-1 md:gap-2">
                        <h1 class="font-bold text-xl xl:text-3xl">10</h1>
                        <p class="text-lg xl:text-lg">Available</p>
                    </div>

                    <p class="text-center flex items-center w-fit"><ion-icon name="podium"
                            class="text-3xl xl:text-6xl"></ion-icon>
                    </p>
                </div>

                <div
                    class="flex text-primary2 justify-between h-fit w-full sm:w-1/2 xl:w-80 p-5 xl:p-10 rounded-md bg-white shadow-md hover:bg-primary2 hover:text-white">
                    <div class="flex flex-col gap-1 md:gap-2">
                        <h1 class="font-bold text-xl xl:text-3xl">7</h1>
                        <p class="text-lg xl:text-lg">Digunakan</p>
                    </div>

                    <p class="text-center flex items-center w-fit"><ion-icon name="map"
                            class="text-3xl xl:text-6xl"></ion-icon></p>
                </div>

                <div
                    class="flex justify-between text-primary2 h-fit w-full sm:w-1/2 xl:w-80 p-5 xl:p-10 rounded-md bg-white shadow-md hover:bg-primary2 hover:text-white">
                    <div class="flex flex-col gap-1 md:gap-2">
                        <h1 class="font-bold text-xl xl:text-3xl">3</h1>
                        <p class="text-lg xl:text-lg">Perbaikan</p>
                    </div>

                    <p class="text-center flex items-center w-fit"><ion-icon name="cog"
                            class="text-3xl xl:text-6xl"></ion-icon></p>
                </div>
            </div>

            <!-- USER -->
            <div class="flex mt-8 flex-col">
                <h1 class="font-semibold font-poppins text-xl">Users</h1>

                <div class="flex justify-between mt-2 gap-1 bg-white shadow-md px-2 md:px-12 xl:px-36 py-5 rounded-xl">
                    @foreach ($users as $user)
                        <div class="flex flex-col gap-3 w-fit text-center hover:bottom-2 transition-all">
                            <div class="background w-12 h-12 xl:w-20 xl:h-20 bg-center bg-cover rounded-full m-auto shadow-sm"
                                style="background-image: url('{{ asset($user->foto_ktp ? 'storage/' . $user->foto_ktp : 'assets/default-user.jpg') }}');">
                            </div>
                            <div class="flex flex-col">
                                <h1 class="font-bold tracking-wide text-center text-base sm:text-lg xl:text-xl font-poppins">
                                    {{ $user->nama }}
                                </h1>
                                <p class="text-center text-slate-400 font-poppins text-xs md:text-sm">
                                    {{ $user->departemen }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <!-- Button Tambah User -->
                <a href="#" class="flex flex-col gap-3 w-fit text-center my-auto relative hover:bottom-2 md:hover:bottom-0 transition-all">
                    <ion-icon name="add"
                        class="md:text-3xl xl:text-7xl font-bold rounded-full p-2 hover:bg-slate-100"></ion-icon>
                    <p class="font-bold font-poppins tracking-wide text-center text-xs text-slate-400 hover:text-primary2">
                        More..
                    </p>
                </a>

                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md rounded-lg mt-8">
                <h1 class="text-xl font-semibold font-poppins mb-5">Timeline</h1>
                <table class="min-w-[700px] w-full text-sm text-left rtl:text-right text-primary2">
                    <thead class="text-xs text-gray-700 uppercase bg-white">
                        <tr>
                            <th scope="col" class="px-4 py-3">Plat Nomor</th>
                            <th scope="col" class="px-4 py-3">Merk/Seri</th>
                            <th scope="col" class="px-4 py-3">Kategori</th>
                            <th scope="col" class="px-4 py-3">Peminjam</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b border-gray-200">
                            <th scope="row" class="px-4 py-4 font-medium text-primary2">BP1234</th>
                            <td class="px-4 py-4">Avanza</td>
                            <td class="px-4 py-4">Mobil</td>
                            <td class="px-4 py-4">Abdul</td>
                            <td class="px-4 py-4">
                                <p class="bg-yellow-100 rounded-full w-fit px-2 font-semibold">Digunakan</p>
                            </td>
                            <td class="px-4 py-4 space-x-2">
                                <a href="#"
                                    class="font-medium bg-yellow-300 px-3 py-1 rounded-lg hover:opacity-60">Edit</a>
                                <a href="#"
                                    class="font-medium bg-red-500 px-3 py-1 rounded-lg hover:opacity-60">Hapus</a>
                            </td>
                        </tr>
                        <tr class="bg-white border-b border-gray-200">
                            <th scope="row" class="px-4 py-4 font-medium text-primary2">BP1234</th>
                            <td class="px-4 py-4">Avanza</td>
                            <td class="px-4 py-4">Mobil</td>
                            <td class="px-4 py-4">Abdul</td>
                            <td class="px-4 py-4">
                                <p class="bg-red-400 rounded-full w-fit px-2 font-semibold">Perbaikan</p>
                            </td>
                            <td class="px-4 py-4 space-x-2">
                                <a href="#"
                                    class="font-medium bg-yellow-300 px-3 py-1 rounded-lg hover:opacity-60">Edit</a>
                                <a href="#"
                                    class="font-medium bg-red-500 px-3 py-1 rounded-lg hover:opacity-60">Hapus</a>
                            </td>
                        </tr>
                        <tr class="bg-white border-b border-gray-200">
                            <th scope="row" class="px-4 py-4 font-medium text-primary2">BP1234</th>
                            <td class="px-4 py-4">Avanza</td>
                            <td class="px-4 py-4">Mobil</td>
                            <td class="px-4 py-4">Abdul</td>
                            <td class="px-4 py-4">
                                <p class="bg-green-300 rounded-full w-fit px-2 font-semibold">Available</p>
                            </td>
                            <td class="px-4 py-4 space-x-2">
                                <a href="#"
                                    class="font-medium bg-yellow-300 px-3 py-1 rounded-lg hover:opacity-60">Edit</a>
                                <a href="#"
                                    class="font-medium bg-red-500 px-3 py-1 rounded-lg hover:opacity-60">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="m-auto w-fit my-5">
                <a href="pinjam-kendaraan.html" class="font-semibold font-poppins underline">More..</a>
            </div>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');

        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });

        // popup Profile

        const openPopup = document.getElementById('openPopupProfile');
        const closePopup = document.getElementById('closePopupProfile');
        const popup = document.getElementById('popupProfile');

        // Buka popup
        openPopup.addEventListener('click', () => {
            popup.classList.remove('hidden');
        });

        // Tutup popup
        closePopup.addEventListener('click', () => {
            popup.classList.add('hidden');
        });
    </script>    
</body>


</html>