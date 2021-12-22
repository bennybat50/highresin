@extends('templates.user')

@section('content')
<link href="{{ asset('user-assets/plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
<link href="{{ asset('user-assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Recent and past activities</h4>
    </div><!--end card-header-->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Date range</h4>

                    </div><!--end card-header-->
                    <div class="card-body bootstrap-select-1">
                        <div class="input-group">

                            <input type="text" class="form-control" name="daterange" style="height:30px;">
                            <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>


                        </div>
                        <br>
                    </div><!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Filter</h4>

                    </div><!--end card-header-->
                    <div class="card-body bootstrap-select-1">
                        <div class="row">
                            <div class="col-md-6">
                                <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                                    <option>Select Portfolio</option>
                                    @foreach ($investments as $invest)
                                    <option value="{{ $invest['investment_id'] }}">{{ $invest['packagename'] }}</option>
                                    @endforeach
                                </select>
                            </div><!-- end col -->
                            <div class="col-md-6">
                                <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                                    <option>Select Types</option>
                                    <option value="deposits">Deposits</option>
                                    <option value="withdrawals">Withdrawals</option>
                                    <option value="dividends">Dividends</option>
                                    <option value="referral_commission">Referral Commission</option>

                                </select>
                            </div><!-- end col -->

                        </div><!-- end row -->
                    </div><!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead class="bg-dark text-white">
                <tr>
                    <th class="text-white">S/N</th>
                    <th class="text-white">Title</th>
                    <th class="text-white">Date</th>
                    <th class="text-white">Description</th>
                    <th class="text-white">Amount</th>
                    <th class="text-white">Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach($activities as $key=> $active)
                <tr>
                    <td>{{ $key }}</td>
                    <td class="text-primary">{{ $active->title }}</td>
                    <td>{{ $active->date }}</td>
                    <td>{{ $active->descp }}</td>
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
                </tr>
                @endforeach
            </tbody>

        </table>
    </div><!--end card-body-->
</div><!--end card-->



@endsection


