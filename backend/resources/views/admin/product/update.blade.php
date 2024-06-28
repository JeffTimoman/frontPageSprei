@extends('layout.admin')
@section('title', 'Add Product')

@section('content')
    <div class="row col-md-8 mt-3 d-flex align-items-center justify-content-center ">
        <div class="text-center col-md-12">
            <h1>Add Product</h1>
        </div>
        <form action="">
            <div class="card p-3">
                <div class="col-md-12 row" style="">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="color" class="form-label">Color</label>
                        <input type="color" name="color" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="color" class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" min=0 value="0">
                    </div>
                    <div class="col-md-12">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" accept=".png, .jpg" class="form-control">
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('script')
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <!-- Initialize DataTables -->
@endsection
