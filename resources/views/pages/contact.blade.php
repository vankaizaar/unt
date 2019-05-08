@extends('layouts.app')

@section('template_title')
Contact us
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
            <h1><span>Contact us</span></h1>
            <address>
                <strong>The Untapped Academy</strong><br>
                International Life House, Mama Ngina Street<br>
                Nairobi, KE 00100<br>
                <abbr title="Phone">P:</abbr> (254) 714-336-825
            </address>

            <address>
                <strong>Enquiries</strong><br>
                <a href="mailto:queries@untapped.africa">queries@untapped.africa</a>
            </address>


        </div>
    </div>
</div> 

@endsection
@section('footer_scripts')

@endsection