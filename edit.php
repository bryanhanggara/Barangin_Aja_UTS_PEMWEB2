<?php
    include 'layout.php';
    include 'barang.php';

    $barang = new Barang();

    if (isset($_GET['id_brg'])) {
        $id_brg = $_GET['id_brg'];
        $barangData = $barang->getBarangByID($id_brg);
    }
?>

<div class="p-4 sm:ml-64 dark:bg-gray-700 h-screen">
    <div class="p-4 text-lg font-bold text-white uppercase">
      Edit Barang <?php echo $barangData['nama_brg']?>
    </div>
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-l dark:border-gray-100">
        

        <form class="max-w-md mx-auto" method="POST" action="index.php">
            <div class="relative z-0 w-full mb-5 group hidden">
                <input value="<?php echo $barangData['id_brg']; ?>" type="text" name="id_brg" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ID Barang</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input value="<?php echo $barangData['nama_brg']; ?>" type="text" name="nama_brg" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Barang</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input value="<?php echo $barangData['stok']; ?>" type="text" name="stok" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Stok</label>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                <label for="underline_select" class="sr-only">Jenis Barang</label>
                <select value="<?php echo $barangData['jenis_brg']; ?>" name="jenis_brg" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    <option selected><?php echo $barangData['jenis_brg']; ?></option>
                    <option value="Pecah Belah">Pecah Bela</option>
                    <option value="Mainan">Mainan</option>
                    <option value="Mebel">Mebel</option>
                    <option value="Makanan">Makanan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input  value="<?php echo $barangData['tgl_expired']; ?>" name="tgl_expired" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                </div>
            </div>
        <button type="submit" name="update" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
  </div>