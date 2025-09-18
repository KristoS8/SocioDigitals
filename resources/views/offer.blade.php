<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penawaran Pinjaman</title>
    @vite('resources/css/app.css')
</head>

<h1 class="text-3xl font-semibold mx-auto max-w-xl my-10">Tabel Penawaran Pinjaman {{ auth()->user()->name }}</h1>

<div class="relative overflow-x-auto">
    <table class="w-10/12 mx-auto text-sm text-left rtl:text-right text-gray-900 dark:text-gray-400">
        <thead class="text-gray-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Jumlah
                </th>
                <th scope="col" class="px-6 py-3">
                    Tenor
                </th>
                <th scope="col" class="px-6 py-3">
                    Tujuan
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-sm">
                        {{ 'Rp. ' . number_format($loan->jumlah, 0, ',', '.') }}
                    </th>
                    <td class="px-6 py-4 max-w-sm">
                        {{ $loan->tenor }}
                    </td>
                    <td class="px-6 py-4 max-w-sm">
                        {{ $loan->tujuan }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-50 max-w-md">
                        <div
                            class="p-2 w-max rounded-2xl @if ($loan->status == 'Menunggu Persetujuan') bg-amber-400 @elseif ($loan->status == 'Disetujui') bg-green-400 @elseif ($loan->status == 'Ditolak') bg-red-500 @endif">
                            {{ $loan->status }}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="fixed left-1/2 right-1/2 bottom-10">
    <div class="max-w-sm mx-auto h-56 flex items-center justify-center bg-orange-300">
        <a href="/home"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ">Kembali</a>
    </div>
</div>

<body>

</body>

</html>
