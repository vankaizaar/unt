@extends('layouts.app')

@section('template_title')
{{ trans('messages.templateTitle') }}
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
            <h4 class="text-uppercase"> {{ trans('messages.showMessagesTitle',['username' => $user->name]) }}</h3>
            <div class="well">
                @include('messenger.partials.flash')
                @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_scripts')

@endsection