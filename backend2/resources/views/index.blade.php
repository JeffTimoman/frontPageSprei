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
    <div class="topbar d-flex justify-content-around align-items-center col-md-12" style="background: #2f27ce;">
        <a href="#" class="text-white text-center p-3 col-md-1">
            {{-- <i class="fa-solid fa-house"></i> --}}
        </a>
        <h3 class="text-light p-3 col-md-10 text-center" style="">Home</h3>
        <a href="#" class="text-white text-center p-3 col-md-1">
            {{-- <i class="fas fa-search"></i> --}}
        </a>
    </div>

    <div class="col-md-12 mt-3" style="">
        <div class="container">
            <div class="card p-2" style="background: #433bff;">
                <h2 class="text-center" style="color: white; ">Time Left</h2>
                <div class="card-body">
                    @php
                        $time = \App\Models\WebVariable::where('name', 'BlockClaimTime')->first();
                    @endphp
                    <h1 class="text-center" id="time" style="font-size: 50px; color: #dedcff;" data-end-time="{{$time->value}}"></h1>
                </div>
            </div>
        </div>
    </div>

    @include('components.alert')

    <div class="col-md-12 mt-1">
        <div class="container">
            <h3 class="p-2" style="border-bottom: solid #433bff 1px;">Sprei | <small>{{ $departement->name }}</small> | <small>Claim Limit : {{ auth()->user()->buying_limit }}</small>
            </h3>
        </div>
    </div>

    <div class="col-md-12">
        <div class="container" style="height: 60vh; overflow-y:scroll;">
            @foreach ($productDepartements as $item)
                <form action="{{ route('user.claim') }}" method="POST">
                    @csrf
                    <div class="card mt-2" style="width: 100%;">
                        <img src="https://imgv3.fotor.com/images/side/3D-pink-hair-girl-image-with-generate-box.jpg"
                            class="card-img-top" style="max-width: 200px; background" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Color : {{ $item->product->name }}</h5>
                            <p class="card-text">Stock : {{ $item->quantity }} | Claims : {{ $item->transactions->count() }}
                            </p>
                            <input type="hidden" value="{{ $item->id }}" name="id">
                            @php
                                $check = $item->transactions->where('user_id', Auth::user()->id)->count();
                            @endphp
                            @if ($check > 0)
                                <button type="button" class="btn btn-primary btn-claim" disabled>Claimed</button>
                            @else
                                @if ($item->quantity <= $item->transactions->count())
                                    <button type="button" class="btn btn-primary btn-claim" disabled>Out of Stock</button>

                                @endif
                                <button type="submit" class="btn btn-primary btn-claim">Claim</button>
                            @endif
                        </div>
                    </div>
                </form>
            @endforeach
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
