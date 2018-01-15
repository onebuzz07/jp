<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />

        <title>@yield('title', app_name())</title>

        @yield('meta')

        <!-- Styles -->
        @yield('before-styles-end')

        {{-- {{ Html::style(elixir('css/frontend.css')) }} --}}
        <link rel="stylesheet" href="{{ public_path('css/myCustom.css') }}" />

        @yield('after-styles-end')



    </head>
    <body id="app-layout">
        <div class="container-fluid">
            <div class="page-header">


                <div class="row">

                    <div class="col-xs-2">

                        <img class="img-responsive inline " src="{{ public_path('img/PEM_logo.svg') }}" alt="Logo" width="200">
                    </div>
                    <div class="col-xs-5">
                        <h3 class="inline align-baseline">Polar Electro Malaysia (M) S/B</h3>
                    </div>
                    <div class="col-xs-5 text-right">
                        <h4>Purchase Requisition</h4>
                    </div>
                </div>


            </div> {{-- page-header --}}

            @yield('content')

        </div><!-- container -->

    </body>
</html>
