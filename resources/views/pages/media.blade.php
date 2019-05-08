@extends('layouts.app')

@section('template_title')
Media
@endsection

@section('template_fastload_css')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <img src="{{ mix('/images/saxophone.png') }}" alt="Boy Playing Saxophone" class="img-responsive"/>                                            
        </div>
        <div class="col-md-5 mainText">
            <h1><span>Media</span></h1>
            <p>The Kenyan music industry is still in its infancy and now is the time for the next transition. The industry has grown and evolved, but it has not reached a point where not only are we producing great music, but artists are feel recognised, appreciated and more importantly, are able to sustain themselves from just their music career. </p>                     
            <h2><span>Webseries</span></h2>
            <div style="position: relative; max-width: 100%; height: auto;margin-bottom: 2em;">
                <video id="player1" style="width:auto;height:100%;" controls="control" preload="none">                          
                    <source src="https://www.youtube.com/watch?v=sp-0USG46hM" type="video/youtube" />
                    <source src="https://www.youtube.com/watch?v=ZTWv3ZnM5Aw" type="video/youtube" />
                    <source src="https://www.youtube.com/watch?v=m4fnwBgra3s" type="video/youtube" /> 
                    <source src="https://www.youtube.com/watch?v=SwA-dUowIOQ" type="video/youtube" />   
                    <source src="http://www.youtube.com/watch?v=MtIqQju3354" type="video/youtube" />                   
                </video>
            </div>
            

        </div>
        
    </div>
</div>
@endsection

@section('footer_scripts')
@include('scripts.youtube-playlist')
<script src="{{ mix('/js/masonry/masonry.pkgd.js') }}"></script>
<script src="{{ mix('/js/imagesloaded/imagesloaded.js') }}"></script>
<script src="{{ mix('/js/masongram/masongram.min.js') }}"></script>
<script type="text/javascript">
$('#photos').masongram({
    access_token: "85fc238ac4944bfb844871834bd61746",
    count: 5,
    size: 'standard_resolution',
    caption: '<div class="text-center"><p data-if="{likes}"><i class="fa fa-heart text-danger"></i> {likes}</p><p data-if="{caption}">{caption}</p><a tabindex="-1" class="btn btn-primary" href="https://fruskac.net/en/map?c={location},12z" target="_blank" data-if="{location}"><i class="fa fa-map-o"></i> Location</a> <a tabindex="-1" class="btn btn-primary" href="{link}" target="_blank" data-if="{link}"><i class="fa fa-instagram"></i> Instagram</a></div>'
});
// var access_token = window.location.hash.replace(/#access_token=([\w\d.]+)/, '$1');
//      var authorization = 'https://api.instagram.com/oauth/authorize/?client_id=99bd7840c3ce40a3b30cceace365891f&redirect_uri=' + window.location + '&response_type=token&scope=public_content';
//      if (!access_token) {
//        access_token = '2127248609.1677ed0.db0b4ad502bf43d3b915db9fadcfece0';
//      }
//      $(document).ready(function () {
//        $('#photos').masongram({
//          access_token: access_token,
//          count: 5,
//          size: 'standard_resolution',
//          caption: '<div class="text-center"><p data-if="{likes}"><i class="fa fa-heart text-danger"></i> {likes}</p><p data-if="{caption}">{caption}</p><a tabindex="-1" class="btn btn-primary" href="https://fruskac.net/en/map?c={location},12z" target="_blank" data-if="{location}"><i class="fa fa-map-o"></i> Location</a> <a tabindex="-1" class="btn btn-primary" href="{link}" target="_blank" data-if="{link}"><i class="fa fa-instagram"></i> Instagram</a></div>'
//        });
//        $('.authorization').attr('href', authorization);
//      });
</script>

@endsection