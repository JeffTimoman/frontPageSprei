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

@section('content')
    <div class="topbar d-flex justify-content-around align-items-center col-md-12 p-0 m-0" style="background: #2f27ce; position:sticky; top:0 ;">
        <a href="{{route('user.index')}}" class="text-white text-center py-3 col-md-1">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h3 class="text-light py-3 col-md-10 text-center" style="">Home</h3>
        <a href="#" class="text-white text-center py-3 col-md-1">
            {{-- <i class="fas fa-search"></i> --}}
        </a>
    </div>

    <div class="mt-3" style="">
        <div class="container">
            <div class="card p-2 d-flex align-items-center justify-content-center" style=";">
                <div class="card-title">
                    <h2>Color : {{$productDepartement->product->name}}</h2>
                </div>
                <div class="card-image">
                    <img src="{{ asset('images/' . $productDepartement->product->image)}}"
                                class="card-img-top" style="max-width: 200px;" alt="...">
                </div>
                <div class="card-body">
                    <p>Class : {{$productDepartement->departement->name}} | Stock : {{ $productDepartement->quantity }} -  Claims : {{ $productDepartement->transactions->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    @include('components.alert')

    <div class="col-md-12 mt-1">
        <div class="container">
            <h3 class="p-2" style="border-bottom: solid #433bff 1px;">Claimed By </small>
            </h3>
        </div>
    </div>

    <div class="col-md-12">
        <div class="container" style="height: 55vh; overflow-y:scroll; position: relative;">
            <div class="mb-4">
                <ul class="list-group list-group-flush">
                    @foreach ($productDepartement->transactions as $item)
                        <li class="list-group-item d-flex align-items-center justify-content-around"><span>{{$item->user->name}}</span> </li>
                    @endforeach
                    @if ($productDepartement->transactions->count() == 0)
                        <li class="list-group-item d-flex align-items-center justify-content-around">No Claims Yet.</li>

                    @endif
                  </ul>
            </div>
        </div>
    </div>

    <div class="col-md-12 mb-5">
    </div>

@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const endTimeString = document.getElementById('time').getAttribute('data-end-time');
        const endTime = new Date(endTimeString).getTime();

        const timerInterval = setInterval(() => {
            const now = new Date().getTime();
            const distance = endTime - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('time').innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;

            if (distance < 0) {
                clearInterval(timerInterval);
                document.getElementById('time').innerHTML = "EXPIRED";
            }
        }, 1000);
    });
</script>

@endsection
