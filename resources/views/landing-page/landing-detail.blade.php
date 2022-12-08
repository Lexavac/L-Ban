@extends('layouts.landing2-tamplate')
@section('detail')



<div class="container-detail">
    <div > <img class="image-5-back" src="{{ $book->gallery->first()->getUrl() }}" > </div>
    <div > <img class="image-5-front" src="{{ $book->gallery->first()->getUrl() }}" ></div>

    <h1 class="header-5">{{ $book->name }}</h1>
    <div class="line-5"></div>
    <p class="sub-header-5">by <span> {{ $book->authors }} </span></p>
    <p class="paragraf-details">{{ $book->desc }}
    </p>

    <div class="explore-d">
        <form class="show_alert"  action="{{ route('rent-store', $book->id) }}" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <button type="submit" {{ $checks  ? 'disabled' : '' }} > Rent Book </button>
        </form>
    </div>
</div>

<div class="div-x">
    <div class="div-2-x">RELATED BOOK</div>
    <div class="div-3-x"></div>
    <div class="ashurbanipal-was-known-as-a-te-x">
      Ashurbanipal was known as a tenacious martial commander; however, he was
      also a recognized intellectual who was literate, and a passionate collector
      of
    </div>
  </div>

<div class="container-x">

    @foreach($related_books as $related_book)
    <div class="card-x">
        <h1 class="header-c4"><a href=""> {{ $related_book->name }} </a></h1>
        <small>By <span>{{ $related_book->authors }}</span></small>
        <div class="image-c4-back"> <img src="{{ $related_book->gallery->first()->getUrl() }}" alt=""> </div>
        <div class="image-c4-front"> <img src="{{ $related_book->gallery->first()->getUrl() }}" alt=""> </div>
    </div>
    @endforeach

  </div>





@endsection


