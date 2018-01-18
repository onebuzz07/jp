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
        {{ Html::style(mix('css/frontend.css')) }}

        {{-- {{ Html::style(elixir('css/frontend.css')) }} --}}
        <link rel="stylesheet" href="{{ public_path('css/myCustom.css') }}" />

        @yield('after-styles-end')
        {!! Html::script(mix('js/frontend.js')) !!}
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://211.24.114.106:8090/js/vendor/jquery/vue.js"></script>

    </head>
    <body id="app-layout">
        <div class="container-fluid">
            <div class="page-header">


                <div class="row">
                  <div class="col-xs-2">
                            <img class="img-responsive inline " src="{{ public_path('img/frontend/logo.gif') }}" alt="Logo" width="200">
                    </div>
                    <div class="col-xs-5">
                        <h3 class="inline align-baseline">JP Printer</h3>
                    </div>
                    <div class="col-xs-5 text-right">
                        <h4>Report</h4>
                    </div>
                </div>


            </div> {{-- page-header --}}

            @yield('content')

        </div><!-- container -->

    </body>
</html>
