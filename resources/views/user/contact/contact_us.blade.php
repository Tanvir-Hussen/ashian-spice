@extends('layouts.test')
@section('content')

    <!-- ----------- about Section ------------- -->
    <section id="about-container">
        <div>
            <img src="{{ asset('frontend/images/contact-us.PNG') }}" height="230px" width="100%" alt="">
        </div>
        @if (Session('message'))
                <div class="alert bg-success" role="alert">
                    <a href="#" class="close" data-dismiss="alert">×</a>
                    {{ Session('message') }}
                </div>

            @endif
        <div class="container">
            <p id="about-p">
                Coronavirus Update: We are back to our normal opening hours with dining in the restaurant now available. You
                will need to book in advance and we have to collect your contact details. When visiting the restaurant or
                collecting your takeaway, please keep a safe distance from other customers and staff.
            </p>

            <p id="about-p">
                Get in touch with us to find out more about our menu, home dining options, to make a booking or help with
                any other queries you may have.
            </p>

            <p id="about-p">
                No matter your needs, we're here to help provide you with the perfect dining solution.
            </p>

            <p id="about-p">
                Following Covid-19 government guidelines we are open from 12pm-2pm and 5:30pm-10pm every day. We are
                available during these times to answer any calls and queries to the restaurant.
            </p>

            <p id="about-p">
                We look forward to hearing from you!</p>


            <p id="about-p"> 
                Interested in tasting high quality Indian cuisine?
            </p>
        </div>

        <section id="user-container" class="container">
            @if (Session('message'))
                <div class="alert bg-success" role="alert">
                    <a href="#" class="close" data-dismiss="alert">×</a>
                    {{ Session('message') }}
                </div>

            @endif
            <form action="{{ route('save-contact') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">Name</label>
                    <input type="data" name="contact_firstName" class="form-control" id="exampleInputUsername1"
                        aria-describedby="emailHelp" placeholder="name*">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="contact_email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputSubject">Subject</label>
                    <input name="contact_subject" type="text" class="form-control" id="exampleInputSubject" placeholder="subject">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Message</label>
                    <textarea class="form-control" name="contact_message" id="exampleFormControlTextarea1"
                        rows="3"></textarea>
                </div>
                <button id="about-btn" type="submit" style="text-align: center;" class="btn btn-primary">Contact Us</button>


            </form>
        </section>
        <section style="height: 20px; background:black;">

        </section>

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

@endsection
