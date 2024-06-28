@extends('layout.admin')
@section('title', 'Departement List')

@section('content')
    <div class="row col-md-12 mt-3 d-flex align-items-center justify-content-center ">
        <div class="text-center col-md-12">
            <h1>Departement List</h1>
        </div>
        <div class="col-md-12 mb-2">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addDepartement">
                Add Departement
              </button>
            {{-- <a href="#" class="btn btn-secondary">Add Users</a> --}}
        </div>
        <div class="card p-3">
            <div class="col-md-12" style="overflow: scroll; height: 60vh;">
                <table id="departementTable" class="table card-body">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Member</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$departements)
                            <tr>
                                <td colspan="4">No data found</td>
                            </tr>
                        @endif
                        @foreach ($departements as $item)
                            <tr>
                                <td>{{ $item->id}}</td>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->users->count()}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#editDepartement">
                                        Edit
                                      </button>
                                      <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Button trigger modal -->
<form action="{{route('admin.departement.store')}}" method="POST">
      @csrf
      <div class="modal fade" id="addDepartement" tabindex="-1" aria-labelledby="addDepartementLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addDepartementLabel">Add Departement</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <input type="hidden">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </div>
        </div>
      </div>
</form>

<form action="{{route('admin.departement.update')}}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="editDepartement" tabindex="-1" aria-labelledby="editDepartement" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editDepartement">Edit Departement</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
</form>
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
            $('#departementTable').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.edit-btn').click(function() {
                var id = $(this).closest('tr').find('td:eq(0)').text();
                var name = $(this).closest('tr').find('td:eq(1)').text();
                $('input[name="id"]').val(id);
                $('input[name="name"]').val(name);
            });
        });
    </script>
@endsection
