@extends('templates.public')
@section('content')

<div class="what-we-do-welcome benefits-welcome">
    <div class="welcome-sec text-center">
        <div class="container">
            <div class="p-5">
                <h4 class="text-white"><b><i>Benefits</i></b> -</h4>
                <h1 class="text-white">
                    It's good to be appreciated
                </h1>
                <br>
                <p class="text-white font-20 pr-5 text-wrap">
                    We extend an array of complimentary services and resources designed to help you make informed
                    investment decisions. In addition, certain asset levels offer you access to an expanded suite of
                    valuable client benefits. Invest now to access our complimentary services.
                </p>
                <br>
                <a href="" class="site-btn-white">Get Started</a>
            </div>
        </div>
    </div>
</div>

<div class="content_section py-5">
    <div class="container">
        <h2 class="text-center mb-5">TIERED CLIENT BENEFITS BASED ON ASSET LEVEL</h2>

        <div class="row">
            <div class="col-lg-6">
                <div class="" style="padding: 100px;">
                    <h3>All Investors</h3>

                    <p>
                        Investors at any level enjoy access to a range of complimentary benefits.
                        <br>
                        <br>
                        Available resources include access to knowledgeable service specialists and proprietary
                        investment
                        content.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="insights-img-section">
                    <div class="insights-top-banner-right"></div>
                    <img src="{{ asset('assets/images/insights/benefits/2.jpg') }}" alt="" class="insights-img-right">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="insights-img-section">
                    <div class="insights-top-banner-right"></div>
                    <img src="{{ asset('assets/images/insights/benefits/3.jpg') }}" alt="" class="insights-img-right">
                </div>

            </div>
            <div class="col-lg-6">
                <div class="" style="padding: 100px;">
                    <h3>Personal Services</h3>

                    <p>
                        Investors with $250k or more in qualifying assets are automatically recognized at the Personal
                        Services level.

                        This program includes an expanded suite of complimentary investment resources, fee waivers, and
                        elevated service to help make managing investments more convenient.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="" style="padding: 100px;">
                    <h3>Enhanced personal services</h3>

                    <p>
                        Investors with $1 million or more in qualifying assets are automatically recognized at the
                        Enhanced
                        Personal Services level.

                        This program features our most comprehensive package of research and complimentary advice
                        resources
                        to help clients make more informed investment decisions.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="insights-img-section">
                    <div class="insights-top-banner-right"></div>
                    <img src="{{ asset('assets/images/insights/benefits/4.jpg') }}" alt="" class="insights-img-right">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content_section py-5">
    <div class="container py-2">
        <div class="row">
            <div class="col-lg-6 p-5">
                <div class="" style="padding: 100px;"></div>
                <h5>Private Asset Management</h5>

                <p>Investors with $1 million or more in assets can choose to have Highresin professionals manage their
                    investment portfolio in a discretionary asset management account according to specified objectives
                    and customized investment management centered on your goals.</p>

                <h6>GET THE HIGH-TOUCH ASSET MANAGEMENT YOU DESERVE.</h6>

                <p>
                    After all, you’ve done to build your wealth, you want a partner to help preserve and grow your
                    assets. Working together, we'll design and manage a custom investment program that is unique to you
                    and your objectives—and integrates with your overall wealth strategy.
                </p>

                <p>Key program features include:</p>
                <ul>
                    <li>Privately managed portfolios tailored to your needs.</li>
                    <li>Global investment resources and personalized boutique service.</li>
                    <li>Access to a wide range of assets and global equities and fixed income securities.</li>
                    <li>Exclusively available for investors with $1 million or more to invest (per account).</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('assets/images/insights/benefits/5.jpg') }}" />
            </div>
        </div>
    </div>
</div>

@endsection