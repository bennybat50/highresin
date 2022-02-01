@extends('templates.public')
@section('content')
<div class="sustain-welcome ">
    <div class="welcome-sec text-center">
        <div class="container">
            <div class="p-5">
                <h1 class="text-white"><b><i>Sustainable investing</i></b> -</h1>
            </div>
        </div>
    </div>
</div>
<div class="sustain-sections">
    <div class="section1">
        <div class="content-section">
            <div class="container">
                <div class="p-4">
                    <h3>Sustainable investing refers to investment approaches that consider the risk and opportunity impacts of ESG (environmental, social, governance) factors on investment returns, or seek to bring about positive societal change through one or more ESG factors.
                        While ESG factors are non-financial, they can have material short-or long-term financial impacts on a company’s performance.
                        Below are some examples of ESG factors:</h3>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="sus-card">
                            <img src="{{ asset('assets/images/sustainable/environmental.jpg') }}" alt="">
                            <div class="p-2">
                                <h2>Environmental</h2>
                                <ul>
                                    <li>Climate change and carbon emissions</li>
                                    <li>Energy efficiency</li>
                                    <li>Pollution/air quality</li>
                                    <li>Clean energy and technologies</li>
                                    <li>Use of natural resources</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sus-card">
                            <img src="{{ asset('assets/images/sustainable/social.jpg') }}" alt="">
                            <div class="p-2">
                                <h2>Social</h2>
                                <ul>
                                    <li>Labour relations</li>
                                    <li>Diversity agenda</li>
                                    <li>Workplace health and wellness</li>
                                    <li>Community relations and investment</li>
                                    <li>Child labour</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sus-card">
                            <img src="{{ asset('assets/images/sustainable/governance.jpg') }}" alt="">
                            <div class="p-2">
                                <h2>Governance</h2>
                                <ul>
                                    <li>Board oversight and diversity</li>
                                    <li>Cultural tone from the top</li>
                                    <li>Corruption and bribery</li>
                                    <li>Business ethics</li>
                                    <li>Cartels and price fixing</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section2">
        <div class="container">
            <h1 class="text-center">The history of sustainable investing</h1>
            <p>The first sustainable investing mutual fund was launched by Pax World Management in the US over 50 years ago. Growth of sustainable investments was fairly slow for the first few decades, but it started to take off in 2016, soon after the signing of the Paris Climate Agreement. According to Opimas, all investment funds targeting ESG performance grew from around $29.3 trillion asset under management (AUM) in 2016 to $51.2 trillion in 2020. Below is a history of key events that led to the development of sustainable investing. </p>
            <br>
            <br>
            <h1 class="text-center">Types of sustainable investing </h1>
            <p>There are different investing styles under the sustainable investing umbrella. At the more moderate end of the spectrum is the use of ESG factors to assess risk and enhance risk-adjusted returns by avoiding companies that have low ESG scores. At the other end is Impact investing, whose principal goal is to bring about some form of positive societal impact while also delivering attractive returns. </p>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="sus-card">
                        <h2>Responsible investing</h2>
                        <p>ESG practices as a part of the investment process to mitigate risk.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="sus-card">
                        <h2>Best-in-class ESG investing</h2>
                        <p>Proactive, ­positive ESG practices and behaviours that are designed to improve companies’ ESG performance and enhance overall value.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="sus-card">
                        <h2>Thematic investing</h2>
                        <p>Invests in ESG macro-trends that drive capital allocation to specific segments of the market.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="sus-card">
                        <h2>Impact investing</h2>
                        <p>Targets ESG challenges (or opportunities) while generating financial return and measurable social/environmental improvements.</p>
                    </div>
                </div>
            </div>
            <p>It’s important to note that these investing styles are not necessarily mutually exclusive. Goals and methodologies can overlap. </p>
        </div>
    </div>
    <div class="section3-3">
        <div class="content-section">
            <div class="container">
                <div class="text-center">
                    <h1>Our world is facing unprecedented challenges </h1>
                    <p>Climate change, poverty, systemic racism and inequality are huge issues identified by the United Nations, which we can all play a part in helping to resolve.</p>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="sus-card">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ asset('assets/images/sustainable/poverty.png') }}" alt="">
                                </div>
                                <div class="col-6">
                                    <h1>700M+</h1>
                                </div>
                            </div>
                            <p> More than 700 million people live in poverty</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sus-card">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ asset('assets/images/sustainable/abuse.png') }}" alt="">
                                </div>
                                <div class="col-6">
                                    <h1>1 in 3</h1>
                                </div>
                            </div>
                            <p> One in three women have experienced sexual or physical abuse</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sus-card">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ asset('assets/images/sustainable/co2emissions.png') }}" alt="">
                                </div>
                                <div class="col-6">
                                    <h1>CO2</h1>
                                </div>
                            </div>
                            <p> CO2 emissions have more than doubled since 1990</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="sus-card">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ asset('assets/images/sustainable/climatechange.png') }}" alt="">
                                </div>
                                <div class="col-6">
                                    <h1>Climate Change</h1>
                                </div>
                            </div>
                            <p> Climate change is considered the greatest threat to global security</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sus-card">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ asset('assets/images/sustainable/waterscarcity.png') }}" alt="">
                                </div>
                                <div class="col-6">
                                    <h1>40%</h1>
                                </div>
                            </div>
                            <p> Water scarcity affects more than 40% of the population</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sus-card">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ asset('assets/images/sustainable/cookingfuel.png') }}" alt="">
                                </div>
                                <div class="col-6">
                                    <h1>3B+</h1>
                                </div>
                            </div>
                            <p> Three billion people don’t have access to clean cooking fuels and technologies</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section4">
        <div class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="sus-card">
                            <img src="{{ asset('assets/images/sustainable/SocialIssues.jpg') }}" alt="">
                            <div class="content">
                                <h1>2020 call to action</h1>
                                <p>The COVID-19 pandemic and the Black Lives Matter movement brought social and environmental issues to the forefront. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sus-card">
                            <img src="{{ asset('assets/images/sustainable/InvestorInterest.jpg') }}" alt="">
                            <div class="content">
                                <h1>Investors interested in climate change</h1>
                                <p>Seventy-five per cent of investors are interested in discussing responsible investing with their advisor, yet only 28% of them are having those conversations. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sus-card">
                            <img src="{{ asset('assets/images/sustainable/NoSacrificingReturns.jpg') }}" alt="">
                            <div class="content">
                                <h1>Investing sustainably doesn’t mean sacrificing returns</h1>
                                <p>In the last few years, sustainable investments have generally outperformed their traditional counterparts.9 Morningstar estimates that investment in sustainable funds and ETFs grew by an impressive 67% in 2020.8 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section5">
        <div class="content-section">
            <div class="container">
                <div class="row">

                    <h1 class="text-center">Making sustainable investing a reality </h1>
                    <div class="p-5">
                        <p>The gap between the number of investors who hold sustainable investments and those who are interested in them is far too wide. That’s why we’re on a mission to make it easy for institutions, advisors and investors to integrate these solutions into their portfolios.</p>
                        <p>We aspire to create a more invested world, sustainably. As a leading Canadian asset manager, we focus on protecting and creating value for our stakeholders – our clients, our employees, our shareholders, our communities and our planet by building sustainability into Highresin’s culture, corporate practices, and investment decisions we make.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/sustainable/Innovation.jpg') }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="content">
                                <h1>Innovation that brings real change</h1>
                            <p>We believe innovation is at the heart of sustainable investing. Our solutions are designed to bring about real change, whether it’s in promoting better ESG practices, playing a part in the fight against global warming with innovative green technologies, or bringing about a more equal and inclusive workplace.</p>

                            </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="content">
                                <h1>Real sustainable investing made simple</h1>
                                <p>The growing number of sustainable investing products available to Canadians can be overwhelming. Our goals are to simplify sustainable investing and be transparent regarding the companies we invest in, while offering solutions that focus on a variety of causes and values that interest investors.</p>

                            </div>
                           </div>
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/sustainable/Simplicity.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/sustainable/Conviction.jpg') }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="content">
                                <h1>Pioneering teams with real conviction </h1>
                            <p>Our teams include pioneers who have decades of experience in sustainable investing, putting us in a better position to measure a business’s sustainability, earnings, and risk and return potential. We believe that more diverse companies tend to have improved business practices and deliver superior returns. </p>

                            </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="section7">
        <div class="content-section">
            <div class="container">
                <h1 class="text-center">Our sustainable solutions</h1>
                <p class="text-center">We deliver solutions for each of the categories in the sustainable investing spectrum :</p>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="row sus-card">
                            <div class="col-4">
                                <img src="{{ asset('assets/images/sustainable/bestinclass.png') }}" alt="">
                            </div>
                            <div class="col-8">
                                <h1>Sustainable Core</h1>
                            </div>
                            <ul>
                                <li>Highresin Sustainable Balanced Fund</li>
                                <li>Highresin Sustainable Bond Fund</li>
                                <li>*NEW* Highresin Sustainable Bond ETF</li>
                                <li>*NEW* Highresin Betterworld Canadian Equity Fund</li>
                                <li>*NEW* Highresin Betterworld Global Equity Fund</li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="row sus-card">
                            <div class="col-4">
                                <img src="{{ asset('assets/images/sustainable/thematicinvesting.png') }}" alt="">
                            </div>
                            <div class="col-8">
                                <h1>Sustainable Thematic</h1>
                            </div>
                            <ul>
                                <li>Highresin Global Environmental All Cap Fund</li>
                                <li>Highresin Global Environmental Balanced Fund</li>
                                <li>*NEW* Highresin Green Bond Fund</li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="row sus-card">
                            <div class="col-4">
                                <img src="{{ asset('assets/images/sustainable/impactinvesting.png') }}" alt="">
                            </div>
                            <div class="col-8">
                                <h1>Sustainable Impact</h1>
                            </div>
                            <ul>
                                <li>Highresin Women's Leadership Fund</li>
                                <li>Highresin Women’s Leadership ETF</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section8">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('assets/images/sustainable/1639062139397.png') }}" alt="">
                </div>
                <div class="col-md-6">
                    <h1>Compare, contrast, build</h1>
                    <p>Use Precision analytics to compare strengths of various funds and find the right one for your client.</p>
                </div>
                <div class="col-md-3">
                    <br>
                    <br>
                    <a href="#" class="btn-reg">Register Now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="section10">
        <div class="content-section">
            <div class="container">
                <h1 class="text-center">Sustainability Centre of Excellence</h1>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('assets/images/sustainable/sri-card-1280x720_CentreOfExcellence.jpg') }}" alt="">
                    </div>
                    <div class="col-md-6">
                      <div class="content-1">
                        <h1>Our sustainability team and principles</h1>
                        <p>Established in 2020 to develop sustainable investing products, ESG research and advocacy, and corporate stewardship.</p>
                      </div>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <h1>Sustainable investing education</h1>
                <p>Why sustainable investing, why now: Insights and courses to make sustainable investing easier to understand </p>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="sus-card">
                            <h2>Invest to Drive Change – Comprehensive Suite</h2>
                            <p>An all-encompassing look at our suite of sustainable investing products, which are designed to bring about real change.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sus-card">
                            <h2>Sustainable Investing Explained</h2>
                            <p>ESG breakdown and the history of sustainable investing.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sus-card">
                            <h2>Our principles and designing an ESG reflective product shelf</h2>
                            <p>Fate Saghir, head of sustainable investing, discusses how to design a product shelf to incorporate ESG factors and why Europe is ahead of most of the world within this space..</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="sus-card">
                            <h2>Sustainable investing - fad or forever: Client infographic</h2>
                            <p>Busting myths around sustainable investing.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sus-card">
                            <h2>CE accredited courses</h2>
                            <p>You can learn more about sustainable investing by taking our CE accredited course.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sus-card">
                            <h2>Paving the way for the great energy transition</h2>
                            <p>John Cook, portfolio manager of the Highresin Environmental Equity Fund, discusses how the pandemic has shaped the future of renewable energy.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
