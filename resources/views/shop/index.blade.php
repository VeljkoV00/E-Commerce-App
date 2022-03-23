<!DOCTYPE html>
<html lang="en">

@include('shop.partials.head')

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->
  

    <!-- ***** Header Area Start ***** -->
    @include('shop.partials.header')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    @include('shop.partials.home')
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Men Area Starts ***** -->
    @include('shop.partials.man')
    <!-- ***** Men Area Ends ***** -->

    <!-- ***** Women Area Starts ***** -->
    @include('shop.partials.women')
    <!-- ***** Women Area Ends ***** -->

    <!-- ***** Kids Area Starts ***** -->
    @include('shop.partials.kid')
    <!-- ***** Kids Area Ends ***** -->

    <!-- ***** Explore Area Starts ***** -->
    @include('shop.partials.explore')
    <!-- ***** Explore Area Ends ***** -->

    <!-- ***** Social Area Starts ***** -->
    @include('shop.partials.social-area')
    <!-- ***** Social Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->
    @include('shop.partials.subscribe')
    <!-- ***** Subscribe Area Ends ***** -->


    @include('shop.partials.footer')



    <!-- JavaScript -->
    @include('shop.partials.scripts')
    

</body>

</html>
