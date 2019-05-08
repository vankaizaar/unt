@extends('layouts.app')

@section('template_title')
{{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <img src="{{ mix('/images/saxophone.png') }}" alt="Boy Playing Saxophone" class="img-responsive"/>                                            
        </div>
       <div class="col-md-5 col-md-offset-1 mainText">
            <h1></h1>
            @include('panels.welcome-panel')

        </div>
    </div>
</div>

@endsection

@section('footer_scripts')
@endsection