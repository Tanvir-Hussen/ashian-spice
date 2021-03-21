@extends('layouts.test')
@section('content')
    <!-- ----------- End Hero Section ------------- -->

    <section id="product">
        <div class="container" id="product-container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-7 heading-section text-center">
                    <h2 class="font-weight-bold text-color glow" style="color: #black; padding-top: 5px;">
                        Categories
                    </h2>
                </div>
            </div>
            <div class="row">
                @foreach ($category as $item)
                    <div class="col-md-6 col-sm-6" id="boxshadow">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="{{ route('categroy_product', $item->category_id) }}">
                                    <img style="height: 350px; width:450px;"
                                        src="{{ asset('/images/' . $item->cat_image) }}" alt="">
                                </a>

                            </div>
                            <div class="product-content">
                                <div class="">
                                    <a href="#"><i id="design-cart"></i></a>
                                    <a href="#"><i id="design-cart"></i></a>
                                </div>
                                <div style="margin-bottom:5px;">
                                    <a id="about-btn" class="btn btn-warning"
                                        href="{{ route('categroy_product', $item->category_id) }}">{{ $item->category_name }}</a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach


            </div>
        </div>

        </div>


    </section>



@endsection
