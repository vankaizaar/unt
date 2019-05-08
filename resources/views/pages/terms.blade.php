@extends('layouts.app')

@section('template_title')
Terms and conditions
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
            <h1><span>Terms and conditions</span></h1>
            <p>Curabitur volutpat imperdiet turpis scelerisque ullamcorper. Morbi ac ullamcorper ex. Fusce convallis ullamcorper nibh et feugiat. Nullam non dignissim libero. Maecenas tincidunt nunc ut libero venenatis, at pellentesque dolor dictum. Morbi ligula ante, fringilla vel iaculis eget, sollicitudin in justo. Pellentesque eleifend blandit tincidunt. Vestibulum in vehicula tellus, non vulputate purus.</p>

            <p>Donec tempor varius odio, a eleifend ex ultrices sit amet. Duis bibendum, lectus quis auctor porttitor, ligula lorem scelerisque dolor, et molestie dolor urna in elit. Pellentesque lobortis, risus ut euismod pharetra, lectus massa consequat diam, eget tristique nulla justo in nulla. Nullam sodales mi neque, a euismod nisi fringilla eu. Proin nec cursus nisl. Aliquam congue elit at risus consequat tristique. Sed varius id velit eget suscipit. Aenean ac enim id libero laoreet ultrices at eu elit. Cras et ligula lacus. Duis orci lacus, ultricies consectetur facilisis eu, elementum sit amet ex. Suspendisse potenti. </p>

        </div>
    </div>
</div>

@endsection
@section('footer_scripts')

@endsection