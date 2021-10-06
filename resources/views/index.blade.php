@extends('layout.app', ["current" => "home"])

@section('head')

    
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet" /> 
    
    <script src="{{ asset('js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/carousel.js') }}" type="text/javascript"></script>


@endsection

@section('body')

<div class="bg-light border border-secondary">

   <div id="carousel"> <!-- begin carousel -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
      </ol>
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="{{ asset('imagens/carousel_blue.png') }}" alt="Awesome Image">
        </div>
        <div class="item">
          <img src="{{ asset('imagens/carousel_green.png') }}" alt="Awesome Image">
        </div>
        <div class="item">
          <img src="{{ asset('imagens/carousel_red.png') }}" alt="Awesome Image">
        </div>
                <div class="item">
          <img src="{{ asset('imagens/carousel_orange.png') }}" alt="Awesome Image">
        </div>
      </div>
    
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="fa fa-angle-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="fa fa-angle-right"></span>
      </a>
    </div>
</div> <!-- end carousel -->

</div>

@endsection