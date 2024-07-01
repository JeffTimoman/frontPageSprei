@extends('layouts.app')
@section('title', 'Home')

@section('style')
    <style>
        .topbar {
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .btn-claim {
            width: 100%;
            background: #dedcff;
            border-color: #dedcff;
            color: #433bff;
        }

        .btn-claim:hover {
            background: #433bff;
            color: #dedcff;
        }
    </style>
@endsection
@section('topbar')
    <div class="topbar d-flex justify-content-around align-items-center col-md-12 p-0 m-0"
        style="background: #2f27ce; position:sticky; top:0 ;">
        <a href="#" class="text-white text-center py-3 col-md-1">
            {{-- <i class="fa-solid fa-arrow-left"></i> --}}
        </a>
        <h3 class="text-light py-3 col-md-10 text-center" style="">Class</h3>
        <a href="#" class="text-white text-center py-3 col-md-1">
            {{-- <i class="fas fa-search"></i> --}}
        </a>
    </div>
@endsection
@section('content')


    <div class="mt-3" style="">
        <div class="container">
            <div class="card p-2 d-flex align-items-center justify-content-center" style=";">
                <div class="card-title d-flex align-items-center justify-content-center">
                    <h2 class="m-0">Class : {{ $departement->name }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('components.alert') --}}

    <div class="col-md-12 mt-1">
        <div class="container">
        <h3 class="p-2" style="border-bottom: solid #433bff 1px;">Members</small>
            </h3>
        </div>
    </div>

    <div class="col-md-12 pb-4" style="height: 80vh; overflow-y:scroll; position: relative;">
        <div class="container">
            <div class="">
                <ul class="list-group list-group-flush">
                    @php
                        $sorted_users = $departement->users->sortBy('name');
                    @endphp
                    @foreach ($sorted_users as $item)
                        <li class="list-group-item d-flex align-items-center justify-content-around">
                            <span>{{ $item->name }}</span></li>
                    @endforeach
                    @if ($departement->users->count() == 0)
                        <li class="list-group-item d-flex align-items-center justify-content-around">No Member Yet.</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-12 mb-5">
    </div>

@endsection

@section('script')
    <script></script>

@endsection
