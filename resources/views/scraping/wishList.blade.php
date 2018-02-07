@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="css/app-2a939a91b4.css">
<link rel="stylesheet" href="css/style.css">
</head>
<div class="cart-items">
    <div class="container">
        <h1 class="wish">My Wish List</h1>
        
    @forelse($wishList as $list)
        @if($list->user_id == Auth::user()->id)
            <div class="Popular-Restaurants-content">
                <div class="Popular-Restaurants-grids">
                    <div class="container">
                        <div class="box">
                        
                            <div class="col-md-5 restaurent-title">
                                <div class="logo-title">
                                    <h4>{{ $list->product_name }}</h4>
                                </div>
                            </div>
                            <div class="col-md-3 restaurent-title">
                                <div class="logo-title">
                                    <h4>{{ $list->price }}</h4>
                                </div>
                            </div>
                            <div class="col-md-3 restaurent-title">
                            <a href="wishlist/delete/{{$list->id}}"><button type="submit" class="btn btn-block buy-now-btn">Remove </button></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                    </div>
                </div>
            </div>
    @endif
    @empty
     <div class="alert alert-danger">
     {{ __("No items in your list") }}
     </div>
    @endforelse
    </div>
</div>
@endsection