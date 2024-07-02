@extends('layouts.admin')
@section('title', 'Data Sprei')

@section('content')
    {{-- <div class="row col-md-12 mt-3 d-flex align-items-center justify-content-center" > --}}
        <div class="text-center col-md-12">
            <h1>Data Sprei User</h1>
        </div>

        <div class="card m-0 p-0">
            <div class="card-header col-md-12 row m-0 p-2">
                <div class="col-md-3">
                    @php
                        $departements = \App\Models\Departement::all();
                    @endphp
                    <form action="" method="GET">

                        <label for="departement" class="form-label">Class</label>
                        <select class="form-select" aria-label="Default select example" name="departement" id="departementSelect">
                            @if (request()->has('departement'))
                                <option value="">All</option>
                                @foreach ($departements as $item)
                                    @if ($item->id == request()->departement)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            @else
                                <option value="" selected>All</option>
                                @foreach ($departements as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            @endif

                        </select>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                </form>
            </div>
            <div class="card-body" style="">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Class</th>
                            <th scope="col">Color 1</th>
                            <th scope="col">Color 2</th>
                        </tr>
                    </thead>

                    <tbody style=" overflow: scroll; max-height: 60vh;">
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->departement->name }}</td>
                                @if ($item->transactions->count() == 0)
                                    <td>-</td>
                                    <td>-</td>
                                @elseif ($item->transactions->count() == 1)
                                    <td>{{ $item->transactions[0]->productDepartement->product->name }}</td>
                                    <td>-</td>
                                @else
                                    <td>{{ $item->transactions[0]->productDepartement->product->name }}</td>
                                    <td>{{ $item->transactions[1]->productDepartement->product->name }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    {{-- </div> --}}
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
                        filename: 'DataSprei' // Change the filename here
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Export Excel',
                        className: 'btn btn-primary',
                        filename: 'DataSprei' // Change the filename here
                    }
                ],
            });
            $('#departementSelect').change(function() {
                window.location.href = `{{ route('admin.index') }}?departement=${$(this).val()}`
            })
        });
    </script>
    </script>
    </script>

@endsection
