@extends('layout.admin')
@section('title', 'User List')

@section('content')
<div class="row col-md-12 mt-3 d-flex align-items-center justify-content-center ">
    <div class="text-center col-md-12">
        <h1>User List</h1>
    </div>
    <div class="col-md-12 mb-2">
        <a href="{{route('admin.user.create')}}" class="btn btn-secondary">Add Users</a>
    </div>
    <div class="card p-3">
        <div class="col-md-12" style="overflow: scroll; height: 60vh;">
            <table id="userTable" class="table card-body">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Buying Limit</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$users)
                        <tr>
                            <td colspan="7">No data found</td>
                        </tr>
                    @endif
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->buying_limit }}</td>
                            <td>{{ $item->departement->name }}</td>
                            <td>
                                <form action="{{ route('admin.user.destroy') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });
</script>
@endsection
