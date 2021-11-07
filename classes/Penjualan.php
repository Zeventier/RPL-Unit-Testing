<?php

class Penjualan
{
    private $table = 'penjualan';

    private  $nama_barang, $harga_satuan, $jumlah, $tanggal_beli, $total;

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
        $stmt = DB::prepared($sql);
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
        $stmt = DB::prepared($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if ($stmt->rowCount() > 0) {
            return $result;
        }
    }
}
