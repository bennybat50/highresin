@extends('templates.public')
@section('content')
<div class="home-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="welcome-sec">
                    <div class="p-5">
                        <h1 class="text-white">
                            WE MAKE YOUR FINANCIAL GOALS A REALITY.
                        </h1>
                        <br>
                        <p class="text-white font-20 pr-5">What ever your longterm financial goals are, <b style="font-family: 'webflow-icons';"> <i>HIGHRESIN</i></b> will alwasy be there to help you reach them.</p>
                        <br>
                        <a href="" class="site-btn-white">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="home-section-1">
    <div class="content-section">
        <div class="container">
            <div class="text-center">
                <h1> <b><i>Explore</i></b> our Business Structure</h1>
                <p>We strive for equality in our workforce and are continuously working to maintain an environment and culture our <br> associates are proud to be a part of.</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="border-column  ">
                        <br>
                        <i class="bi bi-phone-vibrate-fill p-4"></i>
                        <h3 class="p-4">A Fiduciary For You</h3>
                        <div class="vertical-line"></div>

                        <div class="p-4">
                            <p>Not all advisers are equal. Learn about the strict legal standard we follow to keep clients’ interests first. <br><br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border-column ">
                        <br>
                        <i class="bi bi-gift-fill p-4"></i>
                        <h3 class="p-4">Experienced Leadership</h3>
                        <div class="vertical-line"></div>

                        <div class="p-4">
                            <p>Our management team leads by example in putting clients first—in our portfolio management and client service.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border-column ">
                        <br>
                        <i class="bi bi-sun-fill p-4"></i>
                        <h3 class="p-4">Our Client-First Culture</h3>
                        <div class="vertical-line"></div>
                        <div class="p-4">
                            <p>Our culture supports our commitment to provide unparalleled service that puts clients’ interests first.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="content-section">
    <div class="home-section-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <video style="width: 100%; height:100%;" poster="{{ asset('assets/images/icons/play_placeholder.jpg') }}" controls>
                        <source src="{{ asset('assets/images/home/resin.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
                </div>
                <div class="col-md-6">
                    <div class="p-5">
                        <h1 class="text-white"><b><i>About</i></b> us</h1>
                        <p class="text-white">As an asset manager, we take fiduciary responsibility for your portfolio. This means we make investment decisions on your behalf and in accordance with your tailor-made investment guidelines. We always put your best interests first—striving to select the right investments as we seek to achieve your objectives.
                        </p>
                        <br>
                        <h4 class="text-white"> <i class="bi bi-emoji-laughing"></i> <i><b>Happy Clients</b></i> </h4>
                        <p class="text-white">We keep your portfolio on track as we help you manage your portfolio comfortably and confidently through tailored money management, industry-leading client service, illuminating insights, and a fee structure aligned with your goal.
                        </p>
                        <a href="/about-us" class="site-btn-white">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="home-section-2-2">
    <div class="row">
        <div class="col-md-6">
            <div class="content">
                <h1>Environmental, Social and Governance <b><i>(“ESG”)</i></b></h1>
            <p>We believe that Environmental, Social and Governance (“ESG”) considerations directly and materially impact investment outcomes.</p>
            <p>As long-term investors, we believe that a concerted and consistent focus on ESG throughout the investment lifecycle allows us to avoid undue risk and better identify valuable opportunities.</p>

            </div>
             </div>
        <div class="col-md-6">
            <img src="{{ asset('assets/images/esg/esg-img1.jpg') }}" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('assets/images/diversity/di-img1.jpg') }}" alt="">
        </div>
        <div class="col-md-6">
            <div class="content">
                <h1>Diversity & Inclusion </h1>
                <p>HighResin formalized what had been for many years an informal Diversity & Inclusion strategy.
                </p>
                <p>Intended to increase diversity and inclusion at the ﬁrm, focusing on female and underrepresented groups within our investment teams and officer-level positions, through enhanced and improved recruitment, talent development, education and awareness, we are employing a four-pillar strategy to achieve this goal</p>

            </div>
           </div>

    </div>
    <div class="row">
        <div class="col-md-6">
           <div class="content">
            <h1>Sustainable investing </h1>
            <p>Sustainable investing refers to investment approaches that consider the risk and opportunity impacts of ESG (environmental, social, governance) factors on investment returns, or seek to bring about positive societal change through one or more ESG factors. While ESG factors are non-financial, they can have material short-or long-term financial impacts on a company’s performance. Below are some examples of ESG factors:
            </p>
           </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('assets/images/sustainable/sri-card-1280x720_CentreOfExcellence.jpg') }}" alt="">
        </div>
    </div>
</div>


<div class="home-section-3">
    <div class="content-section">
        <div class="container">
            <div class="text-center">
                <h1> How we achieve your  <b><i>goals with you</i></b> </h1>
            </div>
            <br>
            <br>

            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('assets/images/home/goals.jpg') }}" alt="">
                </div>
                <div class="col-md-3">
                 <div class="p-3 content">
                    <h2>Determine your <br> goals.</h2>
                    <p class="font-15">We recognize different people have different financial planning goals. Some want to avoid running out of money in retirement, while others are focused on maintaining their lifestyle or even improving it. Is increasing your wealth important? Have you thought about leaving something to your heirs? Or is it your goal to spend every cent?
                    </p>
                 </div>
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('assets/images/home/income.jpg') }}" alt="">
                </div>
                <div class="col-md-3">
                    <div class="p-3 content">
                        <h2>Understand your income sources and expenses. </h2>
                    <p class="font-15">We drill down into all of your financial and lifestyle information to get a full understanding of where the money is coming from and where it is going.
                    </p>
                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('assets/images/home/investment.jpg') }}" alt="">
                </div>
                <div class="col-md-3 ">
                 <div class="p-3 content">
                    <h2>Determine your investment time horizon.</h2>
                    <p class="font-15">We base our comprehensive calculations on factors such as average life expectancy and family history and use those metrics to help guide our investment recommendations.
                    </p>
                 </div>
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('assets/images/home/plan.jpg') }}" alt="">
                </div>
                <div class="col-md-3">
                    <div class="p-3 content">
                        <h2>Learn how long you plan to work.</h2>
                    <p class="font-15">Some people want to retire early while others look forward to staying at work as long as possible. We talk to you about your plans, including what level of work you might intend to maintain and for how long.
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="section-full">
    <div data-w-id="12718a2b-c43d-1ff3-8b7c-67e44d0da587" class="absolute home-section-4"></div>
    <div data-w-id="eaf38632-a1ae-f587-c079-0708a1353aa3" style="display:block" class="absolute-bg"></div>
    <div class="flex-right">
        <div class="text-container-4">
            <div class="_76-percent-column">
                <div class="left-padding">
                    <h2 data-w-id="12718a2b-c43d-1ff3-8b7c-67e44d0da58d" style="opacity:0" class="no-top-margin"> <b><i>Planning</i></b>
                    </h2>
                </div>
                <div class="top-margin _30-pixels">
                    <p data-w-id="12718a2b-c43d-1ff3-8b7c-67e44d0da590" style="opacity:0">Planning and investing for your goals is one of the most important things you'll do. Feeling good about your future begins with being able to make a plan on your terms, so we have options for how we can work together.
                    </p>
                    <br>
                    <a href="" class="site-btn-dark">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="home-section-5">
    <div class="content-section">
      <div class="container">
          <div class="row">
              <div class="col-md-6">
                  <br>
                  <br>
                  <div class="p-5">
                    <h1 >Regularly Review <br> Your <b><i>Investment Goals</i></b></h1>
                    <p>We won’t establish a plan for you and then let it stay stagnant. We regularly check in with you to see if your goals, objectives, or financial circumstances have changed and evaluate how that might affect your financial planning and if it should be adjusted.
                  </p>
                  </div>
              </div>
              <div class="col-md-6">
                  <img src="{{ asset('assets/images/home/review.jpg') }}" alt="">
              </div>
          </div>
      </div>
    </div>
</div>
<br>
<br>
<br>
<div class="home-section-6">
    <div class="content-section">
      <div class="container">
          <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('assets/images/home/communicate.jpg') }}" alt="" class="mb-5">

            </div>
              <div class="col-md-6">
                  <br>
                  <div class="p-5">
                    <h1 class="text-white" >Evaluate Your Life Changes And <br> <b><i>Communicate</i></b> Appropriate Updates. </h1>
                    <p class="text-white">Life happens and that can affect your financial planning. Our Investment Counselors will regularly provide any updates to our Portfolio Evaluation Group to determine if any changes in your life are material enough to require portfolio adjustment.                    </p>
                  </div>
              </div>

          </div>
      </div>
    </div>
</div>
<br>
<div class="home-section-5">
    <div class="content-section">
      <div class="container">
          <div class="row">
              <div class="col-md-6">
                  <div class="p-3">
                    <h1 >Help You Understand What Is <br> <b><i>Going On In Your Account</i></b> And Why.</h1>
                    <p>We regularly assess your account’s performance and explain to you what factors are at work.
                  </p>
                  <br>
                  <h1 >Quickly Handle Your <br>  <b><i>Day-to-Day Needs</i></b> . </h1>
                    <p>We are here to help whenever you have questions or require financial service.
                    </p>
                  </div>
              </div>
              <div class="col-md-6">
                  <img src="{{ asset('assets/images/home/account.jpg') }}" alt="">
              </div>
          </div>
      </div>
    </div>
</div>

<div class="blog-section">
    <div class="content-section">
        <div class="container">
            <h1 class="text-center">Recent Financial News</h1>
            <hr>
            <div class="row">
                @for ($i = 0; $i < 4; $i++)
                <div class="col-md-3 cols">
                    <a href="{{ $articles[$i]->url }}" target="blank">
                     <img src="{{ $articles[$i]->urlToImage }}" alt="">
                     <small><span><b>Author:</b></span>{{ $articles[$i]->author }}</small><br>
                     <h4>{{ $articles[$i]->title }}</h4>
                     <p class="descp">{{ $articles[$i]->description }}</p>
                     <br>
                     <a href="{{ $articles[$i]->url }}" target="blank" class="learn">Learn More  &#10132;</a>
                    </a>
                 </div>
            @endfor
            </div>
        </div>
    </div>
</div>

<div class="home-section6">
    <div class="content-section">
        <div class="container">
           <div class="row">
               <div class="col-md-7">
                <h1 class="">Answering your frequently-asked questions.</h1>
                <h3 class="">Why Highresin?</h3>

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What’s unique about being a Highresin client?
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body p-3">
                                Being a Highresin client means that you get the benefit of working with our financial professionals, who will partner with you for life. Our clients are also backed by a company with a long history and notable financial strength that’s the type of security and track record you can rely on.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How do I know Highresin has my best interest in mind?
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Highresin is an asset management company. We answer to policy owners not to Wall Street. That means that your interests and our interests are aligned.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                What are the benefits of working with a financial professional versus online?
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                We believe in the value of human guidance. Life insurance, retirement, and financial products can be complex. Our financial professionals are highly trained and have access to the latest tools and resources to guide you throughout your life as your needs change. They will work directly with you to simplify matters and help you achieve your short-term and long-term goals.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Does working with a Highresin financial professional cost me anything?
                              </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                Getting started doesn’t cost anything. Just connect with one of our financial professionals to discuss your needs. Together, you can clarify your financial position, goals, and aspirations and co-create a plan to ensure you’re prepared for whatever life may bring. Our financial professionals can give you a good sense of how much various solutions cost, so you can make the best decisions for you.
                              </div>
                            </div>
                          </div>

                </div>
               </div>
           </div>
        </div>
    </div>
</div>
<br>
<br>

<script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>

<script>
    var images = ["assets\/images\/home\/slide1.png", "assets\/images\/home\/slide2.jpg",,"assets\/images\/home\/slide3.jpg"];
    var nextimage = 0;

    doSlideshow();

    function doSlideshow() {
        if ($('.slideshowimage').length != 0) {
            $('.slideshowimage').fadeOut(500, function() {
                slideshowFadeIn();
                $(this).remove()
            });
        } else {
            slideshowFadeIn();
        }
    }

    function slideshowFadeIn() {
        $('.home-sec').prepend($('<img class="slideshowimage" src="' + images[nextimage++] +
            '" style="display:none">').fadeIn(2000, function() {
            setTimeout(doSlideshow, 2000);
        }));
        if (nextimage >= images.length)
            nextimage = 0;
    }
</script>
<script>
    $('.subtitle').hide();

    $('.toggle').click(function() {
        $(this).find('.subtitle').toggle()
    })

</script>
@endsection
