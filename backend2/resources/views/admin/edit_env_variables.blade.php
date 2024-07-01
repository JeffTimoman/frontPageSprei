@extends('layouts.admin')
@section('title', 'Departement List')

@section('content')
    <div class="row col-md-12 mt-3 d-flex align-items-center justify-content-center">
        <div class="text-center col-md-12">
            <h1>Website Environment Variables</h1>
        </div>

        <form action="" method="POST">
            <div class="card m-0 p-0">
                <div class="card-header col-md-12 row m-0 p-2">
                    <div class="col-md-12 mt-1">

                        <button type="submit" class="btn btn-primary" style="width: 100%">Save</button>
                    </div>
                </div>
                <div class="card-body" style="height: 60vh; overflow-y: scroll;">
                    @csrf
                    @php
                        $canLogin = \App\Models\WebVariable::where('name', 'AllowLogin')->first();
                        $timeLimit = \App\Models\WebVariable::where('name', 'BlockClaimTime')->first();
                    @endphp
                    <div class="col-md-12" style="width: 100%;">
                        <label for="AllowLogin" class="form-label">Allow Login?</label>
                        <select class="form-select" name="AllowLogin" id="AllowLogin">
                            <option value="1" {{ $canLogin->value == 1 ? 'selected' : '' }}>Allow</option>
                            <option value="0" {{ $canLogin->value == 0 ? 'selected' : '' }}>Block</option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="BlockClaimTime" class="form-label">Block Claim In : </label>
                        <input type="datetime-global" class="form-control" name="BlockClaimTime" id="BlockClaimTime"
                            value="{{ $timeLimit->value }}">

                    </div>
                    <div class="col-md-12 mt-3">
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')

@endsection
