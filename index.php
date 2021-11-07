<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>RPL Unit Testing</title>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<?php
spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.php';
});
?>

<?php $penjualan = new Penjualan(); ?>


<body>
    <div id="textHint">

    </div>
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

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $nama = $_POST['updt_nama'];
            $price = $_POST['updt_price'];
            $ammount  = $_POST['updt_ammount'];
            $tanggal  = $_POST['updt_tanggal'];
            $total  = $_POST['updt_total'];

            $penjualan->setNama($nama);
            $penjualan->setHarga($price);
            $penjualan->setJumlah($ammount);
            $penjualan->setTanggal($tanggal);
            $penjualan->setTotal($total);

            if ($penjualan->update($id)) {
                $_SESSION['dataUpdate'] = 'success';

                header('Location: ' . $_SERVER['PHP_SELF']);
                exit;
            } else {
                $_SESSION['dataUpdate'] = 'fail';

                header('Location: ' . $_SERVER['PHP_SELF']);
                exit;
            }
        }
        if (isset($_SESSION['dataUpdate'])) {
            if ($_SESSION['dataUpdate'] == 'success') {
                echo "<span class='insert'>Data Updated Successfully...</span>";
            } elseif ($_SESSION['dataUpdate'] == 'fail') {
                echo "<span class='insert'>Updating Data Failed...</span>";
            }
            unset($_SESSION['dataUpdate']);
        }

        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $id = (int)$_GET['id'];

            if ($penjualan->delete($id)) {
                echo "<span class='delete'> Data deleted succesfully...</span>";
                $_SESSION['dataDelete'] = 'success';

                header('Location: ' . $_SERVER['PHP_SELF']);
                exit;
            } else {
                $_SESSION['dataDelete'] = 'fail';

                header('Location: ' . $_SERVER['PHP_SELF']);
                exit;
            }
        }
        if (isset($_SESSION['dataDelete'])) {
            if ($_SESSION['dataDelete'] == 'success') {
                echo "<span class='insert'>Data Deleted Successfully...</span>";
            } elseif ($_SESSION['dataDelete'] == 'fail') {
                echo "<span class='insert'>Deleting Data Failed...</span>";
            }
            unset($_SESSION['dataDelete']);
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
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#InsertFormModal" style="margin-bottom:10px;">
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
                                    <th scope="row"><?php echo $value['id']  ?></th>
                                    <td><?php echo $value['nama_barang']  ?></td>
                                    <td><?php echo "Rp" . number_format($value['harga_satuan'], 2, ',', '.');  ?></td>
                                    <td><?php echo number_format($value['jumlah'], 0, ',', '.');  ?></td>
                                    <td><?php echo $value['tanggal_beli'];  ?></td>
                                    <td><?php echo "Rp" . number_format($value['total'], 2, ',', '.');  ?></td>
                                    <td class="text-right">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UpdateFormModal" onclick="<?php echo "fillUpdateForm(" . $value['id'] . ")" ?>">Edit</button>
                                        <a class="btn btn-danger" href="<?php echo $_SERVER['PHP_SELF'] ?>?action=delete&id=<?php echo $value['id']; ?>">Delete</a>

                                        <!-- <button class="btn btn-danger">Hapus</button> -->
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

    <!-- Insert Form modal -->
    <div class="modal fade" id="InsertFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data transaksi Warung xyz</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="Text1" class="form-label">Nama barang </label>
                            <input type="text" name="nama" class="form-control" id="Text1" required>
                            <div id="emailHelp" class="form-text">Caption</div>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga satuan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input id="price" required type="number" min="0" name="price" class="fieldInsertInput form-control rupiah" aria-label="Amount (to the nearest dollar)">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Text1" class="form-label">Jumlah</label>
                            <input type="number" name="ammount" class="fieldInsertInput form-control" id="ammount" required>
                            <div id="emailHelp" class="form-text">Caption</div>
                        </div>
                        <div class="mb-3">
                            <label for="Text1" class="form-label">Tanggal beli</label>
                            <input type="date" name="tanggal" class="form-control" id="Text1" required>
                            <div id="emailHelp" class="form-text">Caption</div>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Total</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input id="total" type="number" min="0" name="total" class=" form-control rupiah" aria-label="Amount (to the nearest dollar)" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit" />

                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- Update Form modal -->
    <div class="modal fade" id="UpdateFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit data transaksi Warung xyz</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <input type="hidden" name="id" id="updt_id" value="" />

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="Text1" class="form-label">Nama barang </label>
                            <input type="text" name="updt_nama" class="form-control" id="updt_nama" required>
                            <div id="emailHelp" class="form-text">Caption</div>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga satuan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input required id="updt_price" type="number" min="0" name="updt_price" class="fieldUpdateInput form-control rupiah" aria-label="Amount (to the nearest dollar)">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="Text1" class="form-label">Jumlah</label>
                            <input type="text" name="updt_ammount" class="fieldUpdateInput form-control" id="updt_ammount" required>
                            <div id="updt_ammount" class="form-text">Caption</div>
                        </div>
                        <div class="mb-3">
                            <label for="Text1" class="form-label">Tanggal beli</label>
                            <input type="date" name="updt_tanggal" class="form-control" id="updt_tanggal" required>
                            <div id="emailHelp" class="form-text">Caption</div>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Total</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input readonly id="updt_total" type="number" min="0" name="updt_total" class="form-control rupiah" aria-label="Amount (to the nearest dollar)">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" name="update" value="Update" />

                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function ajax_get(url, callback) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    console.log('responseText:' + xmlhttp.responseText);
                    try {
                        var data = JSON.parse(xmlhttp.responseText);
                    } catch (err) {
                        console.log(err.message + " in " + xmlhttp.responseText);
                        return;
                    }
                    callback(data);
                }
            };

            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function fillUpdateForm(id) {
            ajax_get("./ajax.php?id=" + id, function(data) {
                document.getElementById("updt_id").value = data["id"];
                document.getElementById("updt_nama").value = data["nama_barang"];
                document.getElementById("updt_price").value = data["harga_satuan"];
                document.getElementById("updt_ammount").value = data["jumlah"];
                document.getElementById("updt_tanggal").value = data["tanggal_beli"];
                document.getElementById("updt_total").value = data["total"];
            });
        }



        const fixedInput = document.querySelector('#total');
        let input1 = parseInt(document.querySelector('#price').value);
        let input2 = parseInt(document.querySelector('#ammount').value);
        fixedInput.value = 0;
        document.addEventListener("DOMContentLoaded", event => {

            document.querySelectorAll('.fieldInsertInput').forEach(item => {
                item.addEventListener('change', (event) => {
                    input1 = parseInt(document.querySelector('#price').value);
                    input2 = parseInt(document.querySelector('#ammount').value);

                    console.log("woy");
                    fixedInput.value = input1 * input2;
                    console.log(fixedInput.value);

                })
            })
        })

        const fixedInputUpdt = document.querySelector('#updt_total');
        let input3 = parseInt(document.querySelector('#updt_price').value);
        let input4 = parseInt(document.querySelector('#updt_ammount').value);
        fixedInputUpdt.value = 0;
        document.addEventListener("DOMContentLoaded", event => {

            document.querySelectorAll('.fieldUpdateInput').forEach(item => {
                item.addEventListener('change', (event) => {
                    input3 = parseInt(document.querySelector('#updt_price').value);
                    input4 = parseInt(document.querySelector('#updt_ammount').value);

                    console.log("woy");
                    fixedInputUpdt.value = input3 * input4;
                    console.log(fixedInputUpdt.value);

                })
            })
        })
    </script>
</body>

</html>