@extends('layouts.admin')
@section('title', 'Departement List')

@section('content')
    <div class="row col-md-12 mt-3 d-flex align-items-center justify-content-center">
        <div class="text-center col-md-12">
            <h1>Data Sprei User</h1>
        </div>

        <div class="card m-0 p-0">
            <div class="card-header col-md-12 row m-0 p-2">
                <div class="col-md-3">
                    @php
                        $products = \App\Models\Product::orderBy('name')->get();
                    @endphp
                    <form action="" method="GET">

                        <label for="departement" class="form-label">Color</label>
                        <select class="form-select" aria-label="Default select example" name="name" id="nameSelect">
                            @foreach ($products as $item)
                                <option value="{{ $item->name }}" @if ($item->name == request('name')) selected @endif>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                </form>
            </div>
            <div class="card-body">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Class</th>
                        </tr>
                    </thead>

                    <tbody style=" overflow: scroll; max-height: 60vh; max-width: 100%;">
                        @foreach ($transactions as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->departement->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Include Bootstrap 5.3 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.bootstrap5.min.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap 5.3 JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- Include DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "dom": 'Bfrtip', // Add this line to enable buttons
                "buttons": [{
                        extend: 'csvHtml5',
                        text: 'Export CSV',
                        className: 'btn btn-success',
                        filename: '{{ $name }}' // Change the filename here
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Export Excel',
                        className: 'btn btn-primary',
                        filename: '{{ $name }}' // Change the filename here
                    }
                ],
            });
            $('#nameSelect').change(function() {
                window.location.href = `{{ route('admin.index2') }}?name=${$(this).val()}`
            })
        });
    </script>
    </script>
    </script>

@endsection
