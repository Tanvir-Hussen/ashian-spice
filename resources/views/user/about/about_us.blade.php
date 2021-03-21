@extends('layouts.test')
@section('content')
    <!-- ----------- about Section ------------- -->
    <section id="about-container">
        <div>
            <img src="{{ asset('frontend/images/about-us.PNG') }}" height="230px" width="100%" alt="">
        </div>
        <div class="container">
            <p id="about-p">
                For as long as Ashiana Spice has been open, we have been creating flavour sensations in each and every one
                of our delicious dishes.
            </p>

            <p id="about-p">
                We have grown since we first opened our doors, and we are delighted that we have been able to share our
                tasty Indian cuisine with a countless number of happy customers. Each dish has already been perfected by
                experienced Indian chefs who are committed to creating food sensations.
            </p>

            <p id="about-p">
                We provide our customers with a fresh dining experience that can be enjoyed alone, with friends, family or
                work colleagues for any occasion.
            </p>

            <p id="about-p">
                We also have a fantastic private dining room, ideal for work functions, hosting clients or large parties,
                celebrating with larger groups of family and friends, or for more intimate dining experiences. Please
                contact us for more details on how to book this room.
            </p>

            <p id="about-p">
                We have had the pleasure of serving lovely customers and greatly appreciate that many have decided to
                support us with glowing reviews. It is very rewarding to know that each guest at Ashiana Spice enjoys the
                food that captures our vibrant heritage and culture.We have had the pleasure of serving lovely customers and
                greatly appreciate that many have decided to support us with glowing reviews. It is very rewarding to know
                that each guest at Ashiana Spice enjoys the food that captures our vibrant heritage and culture.
            </p>


            <p id="about-p">
                Interested in tasting high quality Indian cuisine?
            </p>
        </div>

        <div class="container contact-us">
            <p style="font-size:20px; color:white; padding:25px; text-align:center;">If you would like to make an
                enquiry
                or have a
                question, please get in touch with us, we are always happy to hear from you.</p>
            <div class="row justify-content-center pb-5">
                <div class="col-md-7 heading-section text-center">
                    <button class="btn btn-secondary">
                        Contect Us
                    </button>
                </div>
            </div>
        </div>


    </section>
    <!-- ----------- End about Section ------------- -->

@endsection
