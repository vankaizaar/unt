@extends('layouts.app')

@section('template_title')
{{ $user->name }}'s Profile
@endsection

@section('template_fastload_css')

#map-canvas{
min-height: 250px;
height: 100%;
width: 100%;
}
.audio-element{margin: 0.5em auto;}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <img src="{{ mix('/images/saxophone.png') }}" alt="Boy Playing Saxophone" class="img-responsive"/>                                            
        </div>
        <div class="col-md-5 col-md-offset-1 mainText">
            <h4 class="text-uppercase">
                {{ trans('profile.showProfileTitle',['username' => $user->name]) }}
            </h4>
            <div class="well">
                <div class="panel">
                    <div class="panel-body">
                        <div style="position:relative; width: 100%; height:100%; padding:0.5em 0;margin-bottom:2em;">
                            <img src="@if ($user->profile->avatar_status == 1) {{ $user->profile->avatar }} @else {{ Gravatar::get($user->email) }} @endif" alt="{{ $user->name }}" class="user-avatar-2x" data-adaptive-background>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-uppercase"><strong>Basic info</strong></p>
                                <p>{{ $user->first_name }}  {{ $user->last_name }} <i>({{ $user->name}})</i><br />
                                @if ($user->profile->dob)
                                    {{$user->profile->dob->diffForHumans(null,True)}} <br />
                                    @endif
                                </p>
                                @if ($user->profile)
                                @if ($user->profile->bio)
                                <p class="text-uppercase"><strong>Bio</strong></p>
                                <p>{{ $user->profile->bio }}</p> 
                                @endif
                                @endif
                                <p>
                                    @if ($user->audio)	                                
                                <p class="text-uppercase"><strong>Entries</strong></p>
                                @forelse  ($user->audio as $track)
                                <div class="audio-element">
                                    <div class="row">
                                        <div class="col-md-12">                            
                                            <audio controls buffered style="width:100%;">        
                                                <source src="{{$track->entry}}">                                
                                            </audio>
                                        </div>                                    
                                    </div>  
                                </div>
                                @empty
                                <strong class="text-danger">No entries made.</strong>                    
                                @endforelse           
                                @endif
                                </p>                                                     
                            </div>
                            <div class="col-md-6">
                                <p class="text-uppercase"><strong>Contact Info</strong></p>
                                <p>
                                    {{ $user->email }} <br />
                                    @if ($user->profile)	
                                    @if ($user->profile->telephone) 
                                    {{$user->profile->telephone}} <br />
                                    @endif
                                    @if ($user->profile->location)
                                    {{ $user->profile->location }} <br />
                                    @endif
                                    @if(config('settings.googleMapsAPIStatus'))
                                    Latitude: <span id="latitude"></span> <br />Longitude: <span id="longitude"></span> <br />
                                <div id="map-canvas"></div>
                                @endif

                                @endif
                                </p>                               
                            </div>                            
                        </div>                                      
                        @if ($user->profile)
                        @if (Auth::user()->id == $user->id)

                        {!! HTML::icon_link(URL::to('/profile/'.Auth::user()->name.'/edit'), 'fa fa-fw fa-cog', trans('titles.editProfile'), array('class' => 'btn btn-lg btn-primary btn-block')) !!}

                        @endif
                        @else

                        <p>{{ trans('profile.noProfileYet') }}</p>
                        {!! HTML::icon_link(URL::to('/profile/'.Auth::user()->name.'/edit'), 'fa fa-fw fa-plus ', trans('titles.createProfile'), array('class' => 'btn btn-small btn-info btn-block')) !!}

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_scripts')

@if(config('settings.googleMapsAPIStatus'))
@include('scripts.google-maps-geocode-and-map')
@endif
@include('scripts.audio-play')
<script type="text/javascript">$(document).ready(function () {
        $.adaptiveBackground.run({
            shadeVariation: true
        });
    });
</script>
@endsection
