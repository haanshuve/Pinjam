<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Kendaraan | Admin</title>
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
                <li class="hover:bg-slate-200 rounded-l-full p-2"><a href="dashboard" class="flex items-center">
                        <ion-icon name="apps" class="text-2xl pr-2"></ion-icon>Dashboard
                    </a>
                </li>
                <li class="hover:bg-slate-200 rounded-l-full p-2"><a href="#" class="flex items-center">
                        <ion-icon name="calendar" class="text-2xl pr-2"></ion-icon>Pinjam Kendaraan
                    </a></li>
                <li class="hover:bg-slate-200 rounded-l-full p-2"><a href="#" class="flex items-center">
                        <ion-icon name="car" class="text-2xl pr-2"></ion-icon>Tambah Kendaraan
                    </a></li>
                <li class="hover:bg-slate-200 rounded-l-full p-2"><a href="#" class="flex items-center">
                        <ion-icon name="person-add" class="text-2xl pr-2"></ion-icon>Tambah User
                    </a></li>
                <li class="hover:bg-slate-200 rounded-l-full p-2"><a href="#" class="flex items-center">
                        <ion-icon name="alert" class="text-2xl pr-2"></ion-icon>Call Service
                    </a></li>
                <li class="hover:bg-slate-200 rounded-l-full p-2"><a href="#" class="flex items-center">
                        <ion-icon name="log-out" class="text-2xl pr-2"></ion-icon>Keluar
                    </a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 min-h-screen p-6 w-full md:ml-64">
            <!-- Tombol Sidebar -->
            <button id="openSidebar" class="md:hidden text-2xl mb-4">☰</button>

            <!-- Navbar -->
            <div class="flex justify-between">
                <h1 class="font-poppins font-bold text-xl sm:text-2xl flex items-center">Pinjam Kendaraan</h1>

                <button class="flex w-fit gap-3" id="openPopupProfile">
                    <div class="flex flex-col text-sm">
                        <h1>Hey, <b>Farrel</b>.</h1>
                        <p class="text-left">Admin</p>
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

                        <form id="popupFormProfile">
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium">Nama</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    value="Farrel Adelio Asman">
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium">Email</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    value="farreladelioasman@gmail.com">
                            </div>

                            <div class="mb-4">
                                <label for="nip" class="block text-sm font-medium">NIP</label>
                                <input type="nip" id="nip" name="nip" required
                                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    maxlength="18" value="11111111111111111">
                            </div>

                            <div class="mb-4">
                                <label for="no-hp" class="block text-sm font-medium">No Whatsapp</label>
                                <input type="text" id="no-hp" name="no-hp" required
                                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    maxlength="18" value="089686968886">
                            </div>

                            <div class="mb-4 relative">
                                <label for="pass" class="block text-sm font-medium">Password</label>
                                <input type="password" id="pass" name="pass" required
                                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    value="farrel@2025">

                                <!-- Tombol Show/Hide dengan Ionicons -->
                                <button type="button" id="togglePass"
                                    class="absolute right-2 top-8 text-xl text-gray-500">
                                    <ion-icon id="eyeIcon" name="eye-off"></ion-icon>
                                </button>
                            </div>

                            <script>
                            const passInput = document.getElementById('pass');
                            const togglePass = document.getElementById('togglePass');
                            const eyeIcon = document.getElementById('eyeIcon');

                            togglePass.addEventListener('click', () => {
                                if (passInput.type === 'password') {
                                    passInput.type = 'text';
                                    eyeIcon.setAttribute('name', 'eye');
                                } else {
                                    passInput.type = 'password';
                                    eyeIcon.setAttribute('name', 'eye-off');
                                }
                            });
                            </script>



                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium">KTP</label>
                                <input type="file" id="email" name="email" required
                                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </div>

                            <div class="flex justify-between gap-2">
                                <div class="mb-4 w-full">
                                    <label for="jabatan" class="block text-sm font-medium">Jabatan</label>
                                    <input type="text" id="jabatan" name="jabatan" required
                                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                                        value="Pimpinan">
                                </div>

                                <div class="flex flex-col w-full">
                                    <label for="depart"
                                        class="block text-sm font-medium  focus:ring-2 focus:ring-blue-400">Departemen</label>

                                    <select name="depart" id="sort"
                                        class="p-2 border rounded-md w-full  focus:ring-2 focus:ring-blue-400">
                                        <option value="poltek">Informatika</option>
                                        <option value="saab">Mesin</option>
                                        <option value="mercedes">Manajemen Bisnis</option>
                                    </select>
                                </div>
                            </div>


                            <div class="flex justify-end space-x-2">
                                <button type="button" id="closePopupProfile"
                                    class="bg-gray-300 text-black px-4 py-2 rounded-md">Cancel</button>
                                <button type="submit"
                                    class="bg-green-500 text-white px-4 py-2 rounded-md">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <!-- Konten Utama -->



            <!-- TIMELINE -->
            <div class="relative overflow-x-auto shadow-md rounded-lg mt-8">
                <h1 class="text-xl font-semibold font-poppins mb-5">Timeline</h1>

                <div class="flex justify-between">
                    <button id="openPopupPinjam" class="bg-blue-500 text-white w-fit h-fit px-2 py-2 rounded-md">Pinjam
                        Sekarang</button>

                    <!-- Popup (Modal) -->
                    <div id="popupPinjam"
                        class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
                        <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full max-h-[90vh] overflow-y-auto">
                            <h2 class="text-xl font-semibold mb-4">Form: Pinjam Kendaraan</h2>

                            <form id="popupFormPinjam">
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium">Nama</label>
                                    <input type="text" id="name" name="name" required
                                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                </div>

                                <div class="mb-4">
                                    <label for="wa" class="block text-sm font-medium">No Whatsapp</label>
                                    <input type="text" id="wa" name="wa" required
                                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="block text-sm font-medium">Email</label>
                                    <input type="email" id="email" name="email" required
                                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="block text-sm font-medium">Estimasi</label>
                                    <div class="flex flex-col gap-2 sm:flex-row sm:justify-between">
                                        <input type="datetime-local" id="email" name="email" required
                                            class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 w-full">

                                        <input type="datetime-local" id="email" name="email" required
                                            class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 w-full">
                                    </div>
                                </div>


                                <div class="mb-4">
                                    <label for="merk" class="block text-sm font-medium">Pilih Kendaraan</label>


                                    <div class="relative inline-block w-64">
                                        <!-- Dropdown Button -->
                                        <button id="dropdownButton"
                                            class="p-2 w-full border rounded-md text-left bg-white">Merk/Seri</button>

                                        <!-- Dropdown -->
                                        <div id="dropdownContent"
                                            class="absolute hidden w-full border bg-white rounded-md shadow-md mt-1 z-50">
                                            <div class="option p-2 hover:bg-gray-100 flex items-center cursor-pointer"
                                                data-value="toyota1">
                                                <img src="../assets/Toyota Avanza 1.3 G.jpg" alt="Toyota Avanza 1.3 G"
                                                    class="w-10 h-10 mr-2">Toyota Avanza 1.3 G
                                            </div>
                                            <div class="option p-2 hover:bg-gray-100 flex items-center cursor-pointer"
                                                data-value="toyota2">
                                                <img src="../assets/2022 Toyota Avanza 1.3 E.jpg"
                                                    alt="2022 Toyota Avanza 1.3 E" class="w-10 h-10 mr-2">2022 Toyota
                                                Avanza 1.3 E
                                            </div>
                                            <div class="option p-2 hover:bg-gray-100 flex items-center cursor-pointer"
                                                data-value="toyota3">
                                                <img src="../assets/2022 Toyota Avanza 1.3 E.jpg"
                                                    alt="Toyota Avanza 1.3 E" class="w-10 h-10 mr-2">Toyota Avanza 1.3 E
                                            </div>
                                        </div>

                                        <!-- Form Modal -->
                                        <input type="hidden" id="selectedValue" name="sort" value="">
                                    </div>

                                    <script>
                                    const dropdownButton = document.getElementById('dropdownButton');
                                    const dropdownContent = document.getElementById('dropdownContent');
                                    const hiddenInput = document.getElementById('selectedValue');

                                    dropdownButton.addEventListener('click', () => {
                                        dropdownContent.classList.toggle('hidden');
                                    });

                                    document.querySelectorAll('.option').forEach(option => {
                                        option.addEventListener('click', () => {
                                            dropdownButton.textContent = option.textContent.trim();
                                            hiddenInput.value = option.dataset.value;
                                            dropdownContent.classList.add('hidden');
                                        });
                                    });

                                    document.addEventListener('click', (e) => {
                                        if (!dropdownButton.contains(e.target) && !dropdownContent.contains(e
                                                .target)) {
                                            dropdownContent.classList.add('hidden');
                                        }
                                    });
                                    </script>
                                </div>

                                <div class="mb-4">
                                    <label for="tujuan" class="block text-sm font-medium">Tujuan Peminjaman</label>
                                    <textarea type="text" id="tujuan" name="tujuan" required
                                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                                </div>

                                <div class="flex justify-end space-x-2">
                                    <button type="button" id="closePopupPinjam"
                                        class="bg-gray-300 text-black px-4 py-2 rounded-md">Cancel</button>
                                    <button type="submit"
                                        class="bg-green-500 text-white px-4 py-2 rounded-md">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="flex mb-2 items-center ml-auto w-fit">
                        <label for="sort" class="mr-2 font-semibold">Sort by</label>

                        <select name="sort" id="sort" class="p-2 border rounded-md cursor-pointer">
                            <option value="" class="cursor-pointer">Terbaru</option>
                            <option value="" class="cursor-pointer">Terlama</option>
                            <option value="" class="cursor-pointer">A-Z</option>
                        </select>
                    </div>
                </div>

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
                            <td class="px-4 py-4">Dadang</td>
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
                            <td class="px-4 py-4">Dudung</td>
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
                            <td class="px-4 py-4">Diding</td>
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

    // popup Pinjjam

    const openPopup = document.getElementById('openPopupPinjam');
    const closePopup = document.getElementById('closePopupPinjam');
    const popup = document.getElementById('popupPinjam');

    // Buka popup
    openPopup.addEventListener('click', () => {
        popup.classList.remove('hidden');
    });

    // Tutup popup
    closePopup.addEventListener('click', () => {
        popup.classList.add('hidden');
    });

    // Submit form
    document.getElementById('popupFormPinjam').addEventListener('submit', (e) => {
        e.preventDefault();
        alert('Form submitted!');
        popup.classList.add('hidden');
    });


    // Ambil elemen yang dibutuhkan
    const openPopupProfile = document.getElementById('openPopupProfile');
    const closePopupProfile = document.getElementById('closePopupProfile');
    const popupProfile = document.getElementById('popupProfile');

    // Buka popup profile
    openPopupProfile.addEventListener('click', () => {
        popupProfile.classList.remove('hidden');
    });

    // Tutup popup profile
    closePopupProfile.addEventListener('click', () => {
        popupProfile.classList.add('hidden');
    });
    </script>
</body>


</html>