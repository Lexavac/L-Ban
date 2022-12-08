<section>
    {{-- navbar --}}
    <nav>

    <h1 class="ash "> Ash. </h1>

    <div class="container">
            <ul>
                <li>
                    <a href="/land" class="li">Home</a>
                </li>
                <li>
                    <a href="#about" class="li" >About</a>
                </li>
                <li>
                    <a href="#book" class="li" >Shop</a>
                </li>
                <li>
                    <a href="" class="li" >Contact Us</a>
                </li>
            </ul>
        </div>

        <div class="line-nav"></div>

        @guest
        <div class="sign-b">
            <a href="/login">Sign In</a>
        </div>
        @else

        <div class="cons">
            <div class="sign">
                <a href="">{{ auth()->user()->name }}</a>
            </div>

            <div class="sign2">
                <a href="/land" onclick="event.preventDefault();document.querySelector('#logout-form').submit()">LOG OUT</a>
                <form action="{{ route('logout') }}" id="logout-form" method="POST">
                    @csrf
                </form>
            </div>
            @endguest

        </div>

    </nav>

    {{-- end Navbar --}}


</section>
