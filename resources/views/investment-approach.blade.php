@extends('templates.public')
@section('content')

<style>
    /* 1. Enable smooth scrolling */
html {
  scroll-behavior: smooth;
}

/* 2. Make nav sticky */
main > nav {
  position: sticky;
  top: 2rem;
  align-self: start;
}

/* 3. ScrollSpy active styles (see JS tab for activation) */
.section-nav li.active > a {
  color: #333;
  font-weight: 500;
}

/* Sidebar Navigation */
.section-nav {
  padding-left: 0;
  border-left: 1px solid #efefef;
}

.section-nav a {
  text-decoration: none;
  display: block;
  padding: .125rem 0;
  color: #ccc;
  transition: all 50ms ease-in-out; /* 💡 This small transition makes setting of the active state smooth */
}

.section-nav a:hover,
.section-nav a:focus {
  color: #666;
}

/** Poor man's reset **/
* {
  box-sizing: border-box;
}
hr{
   height: 2px !important;
}

html, body {
  background: #fff;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
}

ul, ol {
  list-style: none;
  margin: 0;
  padding: 0;
}
li {
  margin-left: 1rem;
  margin-top: 20px;
  margin-bottom: 20px;
}

h1 {
  font-weight: 300;
}

/** page layout **/
.main {
  display: grid;
  grid-template-columns: 15em 1fr;
  max-width: 100em;
  width: 100%;
  margin: 0 auto;
}

/** enlarge the sections for this demo, so that we have a long scrollable page **/
section {
  padding-bottom: 20rem;
}
.list ul {
  list-style: disc !important;
  margin: 0;
  padding: 10px;
  font-weight: 500
}
</style>
<br>
<br>
<br>
<div class="investment-approach-welcome">
    <div class="welcome-sec text-center">
        <div class="container">
            <div class="p-5">
                <h4 class="text-white"><b><i>INVESTMENT APPROACH</i></b> -</h4>
                <h1 class="text-white">
                    We believe in strategic investing
                </h1>
                <br>
                <p class="text-white font-20 pr-5">It has guided how we do business for more than 10 years, and it’s driven by independent thinking and rigorous research. <br> So our clients can be confident that we’ll strive to select the right investments as we help them achieve their objectives.
                </p>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="investment-approach-section">
    <div class="section1">
        <div class="content-section">
            <div class="container">
                <div class="p-5">
                    <h4>Strategic investing means that we don’t stop at surface-level analysis. Instead, we go beyond the numbers. More than 20 of our investment professionals travel the world, visiting the companies they evaluate. It’s this passion for exploration and understanding that has helped inform better decision-making and prudent risk management for our clients.
                        We want to improve the financial well-being of our clients—beyond just recommending an investment strategy. We stay in touch as your needs evolve and market conditions shift. We help you meet your longer-term goals with an investment strategy that’s specifically designed for you. And we’re transparent about the investment decisions we make for you because we believe an informed investor is a better investor—and a happier client.
                        Strategic Investing takes us beyond the numbers.</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="section2">
        <div class="content-section">
            <div class="container">
               <div class="text-center">
                <h1><i><b>OUR APPROACH</b></i></h1>
               </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="img-section">
                            <div class="top-banner-left"></div>
                            <img src="{{ asset('assets/images/approach/flexible.jpg') }}" alt="" class="img-left">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <br>
                       <div class="p-5">
                        <h1><i><b>FLEXIBLE</b></i></h1>
                        <p>Every investor has unique needs. Some want growth or cash flow, others want to avoid certain industries or companies. At Highresin, investment management starts with you. We take the time to understand your long-term goals and specific needs. Only then can we create a tailored portfolio recommendation that focuses on your goals and adapts as markets change.
                        </p>
                       </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <br>
                       <div class="p-5">
                        <h1><i><b>DYNAMIC</b></i></h1>
                        <p>Many investment advisers stick to one style of investing, such as growth, momentum or value. But what happens when their style falls out of favor? That’s when narrow specialization could hurt your portfolio returns. Highresin prefers a flexible approach that can adapt to our forward-looking market views.
                        </p>
                       </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img-section">
                            <div class="top-banner-right"></div>
                            <img src="{{ asset('assets/images/approach/dynamic.jpg') }}" alt="" class="img-right">
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="img-section">
                            <div class="top-banner-left"></div>
                            <img src="{{ asset('assets/images/approach/discipline.jpg') }}" alt="" class="img-left">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <br>
                       <div class="p-5">
                        <h1><i><b>DISCIPLINED</b></i></h1>
                        <p>You deserve a manager who does more than just pick assets. Highresin meticulously analyzes markets, identifies the most attractive investment categories and then chooses individual assets, stocks or other securities for your portfolio. Our thorough approach yields result over time.
                        </p>
                       </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <br>
                       <div class="p-5">
                        <h1><i><b>COMPREHENSIVE</b></i></h1>
                        <p>Many investors have an incomplete view of investing—focusing chiefly on a certain market. However, it is not up to half of the value of the world stock market. That’s important because some of the largest, fastest-growing, best-run companies are worldwide. With a comprehensive, global focus, you can increase diversification and take advantage of opportunities many investment managers miss.
                        </p>
                       </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img-section">
                            <div class="top-banner-right"></div>
                            <img src="{{ asset('assets/images/approach/comprehensive.jpg') }}" alt="" class="img-right">
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="img-section">
                            <div class="top-banner-left"></div>
                            <img src="{{ asset('assets/images/approach/research.jpg') }}" alt="" class="img-left">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <br>
                       <div class="p-5">
                        <h1><i><b>RIGOROUS RESEARCH</b></i></h1>
                        <p>Over 10 of our investment professionals go out into the field to talk to customers, suppliers, employees, and managers to learn firsthand where a company stands and where it could go in the future.
                        </p>
                       </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <br>
                       <div class="p-5">
                        <h1><i><b>DEEP EXPERIENCE </b></i></h1>
                        <p>Our portfolio managers average years in the industry and years with highresin and they’ve weathered all kinds of markets.                        </p>
                       </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img-section">
                            <div class="top-banner-right"></div>
                            <img src="{{ asset('assets/images/approach/experience.jpg') }}" alt="" class="img-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="section3">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('assets/images/approach/management.jpg') }}" alt="">
            </div>
            <div class="col-md-6">
               <div class="p-5">
                <h1><b>Prudent Risk Management</b> </h1>
                <p>We carefully manage risk-seeking to both minimize losses and maximize returns for our clients. After all, gaining more is often a matter of losing less.
                </p>
                <h4><i><b>Prudent risk management is essential in all market conditions.</b></i></h4>
                <p>Helping to limit investors’ losses is just as important as if not more important than delivering growth. In addition to identifying promising investment opportunities, our strategic investing approach helps us prudently manage risk by:
                </p>
                <ul>
                    <li>Combining different types of risk in carefully constructed portfolios to avoid excessive concentration in any one sector, region, or company.</li>
                    <li>Actively adjusting to the macroeconomic factors that impact volatility, such as global trade events, along with interest rate, credit, and currency risk in global capital markets.</li>
                    <li>Monitoring risk throughout the investment process through statistical tools and the oversight of senior investment professionals and corporate officers.</li>
                </ul>
               </div>
            </div>
        </div>
    </div>

    <div class="section4">
        <div class="content-section">
           <div class="container">
            <main class="main">
                <nav class="section-nav">
                    <ol>
                      <li><a href="#overview">Overview</a></li>
                      <li><a href="#equities">Equities</a></li>
                      <li><a href="#alternatives">Alternatives</a></li>
                      <li><a href="#esg">Esg</a></li>
                      <li><a href="#tax-aware">Tax-Aware</a></li>
                      <li><a href="#investment">Investment</a></li>
                    </ol>
                  </nav>
                <div>
                  <section id="overview">
                    <h1><b><i>Overview</i></b></h1>
                    <h3>Our investment philosophy is based on three core principles, built on a decade of research and experience. By applying these principles, we seek to deliver sustainable, long-term value for our investors.
                    </h3>
                    <br>
                   <div class="col-lg-7 col-md-12">
                    <h4><b>Fundamental Investing</b></h4>
                    <p>We rely on sound economic theory and analysis to help us deliver long-term, repeatable results. </p>
                    <hr>
                    <h4><b>Systematically Applied</b></h4>
                    <p>A disciplined methodology underlies everything we do.  Our investment process, built over 10 years, is based on a continuous process of design, refine, test, repeat.  </p>
                    <hr>
                    <h4><b>Thoughtfully Designed</b></h4>
                    <p>In portfolio construction, risk management and trading, we seek additional value for our clients. Using both qualitative and quantitative tools, we’re meticulous in every detail of the investment process.     </p>
                    <hr>
                    <h4><b>Risk Management</b></h4>
                    <p>Our Risk Management team oversees all aspects of both financial and non-financial risks including Market and Liquidity Risk, Counterparty Risk, Model Risk, Operational Risk, and Technology Risk. The firm employs a robust Enterprise Risk framework, which provides for a strong governance structure and ensures independence in risk making decisions. We believe it’s important for Risk Management to interact closely with the Portfolio Management, Research, and Trading teams, working together in managing risk. Together, we aim to ensure that portfolios are manageable through sudden and severely adverse stress events.
                    </p>
                    <hr>

                   </div>
                  </section>
                  <section id="equities">
                   <div class="row">
                       <div class="col-md-6">
                        <h1><b><i>Equities</i></b></h1>
                        <br>
                        <p>For over a decade, our overall goal has been to build compelling and repeatable investments that are highly diversified across signals and regions, and within a risk-controlled framework.  We apply this systematic approach across our strategies, catering to the widespread investment needs of our clients</p>
                       </div>
                       <div class="col-md-6">
                           <img src="{{ asset('assets/images/approach/experience.jpg') }}" alt="">
                       </div>
                   </div>
                   <hr>
                  <div class="col-lg-7 col-md-12">

                    <h4><b>Single-Style </b></h4>
                    <p>Strategies that provide pure implementations of individual styles, such as defensive, momentum and value.
                    </p>
                    <h4><b>Multi-Style </b></h4>
                    <p>These strategies harness the diversification and potential return benefits of investing in multiple well-known styles in an integrated fashion.
                    </p>
                    <h4><b>Enhanced </b></h4>
                    <p>These strategies seek to provide consistent excess returns over common benchmarks. They combine established signals backed by academic evidence with proprietary signals based on rigorous research.
                    </p>
                    <h4><b>Relaxed Constraint</b></h4>
                    <p>Strategies that build on Enhanced, but broaden the implementation universe through use of limited shorting in a 130/30 context while remaining beta-1 products.
                    </p>
                    <h4><b>3-Alpha</b></h4>
                    <p>These strategies differentiate by recognizing the inherent risks and opportunities that come with global equity investing. They pair our Enhanced Strategy alongside dedicated country and currency models for integrated alpha opportunities.
                    </p>
                    <hr>
                  </div>
                  </section>
                  <section id="alternatives">
                    <div class="row">
                        <div class="col-md-6">
                         <h1><b><i>Alternatives</i></b></h1>
                         <br>
                         <p>As a pioneer in alternative investing, Highresin has a long track record of managing the complexities of these types of strategies. By investing long and short, and balancing exposure to factors and asset classes, our alternative strategies are built to seek returns in both up and down markets. We offer both absolute return strategies, which target zero exposure to traditional markets, either at all times, or on average; and total return strategies, which maintain some exposure to traditional markets. </p>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/approach/experience.jpg') }}" alt="">
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-7 col-md-12">
                        <h4><b>Absolute Return</b></h4>
                        <h4>Absolute Return Strategy</h4>
                        <p>Provides exposure to highly diversified portfolios, aggregating nearly all of Highresin’s strategies in a multi-strategy format.
                        </p>
                        <h4><b>Arbitrage Strategies</b></h4>
                        <p>We offer convertible, merger and event-driven arbitrage strategies, or a diversified portfolio combining these strategies.
                        </p>
                        <h4><b>Credit Strategies </b></h4>
                        <p>Strategies that build on Enhanced, but broaden the implementation universe through use of limited shorting in a 130/30 context while remaining beta-1 products.
                        </p>
                        <h4><b>Equity Market Neutral</b></h4>
                        <p>Employs a multi-factor, market-neutral investment process based on Highresin’s broadest global stock selection capabilities.
                        </p>
                        <h4><b>Global Macro</b></h4>
                        <p>Invests in major asset classes based on prices and macroeconomic fundamentals, using a variety of quantitative and qualitative inputs.
                        </p>
                        <h4><b>Alternative Risk Premia</b></h4>
                        <p>Seeks to efficiently capture a diversified set of classic hedge fund styles and deliver them to investors in a transparent and liquid vehicle.
                        </p>
                        <h4><b>Managed Futures</b></h4>
                        <p>A diversified strategy that seeks to take advantage of price trends in global asset classes.
                        </p>
                        <h4><b>Opportunistic</b></h4>
                        <p>Identifies securities that show extreme undervaluation based on both our quantitative models, as well as a thorough qualitative review.
                        </p>
                        <h4><b>Real Return</b></h4>
                        <p>Seeks to provide an inflation-hedging, positive real return through a diverse mix of strategies and assets.
                        </p>
                        <h4><b>Style Premia</b></h4>
                        <p>Seeks to harvest the return premia from well-known factors such as value, momentum, carry and defensive across asset classes and geographies.
                        </p>
                        <h4><b>Total Return</b></h4>
                        <h5>Diversified Growth Strategies</h5>
                        <p>Offers a wide range of return sources including market risk premia, alternative risk premia, and alpha, with less of the reliance on rising prices for traditional assets that traditional diversified growth strategies can have.
                        </p>
                        <h4><b>Long-Short Equity</b></h4>
                        <p>Employs our multi-factor investment process based on Highresin’s broadest global stock selection capabilities, while maintaining a consistent net long exposure to the market.
                        </p>
                        <h4><b>Risk Parity</b></h4>
                        <p>Invests across global asset classes by risk allocation as opposed to capital, seeking to build a portfolio that is both broadly diversified, but not overly reliant on any single asset class.
                        </p>
                        <h4><b>Multi-Strategy</b></h4>
                        <p>Offers a diversified approach to alternatives investing, seeking to provide broad exposure to several different Highresin strategies at the same time.
                        </p>

                        <hr>
                      </div>

                  </section>
                  <section id="esg">
                    <div class="row">
                        <div class="col-md-6">
                         <h1><b><i>ESG</i></b></h1>
                         <br>
                         <p>Highresin is committed to helping our clients achieve their Environmental, Social and Governance (ESG) goals. Our primary objective for considering ESG issues is improving the risk/return trade-off of our clients' investments. We provide investors a variety of options to achieve their ESG objectives. Find out more about our ESG solutions and philosophy.
                        </p>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/approach/experience.jpg') }}" alt="">
                        </div>
                    </div>
                    <hr>

                   </section>
                   <section id="tax-aware">
                    <div class="row">
                        <div class="col-md-6">
                         <h1><b><i>Tax-Aware Investing</i></b></h1>
                         <br>
                         <p>Highresin’s tax-aware approach is informed by decades of research and experience managing traditional and alternative investment strategies. Our research has created new possibilities for U.S. taxable investors at the intersection of prudent investing, income tax planning, and estate tax planning. Learn more about our tax-aware approach and solutions.
                        </p>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/approach/experience.jpg') }}" alt="">
                        </div>
                    </div>
                    <hr>

                   </section>
                   <section id="investment">
                    <div class="row">
                        <div class="col-md-6">
                         <h1><b><i>Investment Vehicles</i></b></h1>
                         <br>
                         <p>Highresin strategies are available in a variety of investment vehicles, from offshore limited partnerships to mutual funds and model portfolios. We also offer tax-aware implementation of some of our strategies, which may help taxable investors better reach their after-tax investment goals.
                        </p>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/approach/experience.jpg') }}" alt="">
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-7 col-md-12">

                        <h4><b>Institutional Investment Vehicles </b></h4>
                        <p>We serve institutional investors—including pension funds, defined contribution plans, insurance companies, endowments, and foundations—with a range of vehicles to suit to their organization’s governance, pricing and liability needs.
                        </p>
                       <div class="list">
                        <ul>
                            <li>Private Funds</li>
                            <li>Separate Managed Accounts</li>
                            <li>Collective Investment Trusts</li>
                        </ul>
                       </div>


                      </div>

                   </section>

                </div>

              </main>
           </div>
        </div>
    </div>
</div>
<script>
window.addEventListener('DOMContentLoaded', () => {
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    const id = entry.target.getAttribute('id');
    if (entry.intersectionRatio > 0) {
      document.querySelector(`nav li a[href="#${id}"]`).parentElement.classList.add('active');
    } else {
      document.querySelector(`nav li a[href="#${id}"]`).parentElement.classList.remove('active');
    }
  });
});
// Track all sections that have an `id` applied
document.querySelectorAll('section[id]').forEach((section) => {
  observer.observe(section);
});
});
</script>
@endsection
