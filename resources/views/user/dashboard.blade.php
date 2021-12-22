@extends('templates.user')

@section('content')
<link href="{{ asset('user-assets/css/skippr.css') }}" rel="stylesheet" type="text/css" />
<style>
    #containerSlider{
        width: 100%;
        height: 260px;
    }
    .newsHeading,.newsSummary{
        display: block; /* Fallback for non-webkit */
    display: -webkit-box;
    height: 3.6em; /* Fallback for non-webkit, line-height * 2 */
    line-height: 1.3em;
    -webkit-line-clamp: 3; /* if you change this, make sure to change the fallback line-height and height */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    }
</style>

<div class="row">
    <div class="col-lg-9">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-0 fw-semibold font-16">Accumulated  Dividends</p>
                                
                                @if ($user_id==75)
                                <h3 class="m-0">$47,345.53</h3>
                                @elseif ($user_id==77)
                                <h3 class="m-0">$18,530.56</h3>
                                @else
                                <h3 class="m-0">${{ $accumulatedDevidends }}</h3>
                                @endif
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <i data-feather="activity" class="align-self-center text-muted icon-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-0 fw-semibold font-16">All active <br> portfolios </p>
                                <h3 class="m-0">{{ $investment_count?? 0 }}</h3>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <i data-feather="briefcase" class="align-self-center text-muted icon-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-0 fw-semibold font-16">Invested <br> Capital <br> </p>
                                <h3 class="m-0">${{ $invested_capital??0 }}</h3>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <i data-feather="dollar-sign" class="align-self-center text-muted icon-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-0 fw-semibold font-16">Compounding Dividends</p>
                                <h3 class="m-0">${{ $compound_wallet ?? 0 }}</h3>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <i data-feather="dollar-sign" class="align-self-center text-muted icon-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->


        </div><!--end row-->
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Recent News</h4>
                    </div><!--end col-->

                </div>  <!--end row-->
            </div><!--end card-header-->
            <div class="card-body">
                <div class="">
                    <div id="containerSlider">
                        <div id="newsSlider">
                            @foreach($news as $new)
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img style="width: 100%; height:260px; object-fit:cover;" src="{{ $new->urlToImage }}" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3">
                                            <span class="bg-soft-pink p-2 rounded">{{ $new->author }}</span>
                                            <h3 class="my-2 font-weight-bold newsHeading" >{{ $new->title }}</h3>
                                            <p class="font-14 text-muted newsSummary">{{ $new->description }}
                                            </p>
                                            <a href="{{ $new->url }}" target="blank" class="btn btn-outline-primary">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div id="ana_dash_1" class="apex-charts"></div> --}}
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
        <div class="row">


        <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">FX Stock</h4>
                            </div><!--end col-->
                             <div class="col-auto">
                                <h4 class="card-title"><i data-feather="bar-chart-2" class="align-self-center text-muted icon-sm"></i></h4>
                            </div><!--end col-->
                        </div>  <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body">
                       <iframe scrolling="no" allowtransparency="true" frameborder="0" src="https://s.tradingview.com/embed-widget/symbol-info/?locale=en&amp;symbol=NASDAQ%3AAAPL#%7B%22symbol%22%3A%22NASDAQ%3AAAPL%22%2C%22width%22%3A%22100%25%22%2C%22colorTheme%22%3A%22light%22%2C%22isTransparent%22%3Afalse%2C%22height%22%3A205%2C%22utm_source%22%3A%22auburnhillcapitals.com%22%2C%22utm_medium%22%3A%22widget_new%22%2C%22utm_campaign%22%3A%22symbol-info%22%7D" style="box-sizing: border-box; height: 249px; width: 100%;"></iframe>

                    </div><!--end card-body-->
                </div><!--end card-->
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Recent Messages</h4>
                            </div><!--end col-->
                             <div class="col-auto">
                                <a href="message" class="btn btn-outline-primary">
                                    View all messages<i class="fi-arrow-right"></i>
                                </a>
                            </div><!--end col-->
                        </div>  <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body " data-simplebar>
                        <div class="analytic-dash-activity">
                            <div class="activity">
                                @foreach ($messages as $key=> $mess )

                                <div class="col-lg-12">
                                    @if ($key % 2)
                                    <div class="card report-card bg-white ">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-auto">
                                                    <img src="{{ asset('admin-assets/img/fav-icon.png') }}" alt="" class="thumb-md rounded-circle" style="object-fit: cover; object-position:left;">
                                                </div><!--end col-->
                                                <div class="col">
                                                    <p class="text-dark mb-0 fw-semibold">{{ $mess->descp}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    @else
                                    <div class="card report-card bg-primary ">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-auto">
                                                    <img src="{{ asset('admin-assets/img/fav-icon.png') }}" alt="" class="thumb-md rounded-circle" style="object-fit: cover; object-position:left;">
                                                </div><!--end col-->
                                                <div class="col">
                                                    <p class="text-white mb-0 fw-semibold">{{ $mess->descp}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    @endif
                                    <!--end card-->
                                </div>
                                @endforeach




                            </div>
                        </div>

                    </div><!--end card-body-->

                </div><!--end card-->
            </div>

        </div>
    </div><!--end col-->
    
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Total Wallet Balance</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                        <i data-feather="dollar-sign" class="align-self-center icon-xs me-1"></i>
                    </div><!--end col-->
                </div>  <!--end row-->
            </div><!--end card-header-->
            <div class="card-body">
                <div class="text-center">
                    <h1>${{ $wallet_balance ?? 0 }}</h1>
                    <h6 class="bg-light-alt py-3 px-2 mb-0">
                        <div id="ana_device" class="apex-charts"></div>
                    </h6>
                </div>
                <div class="text-center m-2">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#drawModalDefault" class="btn btn-outline-primary">Withdraw</a>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
        <div class="col-md-6 col-lg-12">
            <div class="card report-card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <p class="text-dark mb-0 fw-semibold font-16">Total Referred Partners </p>
                            @if ($user_id==75)
                            <h3 class="m-0">15</h3>
                            @elseif ($user_id==77)
                            <h3 class="m-0">3</h3>
                            @else
                            <h3 class="m-0">{{count($referrals)}}</h3>
                            @endif
                        </div>
                        <div class="col-auto align-self-center">
                            <div class="report-main-icon bg-light-alt">
                                <i data-feather="users" class="align-self-center text-muted icon-sm"></i>
                            </div>
                        </div>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div>
        <div class="col-md-6 col-lg-12">
            <div class="card report-card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <p class="text-dark mb-0 fw-semibold font-16">Accumulated referral bonus </p>
                            @if ($user_id==75)
                            <h3 class="m-0">$13,400.00</h3>
                            @elseif($user_id==77)
                            <h3 class="m-0">$2,450.00</h3>
                            @else
                            <h3 class="m-0">${{ $accumulatedBonus??0 }}</h3>
                            @endif
                            
                        </div>
                        <div class="col-auto align-self-center">
                            <div class="report-main-icon bg-light-alt">
                                <i data-feather="dollar-sign" class="align-self-center text-muted icon-sm"></i>
                            </div>
                        </div>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div>

    </div> <!--end col-->
</div><!--end row-->

<div class="accordion-item">
<div class="row">

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Portfolio Sheet</h4>
                    </div><!--end col-->

                    <div class="col-auto">
                        <a href="user-investments" class="btn btn-outline-primary">
                                   View all Portfolios >><i class="fi-arrow-right"></i>
                               </a>
                   </div><!--end col-->

                </div>  <!--end row-->
            </div><!--end card-header-->
            <div class="card-body">
                <ul class="list-group custom-list-group mb-n3">
                    @foreach($recent_investments as $invest)
                    <li class="list-group-item align-items-center d-flex justify-content-between pt-0">
                        <div class="media">
                            <div class="icon-info-activity">
                                <i data-feather="trending-up" class="me-3 align-self-center rounded "></i>
                            </div>
                            <div class="media-body align-self-center">
                                <h6 class="m-0">{{ $invest->packagename }} <br> ${{ $invest->amount }}</h6>
                                <p class="mb-0 text-muted">{{ $invest->date }}</p>
                            </div><!--end media body-->
                        </div>
                        <div class="align-self-center">
                            <a href="#" class="btn btn-sm btn-soft-primary" data-bs-toggle="collapse" data-bs-target="#collapseTwo{{ $invest->user_investments_id }}"
                            aria-expanded="false" aria-controls="collapseTwo{{ $invest->user_investments_id }}">View Earnings<i data-feather="arrow-right-circle" class="align-self-center rounded font-5"></i></a>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Daily Earnings <span id="test_time"> here</span></h4>
                    </div><!--end col-->
                </div>  <!--end row-->
            </div><!--end card-header-->
            <div class="card-body">
                <div class="table-responsive browser_users">
                    @foreach($dailyCredited as $key=> $dayC)
                    <div id="collapseTwo{{ $dayC->invest_id }}" class="accordion-collapse collapse @if ( $key==0) show @endif " aria-labelledby="headingTwo" data-bs-parent="#accordionExample-faq">

                    <div class="accordion-body">
                        <h5 class="text-center">{{ $dayC->invest_name }} </h5>
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="border-top-0">Days</th>
                                <th class="border-top-0">Amount</th>
                                <th class="border-top-0">Status</th>
                            </tr><!--end tr-->
                        </thead>
                        <tbody>
                            @foreach($dayC->dailys as $daily)
                            @if($daily['status']==false)
                            <tr>
                                <td><a href="#" class="text-primary">{{ $daily['day'] }}</a></td>
                                <td>$0.00</td>
                                <td > <span class="bg-danger p-1 font-10 text-white">PENDING</span> </td>
                            </tr><!--end tr-->
                            @else
                            <tr>
                                <td><a href="#" class="text-primary">{{ $daily['day'] }}</a></td>
                                <td>${{ $daily['amount'] }}</td>
                                <td > <span class="bg-success p-1 font-10 text-white">CREDITED</span> </td>
                            </tr><!--end tr-->
                            @endif

                            @endforeach
                        </tbody>
                    </table> <!--end table-->
                    </div>
                    </div>
                    @endforeach
                </div><!--end /div-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div>
</div><!--end row-->
</div><!--end accrodion-->

<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Account Activities</h4>
                        </div><!--end col-->
                         <div class="col-auto">
                             <a href="activity" class="btn btn-outline-primary">
                                        View all Activities >><i class="fi-arrow-right"></i>
                                    </a>
                        </div><!--end col-->

                    </div>  <!--end row-->
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive browser_users">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="border-top-0">Title</th>
                                    <th class="border-top-0">Description</th>
                                    <th class="border-top-0">Date</th>
                                    <th class="border-top-0">Amount</th>
                                    <th class="border-top-0">Status</th>
                                </tr><!--end tr-->
                            </thead>
                            <tbody>
                                @foreach($activities as $active)
                                <tr>
                                    <td><a href="#" class="text-primary">{{ $active->title }}</a></td>
                                    <td>{{ $active->descp }}</td>
                                    <td>{{ $active->date }}</td>
                                    <td>${{ $active->amount }}</td>
                                    @if ($active->category=="earning" || $active->category=="bonus")
                                    <td > <span class="bg-success p-1 font-10 text-white">CREDITED</span></td>
                                    @elseif ($active->category=="withdrawals")
                                    <td > <span class="bg-danger p-1 font-10 text-white">WITHDRAWAL</span></td>
                                    @elseif ($active->category=="deposit")
                                    <td > <span class="bg-primary p-1 font-10 text-white">DEPOSIT</span></td>
                                    @elseif ($active->category=="expired")
                                    <td > <span class="bg-danger p-1 font-10 text-white">EXPIRED</span></td>
                                    @elseif ($active->category=="error")
                                    <td > <span class="bg-danger p-1 font-10 text-white">ERROR</span></td>
                                    @elseif ($active->category=="cancelled")
                                    <td > <span class="bg-danger p-1 font-10 text-white">CANCELLED</span></td>
                                    @endif

                                </tr><!--end tr-->
                                @endforeach

                            </tbody>

                        </table> <!--end table-->
                    </div><!--end /div-->


                </div><!--end card-body-->
            </div><!--end card-->
        </div>
    </div>
</div>



<div class="modal fade" id="drawModalDefault" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalDefaultLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title m-0" id="exampleModalDefaultLabel">Withdrawal request
                            </h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <!--end modal-header-->
                            <div class="modal-body">
                                <form action="{{ route('user.withdrawal-request.store') }}" method="post" class="form-parsley">
                                    @csrf
                                <input type="hidden" name="user_id" value="{{ $user_id }}">

                                <input type="hidden" name="currency_code" id="currency_code">
                                <input type="hidden"  name="charge" id="charge" >

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="inputAmount">Choose Withdraw Method</label>
                                        <select name="withdrawal_methods_id" id="withdrawal_methods_id" required class="form-control">
                                            <option value="">Select Method</option>
                                            @foreach ($withdrawMethods as $met)
                                            <option value="{{ $met['id'] }}" currency_code="{{ $met['currency_code'] }}" charge="{{ $met['charges'] }}">{{ $met['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                 <div class="form-group col-md-12">
                                     <label for="inputAmount">Amount</label>
                                     <input type="decimal" class="form-control" name="amount_paid"
                                         id="inputAmount" placeholder="Enter Amount" required
                                         data-parsley-min="0" data-parsley-max="{{ $main_wallet ?? 0 }}">
                                 </div>
                                 <div class="form-group col-md-12">
                                     <label for="wallet">Wallet</label>
                                     <select name="wallet_type" class="form-control" id="wallet_type" required>
                                         <option value="">Select Wallet</option>
                                         <option value="main_wallet">Portfolio Balance</option>
                                         <option value="compound_wallet">Compounding Dividends</option>
                                     </select>
                                 </div>
                                </div>
                                <div class="form-group">
                                 <label for="inputAmount">Wallet Address</label>
                                 <input type="text" class="form-control" name="wallet_address"
                                     id="wallet_address" placeholder="Enter Wallet Address" required>
                             </div>
                             <div class="form-group">
                                <label for="inputAmount">2fa Code</label>
                                <input type="text" class="form-control" name="2fa"
                                    id="2fa" placeholder="Enter 2fa code" >
                                    <br>
                                    <a href="2fa" class="text-primary">Dont have a 2fa code? Scan Qrcode now!</a>
                            </div>
                             </div>

                        <!--end modal-body-->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Withdraw</button>
                            <button type="button" class="btn btn-soft-secondary "
                                data-bs-dismiss="modal">Close</button>
                        </div>
                        <!--end modal-footer-->
                        </form>
                    </div>
                    <!--end modal-content-->
                </div>
                <!--end modal-dialog-->
            </div>
            <!--end modal-->
            <script src="{{ asset('user-assets/js/jquery.min.js') }}"></script>
<script>
   localStorage.removeItem("reg_data")



$("#withdrawal_methods_id").on('change',function(){
    //alert(`${$('option:selected', this).attr('currency_code')} and ${$('option:selected', this).attr('charge')}`)
    $("#currency_code").val($('option:selected', this).attr('currency_code'))
    $("#charge").val($('option:selected', this).attr('charge'))
})
</script>
@endsection
