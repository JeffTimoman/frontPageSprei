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
    <div class="topbar d-flex justify-content-around align-items-center col-md-12"
        style="background: #2f27ce; position: sticky; top: 0;">
        <a href="#" class="text-white text-center p-3 col-md-1">
            {{-- <i class="fa-solid fa-house"></i> --}}
        </a>
        <h3 class="text-light p-3 col-md-10 text-center" style="">Sprei List</h3>
        <a href="#" class="text-white text-center p-3 col-md-1">
            {{-- <i class="fas fa-search"></i> --}}
        </a>
    </div>
@endsection

@section('content')

<div class="mt-3" style="">
    <div class="container">
        <div class="card p-2 d-flex align-items-center justify-content-center" style=";">
                <div class="card-title text-center">
                    <h2 class="m-0">Hi! {{auth()->user()->name}}</h2>
                    <h5 class="m-0">Class: <small>{{ auth()->user()->departement->name}}</small></h5>
                </div>
            </div>
        </div>
    </div>
    @include('components.alert')

    <div class="col-md-12 mt-1">
        <div class="container">
            <h3 class="p-2" style="border-bottom: solid #433bff 1px;">Sprei </small>
            </h3>
        </div>
    </div>
    <div class="container pb-2">
        <div class="col-md-12 pb-5 d-flex align-items-center justify-content-center row mb-3" style="height: 75vh; overflow-y:scroll; position: relative;">
            @if($transactions->count() == 0)
                @foreach ($transactions as $item)
                    <div class="card mt-2 d-flex align-items-center" style="width: 100%;">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{asset('images/'.$item->productDepartement->product->image)}}"
                                class="card-img-top" style="max-width: 200px; background" alt="...">
                        </div>

                        <div class="card-body text-center row">
                            <h5 class="card-title">Color : {{ $item->productDepartement->product->name }} </h5>
                            <small>{{ $item->created_at }}</small>
                        </div>
                    </div>
                @endforeach
            @else
                  {{-- tell no claims yet --}}
                  <p class="text-center">No claims yet!</p>
            @endif
        </div>
    </div>


@endsection

@section('script')

@endsection
