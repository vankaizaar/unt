@extends('layouts.app')

@section('template_title')
{{ trans('audio.templateTitle') }}
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div id="close">
                        <div class="dz-preview"></div>
                        {!! Form::open(array('route' => 'audio.store', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'avatarDropzone', 'class' => 'form single-dropzone dropzone single', 'files' => true)) !!}                                                
                        <div class="dz-message needsclick">
                            Drop your entry here or click to select file.<br />                            
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('footer_scripts')
@include('scripts.audio-upload')
@endsection