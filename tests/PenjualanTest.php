<?php

// namespace RPL_Unit_Testing\Repository;


// use RPL_Unit_Testing\Domain\Penjualan;
require_once('./classes/Penjualan.php');
// require_once('./app/Repository/UserRepository.php');
class PenjualanTest extends \PHPUnit\Framework\TestCase
{
    // private UserRepository $userRepository;
    //  = new UserRepository();

    // protected function setUp(): void
    // {
    //     $this->sessionRepository = new SessionRepository(Database::getConnection());
    //     $this->sessionRepository->deleteAll();

    //     $this->userRepository = new UserRepository(Database::getConnection());
    //     $this->userRepository->deleteAll();
    // }
    public function testAddSuccess()
    {
        $penjualan = new Penjualan();
        // $penjualan->id = ;
        // $penjualan->nama_barang = "Eko";
        // $penjualan->password = "rahasia";
        // $penjualan->setID(69);
        $penjualan->setID(69);
        $penjualan->setNama("Udin");
        $penjualan->setHarga(200);
        $penjualan->setJumlah(2);
        $penjualan->setTanggal('2020/02/02');
        $penjualan->setTotal(400);
        echo "woy tot" .  gettype($penjualan->id);
        // $penjualan->insert();
        $penjualan->insert();

        $result = $penjualan->readById(69);
        echo "woy tot" .  gettype($result[0]);

        self::assertEquals("69", $result['id']);
        // self::assertEquals($penjualan->nama_barang, $result->nama_barang);
    }
}
