<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="bleassing group" />
    <meta name="author" content="Shoaib Mahmud" />
    @if (isset($keywords))
    {{ $keywords }}
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <title>{{ $title . ' | ' . config('app.name', 'Laravel') }}</title> --}}
    <title> Roxy Paint </title>
    <!--CSS -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/Custom.css?v=2') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/Home_Slider.css?v=2') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all" />
    <link href="{{ asset('frontend/css/Blessing_Agrovet.css') }}" rel="stylesheet" />
    @if (isset($styles))
    {{ $styles }}
    @endif

    @php
    $company = App\Models\Company::first();
    @endphp

    <link rel="icon" href="{{ asset('all/'. $company->favicon) }}" type="image/png">
  </head>
  <body>


    <!-- Header -->
    <x-site-header />
    
    <x-site-navbar />


    <main>
        {{ $slot }}
    </main>

    <x-site-footer />

    <!-- jQuery -->
    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    @if (isset($scripts))
    {{ $scripts }}
    @endif
    <script>
      $(function () {
        //Current Year in footer
        $("#CurrentYear").text(new Date().getFullYear());

        //Back to Top
        $("body").append(
          '<div id="toTop" class="btn btn-info"><span class="glyphicon glyphicon-chevron-up"></span>Top</div>'
        );
        $(window).scroll(function () {
          if ($(this).scrollTop() != 0) {
            $("#toTop").fadeIn();
          } else {
            $("#toTop").fadeOut();
          }
        });

        $("#toTop").click(function () {
          $("html, body").animate({ scrollTop: 0 }, 600);
          return false;
        });

        $(".dropdown").hover(
          function () {
            $(".dropdown-menu", this).stop(true, true).fadeIn("fast");
            $(this).toggleClass("open");
            $("b", this).toggleClass("caret caret-up");
          },
          function () {
            $(".dropdown-menu", this).stop(true, true).fadeOut("fast");
            $(this).toggleClass("open");
            $("b", this).toggleClass("caret caret-up");
          }
        );
      });
    </script>
  </body>
</html>
