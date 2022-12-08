@extends('layouts.landing-tamplate')
@section('content')
    {{-- animate --}}
    <div class="lines" style="z-index: -1;">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>

      {{-- hero --}}
      @php
          $heros = App\Models\Hero::all();
      @endphp

        <section>
        <div class="header-line"></div>

    @foreach ($heros as $hero)


            <div>
                <h4 class="honc">{{ $hero->sub }}</h4>
                <h1 class="header-first">{{ $hero->header }}</h1>
            </div>

            <div> <img class="image-first-back" src="{{ $hero->media->first()->getUrl() }}" alt=""> </div>
            <div> <img class="image-first-front" src="{{ $hero->media->first()->getUrl() }}" alt=""> </div>

            <div class="paragraf-first"><p> {{ $hero->desc1 }}
            </p></div>

        <div class="hoku2"></div>

            <div class="paragraf-second"><p>{{ $hero->desc2 }}
            </p></div>

            <div class="explore">
                <a href="#book">Explore </a>
            </div>

            <div class="explore2">
                <a href="#about">About</a>
            </div>

            <div class="rectangle1"></div>
            <div class="rectangle2"></div>

    @endforeach
        </section>

        {{-- ABout --}}
        <section>

            @foreach ($abouts as $about )



            <div class="div" id="about">
                <div class="builder-columns div-2">
                  <div class="builder-column column"><div class="div-3"></div></div>
                  <div class="builder-column column-2">
                    <div class="div-4">{{ $about->sub }}</div>
                  </div>
                </div>


              </div>

              <div class="image-3">
                  <h5 class="one">{{ $about->imgtext1 }}</h5>
                <div class="image-one-back"></div>
                <div class="image-one-front"></div>

                <h5 class="two">{{ $about->imgtext2 }}</h5>
                <div class="image-two-back"></div>
                <div class="image-two-front"></div>

                <h5 class="three">{{ $about->imgtext3 }}</h5>
                <div class="image-three-back"> </div>
                <div class="image-three-front"></div>
              </div>

              <div class="container2">
                <div></div>

                <h1 class="header-c2">
                    {{ $about->header }}
                </h1>
                <p class="paragraf-c2">{{ $about->desc1 }}
                </p>


                <h1 class="header2-c2">
                    {{ $about->header2 }}
                </h1>
                <p class="paragraf2-c2">{{ $about->desc2 }}
                </p>


            </div>

            <div class="linex-c2"></div>

            <div class="explore-c2">
                <a href="https://en.wikipedia.org/wiki/Ashurbanipal" target="blank">Wikipedia </a>
            </div>

            <div> <img class="image-first-back-c2" src="{{ $about->gallery->first()->getUrl() }}" alt=""> </div>
            <div>  <img class="image-first-front-c2" src="{{ $about->gallery->first()->getUrl() }}" ></div>
    

            @endforeach
        </section>

        <section >
            <div class="div-c3" id="book">
                <div class="builder-columns-c3 div-2-c3">
                  <div class="builder-column-c3 column-c3"><div class="div-3-c3"></div></div>
                  <div class="builder-column-c3 column-2-c3">
                    <div class="div-4-c3">BOOK OF ASHURBANIPAL</div>
                  </div>
                </div>
              </div>

              <div class="div-v">
                <div class="div-2-v">BOOK OF ASHURBANIPAL</div>
                <div class="div-3-v"></div>
                <div class="ashurbanipal-was-known-as-a-te">
                  Ashurbanipal was known as a tenacious martial commander; however, he was
                  also a recognized intellectual who was literate, and a passionate collector
                  of
                </div>
              </div>

              <div class="container-4">

                @foreach($books as $book)
                <div class="card">
                    <h1 class="header-c4"><a href="{{ route('detail-books', $book->id) }}">  {{ $book->name }} </a></h1>
                    <small>By <span>{{ $book->authors }}</span></small>
                    <div class="image-c4-back"> <img src="{{ $book->gallery->first()->getUrl() }}" alt=""> </div>
                    <div class="image-c4-front"> <img src="{{ $book->gallery->first()->getUrl() }}" alt=""> </div>
                </div>
                @endforeach




              </div>

              <div class="line-c4"></div>


        </section>
@endsection




