@extends('layouts.admin')
@section('title', 'Departement List')

@section('content')
    <div class="row col-md-12 mt-3 d-flex align-items-center justify-content-center">
        <div class="text-center col-md-12">
            <h1>
                @if (request('type') == 0)
                    Alokasi Sprei
                @elseif (request('type') == 1)
                    Sprei Tersisa
                @else
                    Alokasi Sprei
                @endif
            </h1>

        </div>
        <div class="card m-0 p-0">
            <div class="card-header col-md-12 row m-0 p-2">
                <div class="col-md-3">

                    <form action="" method="GET">

                        <label for="type" class="form-label">Check For</label>
                        <select class="form-select" aria-label="Default select example" name="type" id="nameSelect">
                            <option value="0"@if (request('type') == 0) selected @endif
                                @if (request('type') == null) selected @endif>Alokasi</option>
                            <option value="1"@if (request('type') == 1) selected @endif>Tersisa</option>
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
                            @foreach ($departements as $item)
                                <th scope="col">{{ $item->name }}</th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody style=" overflow: scroll; max-height: 60vh; max-width: 100%;">
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                @foreach ($departements as $departement)
                                    @if (request('type') == 0)
                                        @php
                                            $productDepartement = \App\Models\ProductDepartement::where(
                                                'product_id',
                                                $product->id,
                                            )
                                                ->where('departement_id', $departement->id)
                                                ->first();
                                        @endphp
                                        {{-- <td>{{$productDepartement}}</td> --}}
                                        @if ($productDepartement)
                                            <td>{{ $productDepartement->quantity }}</td>
                                        @else
                                            <td>-</td>
                                        @endif
                                    @elseif(request('type') == 1)
                                        @php
                                            $productDepartement = \App\Models\ProductDepartement::where(
                                                'product_id',
                                                $product->id,
                                            )
                                                ->where('departement_id', $departement->id)
                                                ->first();
                                            //select transaction with product_departement_id as $productDepartement->id and $user->departement_id as $departement->id
                                            $transactions = \App\Models\Transaction::where('product_departement_id', $productDepartement->id);
                                            $transactions = $transactions->whereHas('user', function ($query) use ($departement) {
                                                $query->where('departement_id', $departement->id);
                                            })->get();

                                            $count = $transactions->count();
                                        @endphp
                                        {{-- <td>{{$productDepartement}}</td> --}}
                                        @if ($productDepartement)
                                            <td>{{ $productDepartement->quantity - $count}}</td>
                                        @else
                                            <td>-</td>
                                        @endif
                                    @else
                                        @php
                                            $productDepartement = \App\Models\ProductDepartement::where(
                                                'product_id',
                                                $product->id,
                                            )
                                                ->where('departement_id', $departement->id)
                                                ->first();
                                        @endphp
                                        {{-- <td>{{$productDepartement}}</td> --}}
                                        @if ($productDepartement)
                                            <td>{{ $productDepartement->quantity }}</td>
                                        @else
                                            <td>-</td>
                                        @endif
                                    @endif
                                @endforeach
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
                        filename: 'Alokasi' // Change the filename here
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Export Excel',
                        className: 'btn btn-primary',
                        filename: 'Alokasi' // Change the filename here
                    }
                ],
            });
            $('#nameSelect').change(function() {
                window.location.href = `{{ route('admin.products') }}?type=${$(this).val()}`
            })
        });
    </script>
    </script>
    </script>

@endsection
