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
                <p>The first sustainable investing mutual fund was launched by Pax World Management in the US over 50 years ago. Growth of sustainable investments was fairly slow for the first few decades, but it started to take off in 2016, soon after the signing of the Paris Climate Agreement. According to Opimas, all investment funds  targeting ESG performance grew from around $29.3 trillion asset under management (AUM) in 2016 to $51.2 trillion in 2020. Below is a history of key events that led to the development of sustainable investing.  </p>
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
</div>


@endsection
