<?php

spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.php';
});


class Penjualan
{
    private $table = 'penjualan';

    public $harga_satuan, $jumlah, $tanggal_beli, $total;
    public string $id;
    public string $nama_barang;
    public function setID($id)
    {
        $this->id = $id;
    }
    public function setNama($nama_barang)
    {
        $this->nama_barang = $nama_barang;
    }
    public function setHarga($harga_satuan)
    {
        $this->harga_satuan = $harga_satuan;
    }
    public function setJumlah($jumlah)
    {
        $this->jumlah = $jumlah;
    }
    public function setTanggal($tanggal_beli)
    {
        $this->tanggal_beli = $tanggal_beli;
    }
    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function insert()
    {
        $sql = "INSERT INTO $this->table(nama_barang,harga_satuan,jumlah, tanggal_beli, total) VALUES(:nama,:price,:ammount,:tanggal,:total)";
        $stmt = (new DB)->prepared($sql);
        $stmt->bindParam(':nama', $this->nama_barang);
        $stmt->bindParam(':price', $this->harga_satuan);
        $stmt->bindParam(':ammount', $this->jumlah);
        $stmt->bindParam(':tanggal', $this->tanggal_beli);
        $stmt->bindParam(':total', $this->total);
        return $stmt->execute();
    }

    public function readAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = (new DB)->prepared($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if ($stmt->rowCount() > 0) {
            return $result;
        }
    }
    public function readById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id=:id";
        $stmt = (new DB)->prepared($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id=:id";
        $stmt = (new DB)->prepared($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function update($id)
    {
        $sql  = "UPDATE $this->table SET nama_barang=:nama, harga_satuan=:price, jumlah=:ammount, tanggal_beli=:tanggal, total=:total WHERE id=:id";
        $stmt = (new DB)->prepared($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $this->nama_barang);
        $stmt->bindParam(':price', $this->harga_satuan);
        $stmt->bindParam(':ammount', $this->jumlah);
        $stmt->bindParam(':tanggal', $this->tanggal_beli);
        $stmt->bindParam(':total', $this->total);
        return $stmt->execute();
    }
    public function fetchById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id=:id";
        $stmt = (new DB)->prepared($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($row = $stmt->fetch()) {
            $penj = new Penjualan();
            $penj->id = $row['id'];
            $penj->nama_barang = $row['nama_barang'];
            $penj->harga_satuan = $row['harga_satuan'];
            $penj->jumlah = $row['jumlah'];
            $penj->tanggal_beli = $row['tanggal_beli'];
            $penj->total = $row['total'];
        } else {
            return null;
        }
        $row = $stmt->fetch();

        // echo $hey[0];
        return $penj;
    }
}
