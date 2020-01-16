@extends('site.app')
@section('title')
@section('content')

<section class="section-content bg padding-y">

    <div class="container-fluid"style="padding-top: 50px;">
       <div class="row">
            <div class="col-md-10">
                     <div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="https://www.dg-annonces.com"><img src="{{ 'frontend/images/ocean.jpg'}}" class="d-block w-100" alt="iles" width="100%" height="400"></a>
        <div class="carousel-caption d-none d-md-block">
          <h1><a href="https://www.dg-annonces.com"> Vas-sy découvrir dg-annonces </a></h1>
          <p>Participer .</p>
        </div>
      </div>
      <div class="carousel-item">
         <img src="{{ 'frontend/images/maison.jpg'}}" class="d-block w-100" alt="ocean" width="100%" height="400">
        <div class="carousel-caption d-none d-md-block">
           <h1>COMORES LIBRE, PUBLIER UNE ANNONCE</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
         <img src="{{ 'frontend/images/iles.jpg'}}" class="d-block w-100" alt="cocotier" width="100%" height="400">
        <div class="carousel-caption d-none d-md-block">
           <h1><a href="/articles/posts/create"> COMORES LIBRE, PUBLIER UN ARTICLE </a></h1>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
        <div id="code_prod_complex" style="padding-top: 20px;">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-4">
                        <figure class="card card-product">
                            @if ($product->images->count() > 0)
                                <div class="img-wrap padding-y"><img src="{{ asset('storage/'.$product->images->first()->full) }}" alt=""></div>
                            @else
                                <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
                            @endif
                            <figcaption class="info-wrap">
                                <h4 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                <p>{{ str_limit($product->description, 50) }}</p>
                            </figcaption>
                            <div class="bottom-wrap">
                                <a href="{{ route('product.show', $product->slug) }}" class="btn btn-sm btn-success float-right">View Details</a>
                                @if ($product->sale_price != 0)
                                    <div class="price-wrap h5">
                                        <span class="price"> {{ config('settings.currency_symbol').$product->sale_price }} </span>
                                        <del class="price-old"> {{ config('settings.currency_symbol').$product->price }}</del>
                                    </div>
                                @else
                                    <div class="price-wrap h5">
                                        <span class="price"> {{ config('settings.currency_symbol').$product->price }} </span>
                                    </div>
                                @endif
                            </div>
                             <div class="rating-wrap">
                             <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                              </li>
                              <li>
                                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                             </li>
                                                      </ul>
                             <div class="label-rating">132 reviews</div>
                             <div class="label-rating">154 commandes en orders </div>
                            </div>
                        </figure>
                    </div>
                @empty
                    <p>No Products found in .</p>
                @endforelse
            </div>
        </div>
            </div>
            <div class="col-md-2">
               <h1>Titre 1</h1>
               <p>10 Trending 2019 Website Color Schemes
Published on JANUARY 10, 2019

There’s a lot to take into consideration when you’re designing a website: there’s the layout, the architecture, the CTAs, picking your domain name, setting up a host, configuring the backend, picking a theme, perfecting the wording of your 





r audience, you</p>
               <h2>Titre 2</h2>
               <p>10 Trending 2019 Website Color Schemes
Published on JANUARY 10, 2019

There’s a lot to take into consideration when you’re designing a website: there’s the layout, the architecture, the CTAs, 
               <h3>Titre 3</h3>
               <p></p>
            </div>
       </div>
         
    </div>
  
</section>
@stop

