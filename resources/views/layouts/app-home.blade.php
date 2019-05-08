<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>        
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>
        <meta name="description" content="A place where artists are helped with crafting their music, but more importantly, they are guided
              through the process of making a career out of music."/>
        <meta name="author" content="Zakaria Davis"/>
        <link rel="icon" type="image/x-icon" href="{{ mix('favicon.ico') }}">
        @php
        $theme_logo = "/images/logo-white.png";
        @endphp
        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        {{-- Fonts --}}
        @yield('template_linked_fonts')
        {{-- Styles --}}
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet"/>
        <link href="{{ mix('/css/light.css') }}" rel="stylesheet"/>
        <style type="text/css">
            @yield('template_fastload_css')  
            @if (Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0))
            .user-avatar-nav {
                background: url({{ Gravatar::get(Auth::user()->email) }}) 50% 50% no-repeat;
            background-size: auto 100%;
            }
            @endif         
        </style>
        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
            ]) !!}
            ;
        </script>
        @yield('head')
    </head>
    <body class="optionTwo">
        <div id="app">
            <section class="main">
                <div class="container-fluid">  
                    <div class="row">
                        <div class="col-md-12">
                            <section class="navigation">
                                @include('partials.nav')
                            </section>

                            @include('partials.form-status')

                            @yield('content')
                        </div>
                    </div>
            </section>
            <section class="video">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <br />
                                    <br />
                                    <h1 class="text-center white italized shadowed">What is untapped?</h1>  
                                    <p class="lead white text-center shadowed">A place where artists are helped with crafting their music, but more importantly, they are guided
                                        through the process of making a career out of music.</p>  
                                </div>
                            </div>                           
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item shadowed-box" src="https://www.youtube.com/embed/sp-0USG46hM"></iframe>
                                    </div>
                                </div>
                            </div>                           
                        </div>
                    </div>
                </div>
            </section>
            @include('partials.social-copyright')
        </div>
        {{-- Scripts --}}
        <script src="{{ mix('/js/app.js') }}"></script>        
        @if(config('settings.googleMapsAPIStatus'))
        {!! HTML::script('//maps.googleapis.com/maps/api/js?key='.env("GOOGLEMAPS_API_KEY").'&libraries=places&dummy=.js', array('type' => 'text/javascript')) !!}
        @endif
        @yield('footer_scripts')
    </body>
</html>
