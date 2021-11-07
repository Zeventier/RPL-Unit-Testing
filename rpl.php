<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>RPL Unit Testing</title>
</head>
<?php
spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.php';
});
?>

<?php $penjualan = new Penjualan(); ?>


<body>
    <div class="container mt-4 position-absolute top-50 start-50 translate-middle">
        <?php
        //for inserting...
        // private  $nama_barang, $harga_satuan, $jumlah, $tanggal_beli, $total;
        session_start();
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $price = $_POST['price'];
            $ammount  = $_POST['ammount'];
            $tanggal  = $_POST['tanggal'];
            $total  = $_POST['total'];

            $penjualan->setNama($nama);
            $penjualan->setHarga($price);
            $penjualan->setJumlah($ammount);
            $penjualan->setTanggal($tanggal);
            $penjualan->setTotal($total);

            if ($penjualan->insert()) {
                $_SESSION['dataInput'] = 'success';

                header('Location: ' . $_SERVER['PHP_SELF']);
                exit;
            } else {
                $_SESSION['dataInput'] = 'fail';

                header('Location: ' . $_SERVER['PHP_SELF']);
                exit;
            }
        }
        //Message
        if (isset($_SESSION['dataInput'])) {
            if ($_SESSION['dataInput'] == 'success') {
                echo "<span class='insert'>Data Inserted Successfully...</span>";
            } elseif ($_SESSION['dataInput'] == 'fail') {
                echo "<span class='insert'>Data Inserted Failed...</span>";
            }
            unset($_SESSION['dataInput']);
        }
        ?>
        <div class="card">
            <div class="card-header">
                Daftar Penjualan Warung xyz
            </div>
            <div class="card-body">
                <h5 class="card-title">Tes</h5>
                <div class="row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formModal" style="margin-bottom:10px;">
                            Tambah Data
                        </button>
                    </div>
                </div>
                <table class="table table-light table-striped table-hover">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Kode barang</th>
                            <th scope="col">Nama barang</th>
                            <th scope="col">Harga satuan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Tanggal beli</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        if (is_array($penjualan->readAll()) || is_object($penjualan->readAll())) {
                            foreach ($penjualan->readAll() as $value) {
                                $i++;
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $i  ?></th>
                                    <td><?php echo $value['nama_barang']  ?></td>
                                    <td><?php echo $value['harga_satuan'];  ?></td>
                                    <td><?php echo $value['jumlah'];  ?></td>
                                    <td><?php echo $value['tanggal_beli'];  ?></td>
                                    <td><?php echo $value['total'];  ?></td>
                                    <td class="text-right">

                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">Edit</button>
                                        <button class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td>No data</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Form modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <?php
                if (isset($_GET['action']) && $_GET['action'] == 'update') {
                    $id = (int)$_GET['id'];
                    $result = $user->readById($id);
                ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah data transaksi Warung xyz</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="Text1" class="form-label">Text </label>
                                <input type="text" class="form-control" id="Text1">
                                <div id="emailHelp" class="form-text">Caption</div>
                            </div>
                            <div class="mb-3">
                                <label for="Text1" class="form-label">Text</label>
                                <input type="text" class="form-control" id="Text1">
                                <div id="emailHelp" class="form-text">Caption</div>
                            </div>
                            <div class="mb-3">
                                <label for="Text1" class="form-label">Text</label>
                                <input type="text" class="form-control" id="Text1">
                                <div id="emailHelp" class="form-text">Caption</div>
                            </div>
                            <div class="mb-3">
                                <label for="Text1" class="form-label">Text</label>
                                <input type="text" class="form-control" id="Text1">
                                <div id="emailHelp" class="form-text">Caption</div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                <?php


                } else {
                ?>

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah data transaksi Warung xyz</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="Text1" class="form-label">Nama barang </label>
                                <input type="text" name="nama" class="form-control" id="Text1">
                                <div id="emailHelp" class="form-text">Caption</div>
                            </div>
                            <div class="mb-3">
                                <label for="Text1" class="form-label">Harga satuan</label>
                                <input type="text" name="price" class="form-control" id="Text1">
                                <div id="emailHelp" class="form-text">Caption</div>
                            </div>
                            <div class="mb-3">
                                <label for="Text1" class="form-label">Jumlah</label>
                                <input type="text" name="ammount" class="form-control" id="Text1">
                                <div id="emailHelp" class="form-text">Caption</div>
                            </div>
                            <div class="mb-3">
                                <label for="Text1" class="form-label">Tanggal beli</label>
                                <input type="date" name="tanggal" class="form-control" id="Text1">
                                <div id="emailHelp" class="form-text">Caption</div>
                            </div>
                            <div class="mb-3">
                                <label for="Text1" class="form-label">Total</label>
                                <input type="text" name="total" class="form-control" id="Text1">
                                <div id="emailHelp" class="form-text">Caption</div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit" />

                        </div>
                    </form>
                <?php
                }

                ?>


            </div>
        </div>
    </div>
</body>

</html>