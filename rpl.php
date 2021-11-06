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

<body>
    <div class="container mt-4 position-absolute top-50 start-50 translate-middle">
        <div class="card">
            <div class="card-header">
                Daftar Penjualan Warung xyz
            </div>
            <div class="card-body">
                <h5 class="card-title">Tes</h5>
                <div class="row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-bottom:10px;">
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
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>5</td>
                            <td>5 November 2021</td>
                            <td>100.000</td>
                            <td class="text-right">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                <button class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>5</td>
                            <td>5 November 2021</td>
                            <td>100.000</td>
                            <td>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                <button class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry the Bird</td>
                            <td>@twitter</td>
                            <td>5</td>
                            <td>5 November 2021</td>
                            <td>100.000</td>
                            <td>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                <button class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data transaksi Warung xyz</h5>
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
            </div>
        </div>
    </div>
</body>

</html>