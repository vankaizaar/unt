@extends('layouts.app')

@section('template_title')
{{ Lang::get('titles.activation') }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <img src="{{ mix('/images/saxophone.png') }}" alt="Boy Playing Saxophone" class="img-responsive"/>                                            
        </div>
        <div class="col-md-5 col-md-offset-1 mainText">
            <h1><span>{{ Lang::get('titles.activation') }}</span></h1>
            <p>{{ Lang::get('auth.regThanks') }}</p>
            <p>{{ Lang::get('auth.anEmailWasSent',['email' => $email, 'date' => $date ] ) }}</p>
            <p>{{ Lang::get('auth.clickInEmail') }}</p>
            <p><a href='/activation' class="btn btn-primary">{{ Lang::get('auth.clickHereResend') }}</a></p>
        </div>
    </div>
</div>
@endsection