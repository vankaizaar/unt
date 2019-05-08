@extends('layouts.app')

@section('template_title')
Meet the judges
@endsection

@section('template_fastload_css')
@endsection

@section('content')

<div class="container-fluid">
    <div class="judges-slider">

        <div class="row" data-judge="Abassi">
            <div class="col-md-5">
                <img src="{{ mix('images/abassi.png')}}" alt="Abassi" class="img-responsive"/>                                            
            </div>
            <div class="col-md-5 col-md-offset-1 mainText">
                <h1><span>Meet the Core Team</span></h1>
                <h2><span>Abassi</span></h2>
                <p>Abassi is an all-around artist to vibe to, delivering soothing vocals over smooth beats. </p>
                <p>His place in the industry has mainly been behind-the-scenes as a producer, composer and sound engineer but this time around he’s venturing in to the spotlight. Music is not a job, it is his therapy, it is his safe haven, it is his truth and his hope is to connect this way with listeners. </p>              
                <p><a href="https://www.facebook.com/Abassi-Music-179161012609936/" target="new"><i class="fa fa-facebook-square fa-lg"></i></a> <a href="https://www.instagram.com/abassimusic/" target="new"><i class="fa fa-instagram fa-lg"></i></a> <a href="https://twitter.com/abassimusic" target="new"><i class="fa fa-twitter-square fa-lg"></i></a></p>
            </div>
        </div>


        <!--<div class="row" data-judge="Anje">
            <div class="col-md-5">
                <img src="{{ mix('images/anje.png')}}" alt="Anje" class="img-responsive"/>                                            
            </div>
            <div class="col-md-5 col-md-offset-1 mainText">
                <h1><span>Meet the Core Team</span></h1>
                <h2><span>Anje</span></h2>
                <p>What’s in his name? Rewriting destiny and giving birth to a new identity, the name Anje came as a revolt on the expectations and pressures that surrounded him as a teen. Despite being accepted into a top engineering school in the U.S., he was unfulfilled and disillusioned and decided to redefine life on his own terms by returning home to chart his path in music.</p>
                <p>At the core of Anje’s music is the desire to inspire people to be their absolute best, regardless of any limitations. </p>
                <p>His lyrics explore the universal human pursuit of success and security in a world of inequality and injustice. </p>
                <p>Stories on morality, relationships and family, brilliantly told over soulful and modern sounds take his listeners to familiar internal battles. </p>
                <p>This rapper with a message is, no doubt, the next big thing to come out of Africa. Born and raised in Kenya as Allan Njoroge, Anje’s first taste of success happened in 2011 when he and long-time friend, Enoch ‘Steps’ Mwendwa, put out the mixtape, ETA, which led to a string of performances across Nairobi. </p>
                <p>Then, in 2014, Anje broke out as a solo rapper and released his own mixtape, Waiting Room, receiving nods from industry heavyweights and giving him industry credibility. This led to bigger performances in Burundi and interviews on top radio stations, Capital FM, Homeboyz Radio and Kubamba Radio. </p>
                <p>Following the success of Waiting Room, Anje reigned over local charts for 4 weeks with the single, Numbers. </p>
                <p>Having encountered both an African upbringing and an American experience, Anje’s music is refreshing and modern, revealing nuances of his Kenyan culture. The outcome is a beautiful aural collision, which tells the stories of a young African navigating the globalized world.</p>
                <p><a href="https://www.facebook.com/anjemusic" target="new"><i class="fa fa-facebook-square"></i></a> <a href="https://www.instagram.com/anjemusic/" target="new"><i class="fa fa-instagram"></i></a> <a href="https://twitter.com/anjemusic" target="new"><i class="fa fa-twitter-square"></i></a></p>
            </div>
        </div>
        <div class="row" data-judge="Atemi">
            <div class="col-md-5">
                <img src="{{ mix('images/atemi.png')}}" alt="Atemi" class="img-responsive"/>                                            
            </div>
            <div class="col-md-5 col-md-offset-1 mainText">
                <h1><span>Meet the Core Team</span></h1>
                <h2><span>Atemi</span></h2>
                <p>Call it Neo-Afro-Soul, my music is a unique blend of afro-fusion and neo-soul. Coming from a musical family, I began singing at an early age. Since then, my musical journey has taken me all around the world. I released my first single, “Happy”, in 2004; and in 2008 launched my debut album, 'Hatimaye' and my sophomore album 'Manzili - State of Life' was released in May 2013.</p>
                <p>I am currently working on my third studio album and released the first single off this album, a song called 'Moyo' feat Tanzanian singer Lady Jaydee, in March 2015.</p>
                <p>Take this musical ride with me...my journey is just beginning and the best is yet to come! I am an artiste, a poet, a composer and an entertainment guru. I sing, therefore I live. Music is the air I breathe.</p>
                <p><a href="https://www.facebook.com/atemioyungu" target="new"><i class="fa fa-facebook-square"></i></a> <a href="https://www.instagram.com/atemidiva/" target="new"><i class="fa fa-instagram"></i></a> <a href="https://twitter.com/Atemidiva" target="new"><i class="fa fa-twitter-square"></i></a></p>
            </div>
        </div>  -->                                  
    </div>
</div>

@endsection
@section('footer_scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('.judges-slider').slick({
            autoplay: true,
            autoplaySpeed: 3500,
            fade: true,
            arrows: false,
            dots: true,
            adaptiveHeight: true,
            dotsClass: "slick-dots3",
            cssEase: "ease-in-out",
            speed: 1000,
            customPaging: function (slider, i) {
                //judgename = $(slider.$slides[i]).data("judge");
                if (i == 0)
                {
                    judgename = "Abassi";
                    return '<button class="btn btn-default">' + judgename + '</button>';
                } else if (i == 1) {
                    judgename = "Anje";
                    return '<button class="btn btn-default">' + judgename + '</button>';
                } else if (i == 2) {
                    judgename = "Atemi";
                    return '<button class="btn btn-default">' + judgename + '</button>';
                }

            }
        });
    });

</script>
@endsection