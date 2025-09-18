<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>

    @if (session()->has('registSuccess'))
        <div
            class="text-sm font-semibold text-white bg-green-600 rounded-lg p-2 max-w-sm mx-auto flex items-center mt-5">
            {{ session('registSuccess') }}
            <svg width="20px" height="20px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"
                class="ml-2" stroke="#ffffff">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path fill="#ffffff"
                        d="M512 64a448 448 0 1 1 0 896 448 448 0 0 1 0-896zm-55.808 536.384-99.52-99.584a38.4 38.4 0 1 0-54.336 54.336l126.72 126.72a38.272 38.272 0 0 0 54.336 0l262.4-262.464a38.4 38.4 0 1 0-54.272-54.336L456.192 600.384z">
                    </path>
                </g>
            </svg>
        </div>
    @endif

    <h1 class="text-2xl font-semibold mx-auto max-w-lg my-10">Welcome {{ auth()->user()->name }}, Ajukan Pinjaman
        Sekarang!
    </h1>
    <div class="p-3 flex justify-center mx-auto max-w-sm my-1">
        <a href="/home/formPinjaman"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ajukan
            Pinjaman</a>
        <a href="/home/penawaran"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat
            Penawaran</a>
    </div>

    @if (session()->has('success'))
        <div class="text-sm font-semibold text-white bg-green-600 rounded-lg p-2 max-w-sm mx-auto flex items-center">
            {{ session('success') }}
            <svg width="35px" height="35px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"
                class="ml-1" stroke="#ffffff">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path fill="#ffffff"
                        d="M512 64a448 448 0 1 1 0 896 448 448 0 0 1 0-896zm-55.808 536.384-99.52-99.584a38.4 38.4 0 1 0-54.336 54.336l126.72 126.72a38.272 38.272 0 0 0 54.336 0l262.4-262.464a38.4 38.4 0 1 0-54.272-54.336L456.192 600.384z">
                    </path>
                </g>
            </svg>
        </div>
    @endif

    @if ($showForm)
        <form class="max-w-sm mx-auto" method="POST" action="/home/ajukanPinjaman">
            @csrf
            <div class="mb-5">
                <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                    (Rp)</label>
                <input type="number" id="jumlah" name="jumlah"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
            </div>
            <div class="mb-5">
                <label for="tenor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Tenor
                    (Dalam Bulan)</label>
                <select id="tenor" name="tenor"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="3 bulan">3 Bulan</option>
                    <option value="6 bulan">6 Bulan</option>
                    <option value="9 bulan">9 Bulan</option>
                    <option value="12 bulan">12 Bulan</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="tujuan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tujuan</label>
                <input type="text" id="tujuan" name="tujuan"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
            </div>
            <div class="flex justify-center">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajukan
                    Sekarang</button>
            </div>

        </form>
    @endif

    <div class="fixed left-1/2 right-1/2 bottom-10">
        <div class="max-w-sm mx-auto h-56 flex items-center justify-center bg-orange-300">
            <a href="/logout"
                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Logout</a>
        </div>
    </div>


</body>

</html>
