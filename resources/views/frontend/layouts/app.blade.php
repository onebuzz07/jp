<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'JP')">
        <meta name="author" content="@yield('meta_author', 'ios')">
        @yield('meta')
        <!-- Styles -->
        @yield('before-styles')
        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{ Html::style(mix('css/frontend.css')) }}
        {{-- <link href="{{ asset('css/backend/plugin/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet"> --}}
        <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/css/dataTables.checkboxes.css" rel="stylesheet" />

        @yield('after-styles')
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body id="app-layout">
        {!! Html::script(mix('js/frontend.js')) !!}
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
        <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://211.24.114.106:8090/js/vendor/jquery/vue.js"></script>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/js/dataTables.checkboxes.min.js"></script>



            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')
            <div class="container">
                @include('includes.partials.messages')
                @yield('content')
            </div><!-- container -->

        <!-- Scripts -->
        <script src="https://unpkg.com/vue"></script>
        @yield('before-scripts')
        {{-- {!! Html::script(mix('js/frontend.js')) !!} --}}
        @yield('after-scripts')
        @include('includes.partials.ga')
    </body>
</html>
