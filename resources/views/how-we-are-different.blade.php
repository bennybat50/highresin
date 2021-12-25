@extends('templates.public')
@section('content')

<div class="what-we-do-welcome how_we_are_diff_welcome">
    <div class="welcome-sec text-center">
        <div class="container">
            <div class="p-5">
                <h4 class="text-white"><b><i>How we are different</i></b> -</h4>
                <h1 class="text-white">
                    How we are different
                </h1>
                <br>
                <p class="text-white font-20 pr-5">
                    For over 6 years, Highresin has worked in our clients’ best interests by thinking and acting
                    independently rather than following outdated industry practices. Our personalized approach, our
                    total commitment to serving our clients and our investing experience make us unique in our industry.
                    That’s why Highresin currently manages $15 million for investors worldwide and helps over 9,000
                    clients meet their financial goals.
                </p>
                <br>
                <a href="" class="site-btn-white">Get Started</a>
            </div>
        </div>
    </div>
</div>

<div class="content_section py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="diff_box">
                    <h4 class="b-bottom p-4">Advice that is always in your best interest</h4>

                    <p class="p-4 fs-5">
                        As a fiduciary, we always put your interests first—and we’ve designed our entire business to
                        keep it
                        this way. Unlike some money managers, we have no incentives to sell you commission-based
                        financial
                        products or place trades in your account when it’s not best for you. Our simple fee structure
                        aligns
                        your interests with our business goals. Simply put, when you do better we do better.
                    </p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="diff_box">
                    <h4 class="b-bottom p-4">A portofolio tailored to your needs</h4>

                    <p class="p-4 fs-5">
                        We respect how hard you worked to build your nest egg, and before we recommend anything, we get
                        to
                        know you. We ask questions about your goals and needs, your expenses, your health, your family
                        commitments and more—to better understand what you need your money to accomplish. This enables
                        us to
                        recommend a personalized portfolio designed to meet your needs and to help you enjoy the
                        retirement
                        you’ve earned.
                    </p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="diff_box">
                    <h4 class="b-bottom p-4">Commuunication and Counsel to help you stay on track</h4>

                    <p class="p-4 fs-5">
                        You will receive a personal point of contact with your Investment Counselor committed to
                        understanding you on a personal level and keeping your financial plan on track. Your Investment
                        Counselor will be there for you, whether you want to know how your portfolio is doing and why,
                        or
                        whether you want guidance when the ups and downs of the stock market rattle your nerves. Your
                        Investment Counselor will keep in touch in all market conditions and won’t be afraid to give you
                        an
                        occasional dose of tough love to help you stay disciplined to your long-term plan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content_section py-5" style="background: #004078;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="" style="padding: 100px;">
                    <h4 class="text-white fs-2 fw-bold mb-4"> <i>Disciplined and active portfolio management</i></h4>

                    <p class="fs-5 text-white">
                        We’re more than just stock pickers. We believe active portfolio management centred on your
                        long-term
                        goals is the best way to discover opportunities and achieve long-term results. Our five-person
                        Investment Policy Committee, supported by large in-house research staff, analyzes global
                        investing
                        opportunities—narrowing down from country and sector to find securities they think will do well
                        moving forward. This disciplined approach allows us to interpret information differently and
                        find
                        global investment opportunities other money managers may overlook.
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <img src="{{ asset('assets/images/insights/how_we_diff/2.jpg') }}" style="border-radius: 30px; height: 420px;" />
            </div>
        </div>

        <div class="row mt-5 pt-5">
            <div class="col-lg-6">
                <img src="{{ asset('assets/images/insights/how_we_diff/3.jpg') }}" style="border-radius: 30px;" />
            </div>
            <div class="col-lg-6">
                <div class="" style="padding: 100px;">
                    <h4 class="text-white fs-2 fw-bold mb-4"> <i>TRANSPARENCY</i></h4>

                    <p class="fs-5 text-white">
                        You deserve to know what we’re doing with your money. That’s why we’re transparent about the
                        investment decisions we make for your portfolio. Whether you’re someone who wants to dig into
                        the
                        details of your portfolio or you want to be more hands-off, we provide a variety of resources to
                        get
                        you the information you need, when you need it—all to make sure you’re comfortable with our
                        investing approach.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection