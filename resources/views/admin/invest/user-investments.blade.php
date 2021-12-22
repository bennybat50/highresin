@extends('templates.admin')

@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark"></h6>
                    </div>
                    <div class="pull-right">

                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_1" class="table table-hover display  pb-30">
                                    <thead class="data-table-head">
                                        <tr class="data-table-head">

                                            <th class="hd">S/N</th>
                                            <th class="hd">Name</th>
                                            <th class="hd">Package</th>
                                            <th class="hd">Date</th>
                                            <th class="hd">Amount</th>
                                            <th class="hd">Duration</th>
                                            <th class="hd">ROI</th>
                                            <th class="hd">payout</th>
                                            <th class="hd">Status</th>
                                            <th class="hd">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th >S/N</th>
                                            <th >Name</th>
                                            <th >Package</th>
                                            <th >Date</th>
                                            <th >Amount</th>
                                            <th >Duration</th>
                                            <th> ROI</th>
                                            <th >payout</th>
                                            <th >Status</th>
                                            <th >Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($investments as $key=> $invest)
                                            <tr>
                                                <td scope="row">{{ $key }}</td>
                                                <td>{{ $invest['username'] }}</td>
                                                <td>{{ $invest['packagename'] }}</td>
                                                <td>{{ $invest['date'] }}</td>
                                                <td>${{ $invest['amount'] }}</td>
                                                <td>{{ $invest['duration'] }}</td>
                                                <td>${{ $invest['returns'] }}</td>
                                                <td>{{ $invest['payout'] }}</td>
                                                @if ($invest['status']=="completed"||  $invest['status']=="mismatch")
                                                <td> <span class="label label-success">Active</span></td>
                                                @elseif ($invest['status']=="pending" )
                                                <td> <span class="label label-warning">Pending</span></td>
                                                @elseif ($invest['status']=="expired" )
                                                <td> <span class="label label-danger">Expired</span></td>
                                                @elseif ($invest['status']=="error" )
                                                <td> <span class="label label-danger">Payment Error</span></td>
                                                @elseif ( $invest['status']=="cancelled" )
                                                <td> <span class="label label-danger">Payment Cancelled</span></td>
                                                @else
                                                <td> <span class="label label-danger">{{ $invest['status'] }}</span></td>
                                                @endif
<td>
                                                    <div class="dropdown show-on-hover">
                                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                                        Action <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu"  role="menu">
                                                        <li><a href="" >Activate Portfolio</a></li>
                                                        </ul>
                                                    </div>
                                                </td>


                                                {{-- <form id="delete_user_from-{{ $pay['id'] }}"
                                                action="#" method="POST" style="display: none">
                                                @csrf
                                                @method('delete')
                                            </form> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /Row -->

@endsection

