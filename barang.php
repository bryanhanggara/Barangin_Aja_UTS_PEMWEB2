<?php
include 'koneksi.php';

class Barang{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conn;
    }

    public function insertBarang($id_brg, $nama_brg, $stok, $jenis_brg, $tgl_expired) {
        $sql = "INSERT INTO tb_bryanhanggara_sireg4a (id_brg, nama_brg, stok, jenis_brg, tgl_expired) VALUES ('$id_brg', '$nama_brg', '$stok', '$jenis_brg', '$tgl_expired')";
        return $this->conn->query($sql);
    }

    public function getAllBarang() {
        $sql = "SELECT * FROM tb_bryanhanggara_sireg4a";
        $result = $this->conn->query($sql);
        $barang = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $barang[] = $row;
            }
        }
        return $barang;
    }

    public function deleteBarang($id_brg) {
        $sql = "DELETE FROM tb_bryanhanggara_sireg4a WHERE id_brg='$id_brg'";
        return $this->conn->query($sql);
    }

    public function getBarangByID($id_brg) {
        $sql = "SELECT * FROM tb_bryanhanggara_sireg4a WHERE id_brg='$id_brg'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function updateBarang($id_brg, $nama_brg, $stok, $jenis_brg, $tgl_expired) {
        $sql = "UPDATE tb_bryanhanggara_sireg4a SET nama_brg='$nama_brg', stok='$stok', jenis_brg='$jenis_brg', tgl_expired='$tgl_expired' WHERE id_brg='$id_brg'";
        $result = $this->conn->query($sql);
        if ($result === TRUE) {
            echo "Data berhasil diperbarui.";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function searchBarangByJenis($jenis_brg) {
        $sql = "SELECT * FROM tb_bryanhanggara_sireg4a WHERE jenis_brg='$jenis_brg'";
        $result = $this->conn->query($sql);
        $barang = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $barang[] = $row;
            }
        }
        return $barang;
    }
    
}
?>