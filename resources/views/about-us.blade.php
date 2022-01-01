@extends('templates.public')
@section('content')

<style>


</style>

<div class="about-us-welcome">
    <div class="welcome-sec text-center">
        <div class="container">
            <h4 class="text-white"><b><i>About HighResin</i></b> -</h4>
            <h1 class="text-white">
                About Us
            </h1>
            <br>
            <p class="text-white font-20 pr-5">We power success across the financial world for <br> individuals and institutions through unique insights, thinking and actions.
            </p>
            <br>
            <a href="" class="site-btn-white">Get Started</a>
        </div>
    </div>
</div>


<div class="about-sections">
    <div class="top-section">
        <div class="container">
           <div class="p-5">
            <div class="row">
                <div class="col-md-4 text-center">
                    <h1>2011</h1>
                    <p>Firm Founded</p>
                    <div class="small-line"></div>
                </div>
                <div class="col-md-4 text-center">
                    <h1>$15 B</h1>
                    <p>Assets under management</p>
                    <div class="small-line"></div>
                </div>
                <div class="col-md-4 text-center">
                    <h1>1,000 +</h1>
                    <p>Employees</p>
                    <div class="small-line"></div>
                </div>
            </div>
           </div>
        </div>
    </div>
    <div class="about-what-we-do-sections">
        <div class="section1 mb-5">
                <div class="container">

                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/about/purpose.jpg') }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="p-5">
                                <h1><b>A LEGACY OF <b><i>PURPOSE</i></b>.</b></h1>
                                <hr>
                                <h4><i><b>We work every day to do right by our clients, so they <br> can invest confidently toward their financial futures.</b></i></h4>
                                <p>HighResin Group is a global asset management organization with over $15 billion in assets under management as of February 28, 2021. The organization provides a broad array of asset classes, mutual funds, sub-advisory services, and separate account management for individual and institutional investors, retirement plans, and financial intermediaries. </p>
                                <p>HighResin also offers sophisticated investment planning and guidance tools. A disciplined, risk-aware investment approach focuses on diversification, style consistency, and fundamental research.

                                </p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section1">
        <div class="tri-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-5 content">
                            <h1 class="text-white"><b><i>Our</i></b> History</h1>
                            <p class="text-white">Highresin story is about new ideas, innovative thinking and growth through collaboration.
                                From our humble beginnings in 2011 our founders set out to create better asset management firm “with a reputation for the highest character and the soundest investment philosophy.”
                                While managing discretionary assets with a fundamental belief in capitalism and free capital markets. We start with the simple notion that supply and demand are the sole determinants of securities pricing. In addition, we believe capital markets are relatively efficient discounters of all widely known information.
                                <br><br> Thus, to add value through active management, one must identify information not widely known or interpret widely known information differently—and correctly—from other market participants. Throughout Highresin history, we have continuously developed ways to look at the market differently.

                                In addition, we have dedicated significant resources to the emerging field of behavioral finance to better understand not just the tools of finance, but also how investors use these tools. Our research has led us to develop practical applications of behavioral finance in our portfolio management process.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('assets/images/about/history.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div id="triangle-topleft" class="triangle">

        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="section2">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <br>

                    <div class="p-4">
                        <h1>Why <b><i>Highresin</i></b></h1>
                    <p>Highresin’s portfolio managers immerse themselves in each business with relentless focus. Gaining great insights—using people and technology—they are able to respond to the market quickly. Highresin's unique investment approach provides the benefits that help you our clients invest with confidence.</p>

                    </div>
                     </div>

                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/about/market.jpg') }}" alt="">
                        </div>
                        <div class="col-md-8">
                            <h3>Highresin brings choice</h3>
                            <p>Highresin offers choice with a wide spectrum of assets that span asset class, investment style, market size, themes, and specialized markets. Our portfolio managers are able to use their experience and skill, and the current market environment, to select investments that help minimize portfolio risk and create the potential to outperform.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/about/client.jpg') }}" alt="">
                        </div>
                        <div class="col-md-8">
                            <h3>Relentlessly Client-Focused</h3>
                            <p>We know it’s not enough to say we’re relentlessly client-focused—so we prove it every day, through adaptability, ingenuity and technology. It’s how we can proactively respond to environmental, social and governance developments, all while providing peerless client experiences. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section3">
        <div class="container">
            <div class="text-center p-5">
                <h1 class="text-dark">Assets Under Management (AUM)1</h1>
                <small><i>$ in billions</i></small>
                <br>
                <img src="{{ asset('assets/images/about/chart1.PNG') }}" alt="">
            </div>
        </div>
    </div>
    <div class="section4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-right">
                    <br>
                    <br>
                    <img src="{{ asset('assets/images/about/mission.jpg') }}" alt="">
                </div>
                <div class="col-md-6">
                     <br>
                     <br>
                    <div class="p-5">
                        <h1><b><i>Mission</i></b> and <b><i>Values</i></b></h1>
                   <hr>
                    <h3><b>Highresin Mission</b></h3>
                    <p>Highresin is a global firm committed to excellence in investment management and client service. Grounded in family values, Highresin provides its associates a challenging environment with the opportunity for personal and professional growth.</p>
                    <br>
                    <h3><b>Highresin Values</b></h3>
                    <ul>
                        <li>We communicate openly and honestly, providing ongoing and constructive feedback.</li>
                        <li>We think and act like owners, continually enhancing value for all associates, clients and shareholders.</li>
                        <li>We are committed to excellence, focusing on superior execution and continuous improvement.</li>
                        <li>We operate with trust and integrity, and treat each other with care and mutual respect.</li>
                        <li>We are client driven and committed to exceeding clients' needs and expectations.</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
     <br>
    <div class="section5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>CHOOSING <i><b>HIGHRESIN</b></i></h1>
                    <hr>
                    <p>Dedicated to innovation to help you reach your financial goals, Highresin offers more choices, building upon our rich asset management history and global network of research professionals.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h3>How we can work <br> together</h3>
                    <p>Planning and investing for your goals is one of the most important things you'll do. Feeling good about your future begins with being able to make a plan on your terms, so we have options for how we can work together.</p>
                </div>
                <div class="col-md-4">
                    <h3>Proving what it means to <br> put value first</h3>
                    <p>At Highresin, we're committed to giving you value you can't find anywhere else. That's why we introduced zero expense ratio index mutual funds. We also offer affordable minimum investment, 24/7 live customer service. Now that's value.</p>
                </div>
                <div class="col-md-4">
                    <h3>How We Tailor  Your <br> Portfolio</h3>
                    <p>No one-size-fits-all portfolios here. Investment success is personal. Discover how we build portfolios tailored to each client’s situation and financial goals, and learn how we can do the same for you.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section6">
        <div class="tri-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('assets/images/about/portfolio.jpg') }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="p-5 content">
                            <h1>Steps to Building Your <br> <b><i>Personalized Portfolio</i></b></h1>
                            <hr>
                           <ul>
                               <li><b>We Get to Know You -</b>You talk to us about your financial goals and your unique situation.</li>
                               <li><b>Comprehensive Portfolio Analysis - </b>You receive a detailed analysis of your current portfolio.</li>
                               <li><b>Portfolio Recommendation -</b>We review our recommendation with you to ensure you are comfortable with the plan.</li>
                               <li><b>Strategy Implementation - </b>Highly skilled trading and implementation teams put our strategy to work in your accounts.</li>
                               <li><b>Ongoing Service - </b>You and your Investment Counselor regularly discuss your portfolio and your ongoing needs.</li>
                               <li><b>Your net worth - </b>Everything you need to know about building your net worth your Investment Counselor can guide you.</li>
                           </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div id="triangle-topright" class="triangle2">

        </div>
    </div>
</div>
<div class="about-what-we-do-sections">
    <div class="section2">
        <div class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{asset('assets/images/about/capabilities.jpg') }}" alt="">
                        <br>
                        <br>
                        <h2>INVESTMENT <b><i>CAPABILITIES</i></b></h2>
                        <hr>
                        <p><b><i>Expertise across all asset classes and the globe.</i></b></p>
                        <p>As global investment manager, we actively listen, anticipate, and develop strategies that respond to the needs of our clients. Clients rely on our active management approach, which we call strategic investing, and our broad range of equity, fixed income, and multi-asset investment capabilities. </p>

                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <img src="{{asset('assets/images/about/approach.jpg') }}" alt="">
                        <br>
                        <br>
                        <h2>INVESTMENT <b><i>APPROACH</i></b></h2>
                        <hr>
                        <p><b><i>Strategic investing means that we don’t stop at surface-level analysis.</i></b></p>
                        <p>We believe in strategic investing. It has guided how we do business for more than 10 years, and it’s driven by independent thinking and rigorous research. So our clients can be confident that we’ll strive to select the right investments as we help them achieve their objectives.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section3">
        <div class="section-full">
            <div data-w-id="12718a2b-c43d-1ff3-8b7c-67e44d0da587" class="absolute section-bg"></div>
            <div data-w-id="eaf38632-a1ae-f587-c079-0708a1353aa3" style="display:block" class="absolute-bg"></div>
            <div class="flex-left">
                <div class="text-container-4">
                    <div class="_76-percent-column">
                        <div class="left-padding">
                            <h2 data-w-id="12718a2b-c43d-1ff3-8b7c-67e44d0da58d"  class="no-top-margin"> <b><i>OUR CULTURE</i></b>
                            </h2>
                            <hr>
                        </div>
                        <div class="top-margin _30-pixels">
                            <p data-w-id="12718a2b-c43d-1ff3-8b7c-67e44d0da590" >The culture of Highresin is built and sustained by our values.
                                Different perspectives, opinions, and experiences are encouraged to yield the best outcomes for our clients and the firm.
                                We also celebrate the unique experiences of our associates and foster their commitment to the communities where they work and live.
                                We believe in the long-term success of our clients, our associates, and the firm.When you work with dedicated professionals who care about your well-being,
                                 it can give you confidence and peace of mind.Our culture supports our commitment to provide unparalleled service that puts clients’ interests first.
                            </p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section4">
        <div class="content-section">
            <div class="container">
                <div class="text-center">
                    <h1>How we <b><i>Do Things</i></b></h1>
                </div>
                <div class="row">
                    <div class="col-md-6">

                            <h3 class="p-4"><b>Putting Clients First</b></h3>
                            <hr>
                            <div class="p-4">
                                <p>We do things differently than other investment firms—not just to be different, but because it makes a difference for our clients. We designed our entire business to minimize conflicts of interest. We have a strong division of labour between our sales and service roles, allowing employees in each role to focus on their strengths.
                                    At Highresin, our client service is wholly focused on providing superior service, with no additional sales. This clear focus on servicing our clients is what makes Highresin a better place to work, too.
                                </p>

                        </div>
                    </div>
                    <div class="col-md-6 ">

                            <h3 class="p-4"><b>Diversity and Inclusion</b></h3>
                            <hr>
                            <div class="p-4">
                                <p>Everyone is welcome at Highresin. We value diverse perspectives and encourage innovation and forward-thinking. <br> We seek those who aren’t afraid to try something different and are open to considering new processes and approaches.
                                  <br>  That’s why we hire people from different backgrounds, with different points of view, and why 49% of employees are led by women.
                                </p>

                        </div>
                    </div>
                    <div class="col-md-6 ">

                            <h3 class="p-4"><b>Opportunity</b></h3>
                           <hr>
                            <div class="p-4">
                                <p>Our employees drive our firm’s success, and we support their development by providing opportunities for everyone to succeed. We hire and promote employees based on their merit, potential and “will-do” attitude.
                                    Each employee is empowered to achieve excellence as they grow a lifelong Highresin career. While everyone forges their own unique path at Highresin, we are all on a journey together—a journey to better the investment universe.
                                </p>

                        </div>
                    </div>
                    <div class="col-md-6 ">

                            <h3 class="p-4"><b>Recognition</b></h3>
                           <hr>
                            <div class="p-4">
                                <p>Hard work and dedication are recognized and rewarded at Highresin <br> because our employees’ contributions are what make our success possible.
                                  <br>  We celebrate wins of all sizes and make sure each employee’s great work does not go unnoticed. <br> Authentic recognition is the norm across every level, role, department and country to encourage and reinforce our values.
                                </p>

                        </div>
                    </div>
                    <div class="col-md-12 ">

                            <h3 class="p-4"><b>Support</b></h3>
                           <hr>
                            <div class="p-4">
                                <p>We support each other. In our open office environment, everyone from entry-level employees to VPs shares the same space and is treated as an equal. Teams are motivated to collaborate on projects and interact without physical or organizational barriers.
                                    Our customized development programs and award-winning training help employees excel in their current roles while gaining new skills to prepare for their next one. To support employees’ health, wellness and family life, we offer a robust benefits package and on-site services that help make employees’ busy lives a little easier. At Highresin we have each other's backs.
                                </p>
                            </div>

                    </div>

                </div>
                <br>
                <br>
                <br>

               </div>
        </div>
    </div>
</div>
@endsection
