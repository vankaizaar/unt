@extends('layouts.app')

@section('template_title')
{{ trans('audio.templateTitle') }}
@endsection

@section('template_fastload_css')
.mejs__container {
background: -webkit-linear-gradient(#4a4c4d, #2b2d2d); 
background: -moz-linear-gradient(#4a4c4d, #2b2d2d);
background: -o-linear-gradient(#4a4c4d, #2b2d2d); 
background: -ms-linear-gradient(#4a4c4d, #2b2d2d); 	
background: linear-gradient(#4a4c4d, #2b2d2d); 	    
box-shadow:0 0 18px rgba(0,0,0,.5);  
}
#close{
position:relative;
margin: 0.5em auto;
}
.audio-element{margin: 0.5em auto;}

.mejs-container.mejs-audio, .mejs__container.mejs__audio {
    min-height: 40px;
}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <img src="{{ mix('/images/saxophone.png') }}" alt="Boy Playing Saxophone" class="img-responsive"/>                                            
        </div>
        <div class="col-md-5 col-md-offset-1 mainText">
            <h4 class="text-uppercase">{{ trans('audio.showEntriesTitle',['username' => $user->name]) }}</h4>
            <div class="panel panel-primary">               
                <div class="panel-body"> 
                    <div class="row">
                        <div class="col-md-12">
                            @if (count($user->audio) <  3)
                            <div id="close">                        
                                <div class="dz-preview"></div>
                                {!! Form::open(array('route' => 'audio.store', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'avatarDropzone', 'class' => 'form single-dropzone dropzone single', 'files' => true)) !!}                                                
                                <div class="dz-message needsclick">
                                    Drop your entry here or click to select file.<br />                            
                                </div>
                                {!! Form::close() !!}
                            </div>
                            @else
                            <p class="text-warning lead"> <i class="fa fa-warning"></i> You have reached the maximum number of entries allowed.</p>
                            @endif
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-12">   

                            @forelse  ($user->audio as $track)
                            <div class="audio-element">
                                <div class="row">
                                    <div class="col-sm-5">                            
                                        <audio controls buffered style="width: 100%;">        
                                            <source src="{{$track->entry}}">                                
                                        </audio>
                                        <form action="{{route('audio.destroy', ['id'=>$track->id ])}}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <input class="btn btn-danger btn-md text-uppercase" style="height:40px !important;" type="submit" value="Delete">
                                        </form> 
                                    </div>                                    
                                </div>
                            </div>
                            @empty
                            <p class="text-danger lead">You have not made any entries.</p>                    
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('footer_scripts')
@include('scripts.audio-upload')
@include('scripts.audio-play')

@endsection

