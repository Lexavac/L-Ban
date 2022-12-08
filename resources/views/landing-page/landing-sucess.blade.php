@extends('layouts.landing3-tamplate')
@section('success')


<div class="div-v">
    <div class="div-2-v">SUCCESS RENT BOOK</div>
    <div class="div-3-v"></div>
    <div class="ashurbanipal-was-known-as-a-te">
     If u want to rent book again please click the button !
    </div>
  </div>

  <div class="container-4">


    <div class="card">
        <h1 class="header-c4"> {{ $book->name }} </a></h1>
        <small>By <span>{{ $book->authors }}</span></small>
        <div class="image-c4-back"> <img src="{{ $book->gallery->first()->getUrl() }}" alt=""> </div>
        <div class="image-c4-front"> <img src="{{ $book->gallery->first()->getUrl() }}" alt=""> </div>

        <div class="explore-d">
                <a href="/"> Back </a>
        </div>
    </div>





  </div>


@endsection
