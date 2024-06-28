@extends('layout.admin')
@section('title', 'User List')

@section('content')
    <div class="row col-md-12 mt-3 d-flex align-items-center justify-content-center ">
        <div class="text-center col-md-12">
            <h1>Add Users</h1>
        </div>
        <div class="col-md-12 mb-2">
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="col-md-12">
            <p>Format : name,email,dateofbirth,class</p>
            <p>Pastikan Class sudah ada di daftar class yang tersedia, jika tidak, maka data gagal masuk.</p>
            <p>Default Password: classTANGGALLAHIR | ppti152000-10-28</p>
        </div>
        <div class="col-md-12">
            <form action="{{ route('admin.user.create') }}" method="POST">
                @csrf
                <textarea name="data" id="" cols="120" rows="10"
                    placeholder="Jeff,Jeff@gmail.com,2000-10-28,ppti15
Jay,Jay@gmail.com,2000-10-28,ppti15"></textarea>
                <br>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection

@section('script')

@endsection
