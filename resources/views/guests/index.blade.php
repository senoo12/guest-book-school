<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BUKU TAMU -- SMKN 17 JAKARTA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <div class="mb-4">
                        <img src="{{ URL('images/logo.png') }}" alt="" width="120px">
                    </div>
                    <h4>BUKU TAMU SMKN 17 JAKARTA </h4>
                    <p>Tahun Ajaran 2022/2023</p>
                </center>
                <div class="card border-0 mt-5">
                    <div class="card-body">
                        <form action="{{ route('guests.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group mb-4">
                                <label class="font-weight-bold mb-2">Nama</label>
                                <input type="text" name="nama" id="" class="form-control">
                            </div>

                            <div class="form-group mb-4">
                                <label class="font-weight-bold mb-2">Kategori</label>
                                <select class="form-select" aria-label="Default select example" name="kategori">
                                    <option value="guru" name="kategori">Guru</option>
                                    <option value="siswa" name="kategori">Siswa</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="font-weight-bold mb-2">Pihak Dituju</label>
                                <input type="text" name="pihak_dituju" id="" class="form-control">
                            </div>
                            <div class="form-group mb-4">
                                <label class="font-weight-bold mb-2">Keperluan</label>
                                <input type="text" name="keperluan" id="" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>

</html>