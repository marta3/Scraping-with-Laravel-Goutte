@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/favicon-new.ico">
    <link rel="stylesheet" href="css/app-2a939a91b4.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- TrustBox script -->
<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
<!-- End Trustbox script -->
    <title>Wishlist Dishwashers For Sale Ireland</title>
<meta name='description' content="Check Our Range Of Cheap Dishwashers For Sale In Ireland. We Can Install Your New Dishwashers &amp; Remove Your Old One. Choose Your Delivery Day At Checkout.">

@if($contents)
	@foreach($contents as $content)	

        <div class="search-results-product row">
            <div class="product-image col-xs-4 col-sm-4">
                <a href="{{$content['url_prod']}}">
                    <img class="img-responsive" src="{{$content['url_img_prod']}}">
                </a>
            </div>
            <div class="product-description col-xs-8 col-sm-8">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-lg-8">
                        <a href="{{$content['url_prod']}}">
                            <img class="article-brand" src="{{$content['title']}}" />
                        </a>
                        
                        <h4><a href="{{$content['url_prod']}}">{{$content['product']}}</a></h4>
                        <ul class="result-list-item-desc-list hidden-xs">
        					<li>{{$content['list']}}</li>
                        </ul>
                    </div>

                    <div class="col-xs-12 col-sm-5 col-lg-4">
                        <div class="col-xs-12">
                            <h3 class="section-title">{{$content['prices']}}</h3> 
                        </div>

                        <div class="col-xs-12">
                            @if($user = Auth::user())
                                    <input type="hidden" name="_token" value="JoQKK1rzXdGoWwsvepEfRX8g3v6FZLiY1PehQ8YN">
                                    <a href="wishlist/add/{{$content['product']}}/{{$content['prices']}}"><button type="submit" class="btn btn-block buy-now-btn">Buy Now </button></a>
                                
                                
                                <a href="{{$content['url_prod']}}" class="item-info-link">Learn More</a>                  
                            
                            <div class="clearfix"></div>
                            @else
                                <a href="{{ route('login') }}">Log in for add to the WishList</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
	
	@endforeach
@endif	
</html>
@endsection