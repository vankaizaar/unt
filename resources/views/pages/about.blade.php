@extends('layouts.app')

@section('template_title')
About the Untapped Academy
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
            <h1><span>About the Untapped Academy</span></h1>
            <p>The Kenyan music industry is still in its infancy and now is the time for the next transition. The industry has grown and evolved, but it has not reached a point where not only are we producing great music, but artists are feel recognised, appreciated and more importantly, are able to sustain themselves from just their music career. </p>
            <p>These conversations have happened inside and outside the music industry and numerous people and various platforms have tried to battle this problem. But no lasting solution has been found. We got tired of these conversations. </p>
            <p>We decided to do something about it. This is why the Untapped Academy was born. A place where artists are helped with crafting their music, but more importantly……. are guided through the process of making a career out of music. </p>
            <p>Walk with us as we start this revolution. Welcome to the Untapped Academy.</p>           
            <a href="{{ route('register') }}" class="btn btn-default">APPLY</a>
        </div>
    </div>
</div>
@endsection
@section('footer_scripts')

@endsection