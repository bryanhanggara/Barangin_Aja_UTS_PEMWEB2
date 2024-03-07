<?php
    include 'layout.php';
    include 'barang.php';

    $barang = new Barang();


    $allBarang = $barang->getAllBarang();


    if (isset($_GET['hapus'])) {
        $id_brg = $_GET['hapus'];
        $barang->deleteBarang($id_brg);
        header("Location: index.php");
    }

    if (isset($_POST['update'])) {
        $id_brg = $_POST['id_brg'];
        $nama_brg = $_POST['nama_brg'];
        $stok = $_POST['stok'];
        $jenis_brg = $_POST['jenis_brg'];
        $tgl_expired = $_POST['tgl_expired'];
    
        $barang->updateBarang($id_brg, $nama_brg, $stok, $jenis_brg, $tgl_expired);
        header("Location: index.php");
    }

    $hasil_pencarian = array();
    if(isset($_GET['jenis_brg'])) {
        $jenis_brg = $_GET['jenis_brg'];
        $hasil_pencarian = $barang->searchBarangByJenis($jenis_brg);
    }
?>

<div class="p-4 sm:ml-64 dark:bg-gray-700 h-screen">
    <div class="p-4 text-lg font-bold text-white uppercase">
      List Barang
    </div>
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-l dark:border-gray-100">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <!-- Formulir pencarian -->
            <form class="max-w-md" method="GET" action="index.php">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" name="jenis_brg" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Makanan, Pecah Bela, Lainnya..." required />
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>

            <!-- Tabel daftar barang -->
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Produk ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Barang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Barang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stok
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Expired
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Jika ada hasil pencarian, tampilkan hasil pencarian
                    if(!empty($hasil_pencarian)) :
                        foreach($hasil_pencarian as $barang) : ?>
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo $barang['id_brg']?>
                                </th>
                                <td class="px-6 py-4">
                                    <?php echo $barang['nama_brg']?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $barang['jenis_brg']?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $barang['stok']?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $barang['tgl_expired']?>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="edit.php?id_brg=<?php echo $barang['id_brg']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="?hapus=<?php echo $barang['id_brg']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"  onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php 
                        // Iterasi semua barang
                        foreach($allBarang as $barang) : ?>
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo $barang['id_brg']?>
                                </th>
                                <td class="px-6 py-4">
                                    <?php echo $barang['nama_brg']?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $barang['jenis_brg']?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $barang['stok']?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $barang['tgl_expired']?>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="edit.php?id_brg=<?php echo $barang['id_brg']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="?hapus=<?php echo $barang['id_brg']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"  onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
