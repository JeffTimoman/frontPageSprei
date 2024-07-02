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
    <div class="topbar  d-flex justify-content-around align-items-center col-md-12" style="background: #2f27ce; width: 100%;">
        <a href="#" class="text-white text-center p-3 col-md-1">
            {{-- <i class="fa-solid fa-house"></i> --}}
        </a>
        <h3 class="text-light p-3 col-md-10 text-center" style="">Home</h3>
        <a href="#" class="text-white text-center p-3 col-md-1">
            {{-- <i class="fas fa-search"></i> --}}
        </a>
    </div>
@endsection

@section('content')
    <div class="col-md-12 mt-4" style="position:sticky;">
        <div class="container row-md-12 d-flex align-items-center justify-content-center ">
            <div class="col-md-12">
                <div class="card p-2" style="background: #433bff;">
                    <h2 class="text-center" style="color: white; ">Time Left</h2>
                    <div class="card-body">
                        @php
                            $time = \App\Models\WebVariable::where('name', 'BlockClaimTime')->first();
                        @endphp

                        <h1 class="text-center " id="time" style="font-size: 1.8rem; color: #dedcff;"
                            data-end-time="{{ $time->value }}">
                            <div class="placeholder-glow">
                                <span class="placeholder" style="width: 150px;">
                                </span>
                            </div>
                        </h1>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12 mt-1" id="hiStickyAfterScroll">
        <div class="container">
            <h3 class="p-2" style="border-bottom: solid #433bff 1px;">Hi, {{ explode(' ', auth()->user()->name)[0] }} ! |
                <small>Claim Limit : {{ auth()->user()->buying_limit }}</small>
            </h3>
        </div>
    </div>
    <div class="container mb-3">
        <div class="col-md-12 pb-5 container " style="height: 75vh; overflow-y: scroll;">
            @php
                $counter = 0;
                $check2 = 1;
                foreach ($productDepartements as $item) {
                    $transactions = $item->transactions->where('product_departement_id', $item->id)->count();
                    // dump($transactions);
                    if($transactions < $item->quantity){
                        $counter++;
                    }
                    if ($counter > 1){
                        $check2 = 0;
                        break;
                    }
                }

            @endphp
            <form action="{{ route('user.claim') }}" method="POST" id="toHideAfter1">
                @csrf
                <div class="card mt-2 loading-placeholder">
                    <div class="placeholder-glow">
                        <img class="card-img-top placeholder" style="wdith: 200px; height: 200px;"alt="">
                        <div class="card-body">
                            <h5 class="card-title placeholder col-6"></h5>
                            <p class="card-text placeholder col-8"></p>
                            <input type="hidden" value="" name="id">
                            <button type="button" class="btn btn-secondary btn-claim placeholder col-6" disabled></button>
                        </div>
                    </div>
                </div>
            </form>
            @if ($check2 == 1 && auth()->user()->buying_limit > 0)
                @foreach ($productDepartements as $item)
                    <form action="{{ route('user.claim') }}" method="POST" id="claimNo{{ $item->id }}">
                        @csrf
                        <div class="card mt-2" style="width: 100%;">
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="{{ asset('images/' . $item->product->image) }}" class="card-img-top"
                                    style="max-width: 200px; background" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Color : {{ $item->product->name }}</h5>
                                <p class="card-text">Stock : {{ $item->quantity - $item->transactions->count() }}
                                    | <a href="{{ route('product_departement.detail', ['id' => $item->id]) }}">Detail</a>
                                </p>
                                <input type="hidden" value="{{ $item->id }}" name="id">

                                @if ($item->quantity <= $item->transactions->count())
                                    <button type="button" class="btn btn-secondary btn-claim" disabled>Out of
                                        Stock</button>
                                @else
                                    <button type="button" class="btn btn-primary btn-claim" data-bs-toggle="modal"
                                        data-bs-target="#confirmClaim">Claim</button>
                                @endif
                            </div>
                        </div>
                    </form>
                @endforeach
            @else
                @foreach ($productDepartements as $item)
                    <form action="{{ route('user.claim') }}" method="POST" id="claimNo{{ $item->id }}">
                        @csrf
                        <div class="card mt-2 " style="width: 100%;">
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="{{ asset('images/' . $item->product->image) }}" class="card-img-top"
                                    style="max-width: 200px; background" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Color : {{ $item->product->name }}</h5>
                                <p class="card-text">Stock : {{ $item->quantity - $item->transactions->count() }}
                                    | <a href="{{ route('product_departement.detail', ['id' => $item->id]) }}">Detail</a>
                                </p>
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                @php
                                    $check = $item->transactions->where('user_id', Auth::user()->id)->count();

                                @endphp


                                @if ($check > 0)
                                    <button type="button" class="btn btn-primary btn-claim" disabled>Claimed</button>
                                @else
                                    @if ($item->quantity <= $item->transactions->count())
                                        <button type="button" class="btn btn-secondary btn-claim" disabled>Out of
                                            Stock</button>
                                    @else
                                        <button type="button" class="btn btn-primary btn-claim" data-bs-toggle="modal"
                                            data-bs-target="#confirmClaim">Claim</button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </form>
                @endforeach
            @endif

        </div>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="confirmClaim" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="confirmClaimLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="confirmClaimLabel">Are you sure to claim this?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card mt-2 " style="width: 100%;">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="" class="card-img-top" style="max-width: 200px; background"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">
                            </p>
                        </div>
                    </div>
                    <div class="alert alert-warning mt-3" role="alert">
                        Apabila anda menekan claim, maka anda <strong class="text-danger">TIDAK DAPAT MENGGANTI</strong>
                        atau <strong class="text-danger">MEMBATALKANNYA</strong>.
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('user.claim') }}" method="POST">
                        <input type="hidden" name="id" value="" id="finalId">
                        @csrf
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="finalConfirm">Claim</button>
                    </form>
                </div>
            </div>
        </div>
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

        $('document').ready(function() {
            $('.btn-claim').click(function() {
                const form = $(this).closest('form');
                const img = form.find('img').attr('src');
                const title = form.find('.card-title').text();
                const text = form.find('.card-text').text();
                $('#confirmClaim').find('img').attr('src', img);
                $('#confirmClaim').find('.card-title').text(title);
                $('#confirmClaim').find('.card-text').text(text);
                $('#finalId').val(form.find('input[name="id"]').val());
            });
        });
    </script>
    <script>
        //detect any scroll down on the page on scroll then add class .sticky to the header
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('.topbar').addClass('sticky');
            } else {
                $('.topbar').removeClass('sticky');
            }
        });

        setTimeout(function() {
            $('#toHideAfter1').hide();
            $('.loading-placeholder').hide();
        }, 500);
    </script>

@endsection
