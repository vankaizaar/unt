@extends('layouts.app-home')
@section('template_title')
{{ trans('titles.app') }}
@endsection

@section('template_fastload_css')

@endsection
@section('content')
<section class="slider-holder">
    <div class="slides">
        <div class="slide-item uno">
            <div class="col-md-5 col-md-offset-6">                
                <h1>We exist to <span>source, recruit, develop, market & nurture</span> new talent. </h1>
                <a class="text-uppercase btn btn-default btn-transparent" href="{{ route('about') }}">Find out more </a>
            </div>  
        </div>
        <div class="slide-item dos">
            <div class="col-md-5 col-md-offset-6">
                <h1>“<span>Music can change </span>the world because it can change people” </h1>                
                <a class="text-uppercase btn btn-default btn-transparent" href="{{ route('about') }}">Find out more </a>
            </div> 
        </div>
        <div class="slide-item trez">
            <div class="col-md-5 col-md-offset-6">

                <h1><span>Music</span> expresses that which <span>cannot be</span> said and on which it is impossible to be <span>silent</span>.</h1>                
                <a class="text-uppercase btn btn-default btn-transparent" href="{{ route('about') }}">Find out more</a>
            </div> 
        </div>
    </div>    
</section> 
@endsection  

@section('footer_scripts')
<script type="text/javascript">
    $('.slides').slick({
        autoplay: true,
        autoplaySpeed: 3500,
        fade: true,
        arrows: false,
        dots: true,
        dotsClass: "slick-dots2",
        cssEase: "ease-in-out",
        speed: 1750
    });
</script>
@endsection  
