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
            <h4 class="text-uppercase">
                {{ $thread->subject }}
            </h4>
            <div class="well">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @each('messenger.partials.messages', $thread->messages, 'message')
                        @include('messenger.partials.form-message')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

