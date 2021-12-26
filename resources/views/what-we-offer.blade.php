@extends('templates.public')
@section('content')

<div class="what-we-do-welcome what-we-offer-welcome">
    <div class="welcome-sec text-center">
        <div class="container">
            <div class="p-5">
                <h4 class="text-white"><b><i>Client Programs</i></b> -</h4>
                <h1 class="text-white">
                    What We Offer
                </h1>
                <br>
                <p class="text-white font-20 pr-5">
                    From wellness coverage to saving for retirement to tuition assistance, we have you covered.
                </p>
                <br>
                <a href="" class="site-btn-white">Get Started</a>
            </div>
        </div>
    </div>
</div>

<div class="content_section py-5">
    <div class="container py-5">
        <div class="row justify-content-evenly text-center">
            <div class="col-lg-2 mb-3">
                <div class="offer_pills p-3">
                    <h6>Savings and retirement</h6>
                </div>
            </div>

            <div class="col-lg-2 mb-3">
                <div class="offer_pills p-3" >
                    <h6>Wellness</h6>
                </div>
            </div>

            <div class="col-lg-2 mb-3">
                <div class="offer_pills p-3" >
                    <h6>Education</h6>
                </div>
            </div>

            <div class="col-lg-2 mb-3">
                <div class="offer_pills p-3">
                    <h6>Recreation</h6>
                </div>
            </div>

            <div class="col-lg-2 mb-3">
                <div class="offer_pills p-3" >
                    <h6>Bonus</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content_section py-5" style="background: #1a7bb7;">
    <div class="container py-5">
        <div class="row text-center">
            <h4 class="fs-2 mb-4" style="color: #f5325c;"> What services do we provide?</h4>

            <p class="text-white fs-5">
                We provide a tailored approach to investment management and financial planning that always puts clients
                first. This starts with a comprehensive assessment of your personal situation that informs your
                investment strategy and even considers important factors outside of your portfolio. If you own an
                annuity, Highresin can analyze it and help you determine if it makes sense as a long-term investment for
                you. The result is a highly personalized approach consistent with your goals and needs.
            </p>
        </div>
    </div>
</div>

<div class="content_section">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ asset('assets/images/insights/what_we_offer/2.jpg') }}" />
        </div>
        <div class="col-lg-6">
            <div class="" style="padding: 100px;">
                <h6 class="fs-3 mb-4">
                    Portfolio Management
                </h6>
                <p class="fs-5">
                    We don’t sell <i style="color: #1a7bb7;"><b>cookie-cutter</b></i> portfolios. We take the time to understand your individual goals and
                    needs and build a tailored portfolio to help you meet your objectives. And we regularly check in on
                    anything that may have changed.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="content_section">
    <div class="row">
        <div class="col-lg-6">
            <div class="" style="padding: 100px;">
                <h6 class="fs-3 mb-4">
                    Fixed Income
                </h6>
                <p class="fs-5">
                    Our Fixed Income teams provide active asset management solutions to help clients meet their
                    <i style="color: #1a7bb7;"><b>investment objectives</b></i>. From core and multi-sector investing to more focused mandates, we offer
                    innovative and differentiated techniques expressly designed to support our clients as they navigate
                    each unique economic cycle. The capabilities of these teams are available through individual
                    strategies or combined in custom-blended solutions.
                </p>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('assets/images/insights/what_we_offer/3.jpg') }}" />
        </div>
    </div>
</div>

<div class="content_section">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ asset('assets/images/insights/what_we_offer/4.jpg') }}" />
        </div>
        <div class="col-lg-6">
            <div class="" style="padding: 100px;">
                <h6 class="fs-3 mb-4">
                    Financial Planning
                </h6>
                <p class="fs-5">
                    Unlike many firms that use complex financial plans to sell you pre-packaged, commission-based
                    products, we give thorough attention to your <i style="color: #1a7bb7;"><b>comprehensive</b></i> financial needs to determine the best
                    recommendation for you.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="content_section">
    <div class="row">
        <div class="col-lg-6 p-5">
            <div class="" style="padding: 100px;">
                <h6 class="fs-3 mb-4">
                    Annuity Assessment
                </h6>
                <p class="fs-5">
                    We often see clients who were sold an annuity that does not meet their greater <i style="color: #1a7bb7;"><b>financial goals</b></i>.
                    Often there’s a better way. We will review your annuity contract in detail to help you determine
                    whether or not it’s right for you.
                </p>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('assets/images/insights/what_we_offer/5.jpg') }}" />
        </div>
    </div>
</div>

<div class="content_section py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 p-4">
                <h6 class="fs-3">Tailored Portfolio</h6>
                <p class="fs-5">Much like a tailor who alters the hem, sleeves, and collar of a suit to fit an
                    individual's
                    proportions, we take a variety of factors into account to create a portfolio tailored to your needs.
                    Some of the factors we may consider when choosing the optimal long-term investment strategy and
                    near-term portfolio tactics include:</p>

                <ul class="fs-5">
                    <li>TimeHorizon – How long do you expect or need your money to be working toward your objectives?
                    </li>
                    <li>Investment Goals – What portfolio value and cash flows do you wish to target over your time
                        horizon?</li>
                    <li>Income Needs – How can we best manage your portfolio to accommodate your cash flow needs?</li>
                    <li>Tax Considerations – How can we manage your portfolio to minimize the impact of capital gains?
                    </li>
                    <li>Outside Assets – Are there assets we don't manage for you but should consider when constructing
                        your portfolio?</li>
                    <li>Outside Income – Do you receive cash flow from sources other than your portfolio?</li>
                    <li>Restrictions or Customizations – What other personal needs or desires should we consider?</li>
                </ul>

                <p class="fs-5">
                    Our dedicated Portfolio Evaluation Group, under the guidance of our Investment Policy Committee,
                    will use this information to provide you with written personalized portfolio analysis and investment
                    strategy recommendation. As your circumstances change, your portfolio needs may too. Your personal
                    Investment Counselor will regularly review your individual situation with you and keep you abreast
                    of our views on capital markets and important developments related to your portfolio.
                </p>
            </div>
            <div class="col-lg-4">
                <img src="{{ asset('assets/images/insights/what_we_offer/6.jpg') }}" />
            </div>
        </div>
    </div>
</div>

@endsection