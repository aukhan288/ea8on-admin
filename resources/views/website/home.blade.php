@extends('layouts.base')
@section('page')
<style>
        .modal-full-height {
            height: 100%;
        }

        .modal-right {
            position: fixed;
            right: 0;
            top: 0;
            width: 25%; /* Set the width to 30% */
            /* Full height */
            margin: 0; /* No margin */
        }
        .btn-checkout{
          display: inline-block;
          padding: 10px 55px;
          background-color: #ffbe33;
          color: #ffffff;
          border-radius: 45px;
          -webkit-transition: all 0.3s;
          transition: all 0.3s;
          border: none;
        }

        @media (max-width: 768px) {
    .modal-right {
        width: 50%; /* Adjust width to 50% on smaller screens */
    }
}

/* Media Query for screens smaller than 576px */
@media (max-width: 576px) {
    .modal-right {
        width: 75%; /* Adjust width to 75% on extra small screens */
    }
}

/* Optional: For very small screens */
@media (max-width: 360px) {
    .modal-right {
        width: 90%; /* Adjust width to 90% on very small screens */
    }
}
    </style>
<div class="hero_area">

    <div class="bg-box">
        <img src="{{ asset('images/website/slide-1.jpeg') }}" alt="">
    </div>
    <!-- header section strats -->

    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Savor Every Bite!
                                    </h1>
                                    <p>
                                        Indulge in a world of flavours crafted to satisfy your cravings. At EA8ON, we bring you mouth-watering grilled and fried delicacies, from juicy burgers to savoury wings, all served with a side of unforgettable taste. Ready to experience real flavour? Dive in and Feel the Appetite!
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Order Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Crave the Flavour!
                                    </h1>
                                    <p>
                                        Our menu is designed to awaken your taste buds with every bite. Whether you're a fan of sizzling grilled meats or crispy fried goodness, EA8ON delivers a taste you'll remember. Come hungry and leave happy because here, the flavour is everything.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Order Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Ignite Your Taste!
                                    </h1>
                                    <p>
                                       From the first bite to the last, our dishes are all about bold flavours and satisfying textures. Get ready to elevate your dining experience with dishes crafted to perfection. At EA8ON, every meal is a celebration of taste. Are you ready to feel the appetite?
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Order Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel1" data-slide-to="1"></li>
                    <li data-target="#customCarousel1" data-slide-to="2"></li>
                </ol>
            </div>
        </div>

    </section>
    <!-- end slider section -->
</div>

<!-- offer section -->

<section class="offer_section layout_padding-bottom">
    <div class="offer_container">
        <div class="container ">
            <div class="row">
                <div class="col-md-6  ">
                    <div class="box ">
                        <div class="img-box">
                            <img src="{{ asset('images/website/o1.jpg') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Tasty Thursdays
                            </h5>
                            <h6>
                                <span>20%</span> Off
                            </h6>
                            <a href="">
                                Order Now <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;"
                                    xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                     c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                     C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                     c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                     C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                     c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                        </g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  ">
                    <div class="box ">
                        <div class="img-box">
                            <img src="{{ asset('images/website/o2.jpg') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Pizza Days
                            </h5>
                            <h6>
                                <span>15%</span> Off
                            </h6>
                            <a href="">
                                Order Now <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;"
                                    xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                     c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                     C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                     c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                     C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                     c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                        </g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end offer section -->

<!-- food section -->

<section class="food_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our Menu
            </h2>
        </div>

        <ul class="filters_menu">
            <li class="active" data-filter="*">All</li>
            <li data-filter=".burger">Burger</li>
            <li data-filter=".pizza">Pizza</li>
            <li data-filter=".pasta">Pasta</li>
            <li data-filter=".fries">Fries</li>
        </ul>

        <div class="filters-content">
            <div class="row grid">
                <div class="col-sm-6 col-lg-4 all pizza">
                    <div class="box">
                        <div>
                            <div class="img-box">
                                <img src="{{ asset('images/website/f1.png') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Delicious Pizza
                                </h5>
                                <p>
                                    Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam
                                    voluptatem repellendus sed eaque
                                </p>
                                <div class="options">
                                    <h6>
                                        $20
                                    </h6>
                                    <a data-toggle="modal" data-target="#cartModal">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 456.029 456.029"
                                            style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 all burger">
                    <div class="box">
                        <div>
                            <div class="img-box">
                                <img src="{{ asset('images/website/f2.png') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Delicious Burger
                                </h5>
                                <p>
                                    Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam
                                    voluptatem repellendus sed eaque
                                </p>
                                <div class="options">
                                    <h6>
                                        $15
                                    </h6>
                                    <a href="">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 456.029 456.029"
                                            style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 all pizza">
                    <div class="box">
                        <div>
                            <div class="img-box">
                                <img src="{{ asset('images/website/f3.png') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Delicious Pizza
                                </h5>
                                <p>
                                    Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam
                                    voluptatem repellendus sed eaque
                                </p>
                                <div class="options">
                                    <h6>
                                        $17
                                    </h6>
                                    <a href="">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 456.029 456.029"
                                            style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 all pasta">
                    <div class="box">
                        <div>
                            <div class="img-box">
                                <img src="{{ asset('images/website/f4.png') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Delicious Pasta
                                </h5>
                                <p>
                                    Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam
                                    voluptatem repellendus sed eaque
                                </p>
                                <div class="options">
                                    <h6>
                                        $18
                                    </h6>
                                    <a href="">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 456.029 456.029"
                                            style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 all fries">
                    <div class="box">
                        <div>
                            <div class="img-box">
                                <img src="{{ asset('images/website/f5.png') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    French Fries
                                </h5>
                                <p>
                                    Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam
                                    voluptatem repellendus sed eaque
                                </p>
                                <div class="options">
                                    <h6>
                                        $10
                                    </h6>
                                    <a href="">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 456.029 456.029"
                                            style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 all pizza">
                    <div class="box">
                        <div>
                            <div class="img-box">
                                <img src="{{ asset('images/website/f6.png') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Delicious Pizza
                                </h5>
                                <p>
                                    Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam
                                    voluptatem repellendus sed eaque
                                </p>
                                <div class="options">
                                    <h6>
                                        $15
                                    </h6>
                                    <a href="">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 456.029 456.029"
                                            style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 all burger">
                    <div class="box">
                        <div>
                            <div class="img-box">
                                <img src="{{ asset('images/website/f7.png') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Tasty Burger
                                </h5>
                                <p>
                                    Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam
                                    voluptatem repellendus sed eaque
                                </p>
                                <div class="options">
                                    <h6>
                                        $12
                                    </h6>
                                    <a href="">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 456.029 456.029"
                                            style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 all burger">
                    <div class="box">
                        <div>
                            <div class="img-box">
                                <img src="{{ asset('images/website/f8.png') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Tasty Burger
                                </h5>
                                <p>
                                    Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam
                                    voluptatem repellendus sed eaque
                                </p>
                                <div class="options">
                                    <h6>
                                        $14
                                    </h6>
                                    <a href="">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 456.029 456.029"
                                            style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 all pasta">
                    <div class="box">
                        <div>
                            <div class="img-box">
                                <img src="{{ asset('images/website/f9.png') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Delicious Pasta
                                </h5>
                                <p>
                                    Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam
                                    voluptatem repellendus sed eaque
                                </p>
                                <div class="options">
                                    <h6>
                                        $10
                                    </h6>
                                    <a href="">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 456.029 456.029"
                                            style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-box">
            <a href="">
                View More
            </a>
        </div>
    </div>
</section>

<!-- end food section -->

<!-- about section -->

<section class="about_section layout_padding">
    <div class="container  ">

        <div class="row">
            <div class="col-md-6 ">
                <div class="img-box">
                    <img src="{{ asset('images/website/about-img.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>
                            Where Flavour Meets Heart
                        </h2>
                    </div>
                    <p>
                        At EA8ON, we don't just cook—we craft every dish with love and passion. From the freshest ingredients to the perfect blend of spices, each layer is carefully chosen to bring you a taste that's as heartfelt as it is delicious. Our commitment is simple: to serve food that fills your heart as much as it fills your appetite. Dive into a meal that's made with a heart for those who crave a little something extra in every bite.
                    </p>
                    <a href="">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end about section -->

<!-- book section -->
<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Reserve Your Experience
            </h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form_container">
                    <form action="">
                        <div>
                            <input type="text" class="form-control" placeholder="Your Name" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Phone Number" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Your Email" />
                        </div>
                        <div>
                            <select class="form-control nice-select wide">
                                <option value="" disabled selected>
                                    How many persons?
                                </option>
                                <option value="">
                                    2
                                </option>
                                <option value="">
                                    3
                                </option>
                                <option value="">
                                    4
                                </option>
                                <option value="">
                                    5
                                </option>
                            </select>
                        </div>
                        <div>
                            <input type="date" class="form-control">
                        </div>
                        <div class="btn_box">
                            <button>
                                Book Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map_container ">
                    <div id="googleMap"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end book section -->

<!-- client section -->

<section class="client_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container heading_center psudo_white_primary mb_45">
            <h2>
                What Says Our Customers
            </h2>
        </div>
        <div class="carousel-wrap row ">
            <div class="owl-carousel client_owl-carousel">
                <div class="item">
                    <div class="box">
                        <div class="detail-box">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                            </p>
                            <h6>
                                Moana Michell
                            </h6>
                            <p>
                                magna aliqua
                            </p>
                        </div>
                        <div class="img-box">
                            <img src="{{ asset('images/website/client1.jpg') }}" alt="" class="box-img">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box">
                        <div class="detail-box">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                            </p>
                            <h6>
                                Mike Hamell
                            </h6>
                            <p>
                                magna aliqua
                            </p>
                        </div>
                        <div class="img-box">
                            <img src="{{ asset('images/website/client1.jpg') }}" alt="" class="box-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="cartModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content " style="border: 5px solid #E39A00">

            <div class="modal-body">
                <button type="button" class="bg-danger rounded-circle border-0 pull-right pl-2 pr-2"
                    data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="row mt-5">
                    <div class="col-sm-6">


                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('website/images/f3.png') }}" class="d-block w-100" alt="" srcset="">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('website/images/f6.png') }}" class="d-block w-100" alt="" srcset="">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('website/images/f1.png') }}" class="d-block w-100" alt="" srcset="">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <b>
                            <h2>Delicious Pizza</h2>
                        </b>
                        <h6>$20</h6>
                        <p>Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem
                            repellendus sed eaque</p>
                        <hr>
                        <h2>Special Instructions</h2>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <div class="row mt-3">
                            <div class="col-sm-6 col-6">
                                <button class="btn btn-outline-danger ">-</button>
                                <span>10</span>
                                <button class="btn btn-outline-danger ">+</button>
                            </div>
                            <div class="col-sm-6 col-6 d-flex ">
                                <button class="btn btn-danger w-100 " id="cartModalBtn">Add to Cart-400</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="adToCartModal" tabindex="-1" role="dialog" aria-labelledby="adToCartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-full-height modal-right" role="document">
    <div class="modal-content" style="height: 100vh; border-radius: 15px 0 0 15px; border: 0;">
      <div class="modal-header">
        <h5 class="modal-title" id="adToCartModalLabel">Your Shopping Cart</h5>
        <button type="button" class="btn btn-outline-danger rounded-circle" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="list-group">
              <!-- Cart Item 1 -->
              <div class="list-group-item d-flex flex-column justify-content-between align-items-center">
              <div class="">
                <div class="d-flex align-items-center">
                  <div class="d-flex flex-column ">
                    <img src="{{ asset('/website/images/f1.png') }}" style="height: 100px; width: 100px;" alt="Item 2" class="mr-3">
                    <p>Price: $20.00</p>
                  </div>
                    <div>
                      <h5 class="mb-1">Item Name 2</h5>
                      <p class="mb-1">Description of item 2.</p>
                      <div class="d-flex align-items-center">
                  
                  <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity('item1', -1)">-</button>
                  <span id="item1" class="mx-2">1</span>
                  <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity('item1', 1)">+</button>
                  <button class="btn btn-danger btn-sm ml-2">Remove</button>
                </div>
                    </div>
                  </div>
                  
                </div>
               
              </div>  
              <!-- Cart Item 2 -->
              <div class="list-group-item d-flex flex-column justify-content-between align-items-center">
              <div class="">
                <div class="d-flex align-items-center">
                  <div class="d-flex flex-column ">
                    <img src="{{ asset('/images/f6.png') }}" style="height: 100px; width: 100px;" alt="Item 2" class="mr-3">
                    <p>Price: $20.00</p>
                  </div>
                    <div>
                      <h5 class="mb-1">Item Name 2</h5>
                      <p class="mb-1">Description of item 2.</p>
                      <div class="d-flex align-items-center">
                  
                  <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity('item2', -1)">-</button>
                  <span id="item2" class="mx-2">1</span>
                  <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity('item2', 1)">+</button>
                  <button class="btn btn-danger btn-sm ml-2">Remove</button>
                </div>
                    </div>
                  </div>
                  
                </div>
               
              </div> 

              <!-- Cart Item 3 -->
              <div class="list-group-item d-flex flex-column justify-content-between align-items-center">
              <div class="">
                <div class="d-flex align-items-center">
                  <div class="d-flex flex-column ">
                    <img src="{{ asset('/images/f6.png') }}" style="height: 100px; width: 100px;" alt="Item 2" class="mr-3">
                    <p>Price: $20.00</p>
                  </div>
                    <div>
                      <h5 class="mb-1">Item Name 3</h5>
                      <p class="mb-1">Description of item 3.</p>
                      <div class="d-flex align-items-center">
                  
                  <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity('item3', -1)">-</button>
                  <span id="item3" class="mx-2">1</span>
                  <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity('item3', 1)">+</button>
                  <button class="btn btn-danger btn-sm ml-2">Remove</button>
                </div>
                    </div>
                  </div>
                  
                </div>
               
              </div> 
            </div>

            <div class="mt-4 d-flex justify-content-between">
              <h4>Total: $45.00</h4>
              <a class="btn-checkout" href="{{ url('/checkout') }}">Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end client section -->

<!-- footer section -->

<!-- footer section -->
 <script>
  $('#cartModalBtn').on('click',function(){
    $('#cartModal').modal('hide');
    $('#adToCartModal').modal('show');
    
  })
  function changeQuantity(itemId, delta) {
    const itemCount = document.getElementById(itemId);
    let currentQuantity = parseInt(itemCount.textContent);

    currentQuantity += delta;

    if (currentQuantity < 1) {
        currentQuantity = 1; // Prevent quantity from going below 1
    }

    itemCount.textContent = currentQuantity;

    // Update total price logic can be added here
}
 </script>

@endsection