@if (session('error'))
    <div class="col mt-1 d-flex justify-content-center align-items-center">
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 90%;">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@if (session('success'))
    <div class="col mt-1 d-flex justify-content-center align-items-center">
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 90%;">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
