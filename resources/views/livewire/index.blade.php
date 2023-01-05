    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <a href="../guests/" class="btn btn-primary mb-4" target="_blank">Tambah Data</a>
    <table class="table table-striped display responsive nowrap" id="example">
        <thead>
            <tr class="bg-gray-100">
                <th>No.</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Pihak Dituju</th>
                <th>Keperluan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guests as $guest)
            <tr>
                <td>{{ $guest->id }}</td>
                <td>{{ $guest->created_at }}</td>
                <td>{{ $guest->nama}}</td>
                <td>{{ $guest->kategori}}</td>
                <td>{{ $guest->pihak_dituju}}</td>
                <td>{{ $guest->keperluan}}</td>
                <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('guests.destroy', $guest->id) }}" method="POST">
                        <a href="{{ route('guests.edit', $guest->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Pihak Dituju</th>
                <th>Keperluan</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copy',
                    },
                    {
                        extend: 'csv',
                        title: 'Data Tamu',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        },
                        autoFilter: true
                    },
                    {
                        extend: 'excel',
                        title: 'Data Tamu',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        },
                        autoFilter: true
                    },
                    {
                        extend: 'pdf',
                        title: 'Data Tamu',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Data Tamu',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                ]
            });
        });
    </script>