<?php

// namespace RPL_Unit_Testing\Repository;


// use RPL_Unit_Testing\Domain\Penjualan;
require_once('./classes/Penjualan.php');
// require_once('./app/Repository/UserRepository.php');
class PenjualanTest extends \PHPUnit\Framework\TestCase
{

    public function testAddSuccess()
    {
        $penjualan = new Penjualan();
        $penjualan->setID("69");
        $penjualan->setNama("Test barang");
        $penjualan->setHarga(300);
        $penjualan->setJumlah(2);
        $penjualan->setTanggal('2020-02-02');
        $penjualan->setTotal(400);

        $penjualan->insert();

        $result = $penjualan->fetchById($penjualan->id);
        self::assertEquals($penjualan->id, $result->id);
        self::assertEquals($penjualan->nama_barang, $result->nama_barang);
        self::assertEquals($penjualan->harga_satuan, $result->harga_satuan);
        self::assertEquals($penjualan->jumlah, $result->jumlah);
        self::assertEquals($penjualan->tanggal_beli, $result->tanggal_beli);
        self::assertEquals($penjualan->total, $result->total);
    }

    public function testUpdateSuccess()
    {
        $idSumber = "1636307068";
        $penjualan = new Penjualan();
        // $penjualan->setID("69");
        $penjualan->setNama("Test barang");
        $penjualan->setHarga(300);
        $penjualan->setJumlah(2);
        $penjualan->setTanggal('2020-02-02');
        $penjualan->setTotal(400);


        $penjualan->update($idSumber);

        $result = $penjualan->fetchById($idSumber);
        self::assertEquals($idSumber, $result->id);
        self::assertEquals($penjualan->nama_barang, $result->nama_barang);
        self::assertEquals($penjualan->harga_satuan, $result->harga_satuan);
        self::assertEquals($penjualan->jumlah, $result->jumlah);
        self::assertEquals($penjualan->tanggal_beli, $result->tanggal_beli);
        self::assertEquals($penjualan->total, $result->total);
    }

    public function testDeleteSuccess()
    {
        $idSumber = "69";
        $penjualan = new Penjualan();

        $penjualan->delete($idSumber);

        $result = $penjualan->fetchById($idSumber);
        self::assertEquals(null, $result);
    }
}
