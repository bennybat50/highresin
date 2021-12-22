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
                            <table id="datable_1" class="table table-hover display  pb-30" >
                                <thead class="data-table-head" >
                                    <tr class="data-table-head">
                                        <th class="hd">Name</th>
                                        <th class="hd">Email</th>
                                        <th class="hd">Method</th>
                                        <th class="hd">Amount</th>
                                        <th class="hd">Charges</th>
                                        <th class="hd">Credited</th>
                                        <th class="hd">Address</th>
                                        <th class="hd">Type</th>
                                        <th class="hd">Status</th>
                                        <th class="hd">Date</th>
                                        <th class="hd">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th >Full Name</th>
                                        <th >Email</th>
                                        <th >Method</th>
                                        <th >Paid</th>
                                        <th >Charges</th>
                                        <th >Credited</th>
                                        <th >Address</th>
                                        <th >Type</th>
                                        <th >Status</th>
                                         <th >Date</th>
                                        <th >Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($withdrawals as $with)
                                        <tr>
                                            <td>{{ $with['username'] }}</td>
                                            <td>{{ $with['email'] }}</td>
                                            <td>{{ $with['methodname'] }}</td>
                                            <td>${{ $with['amount_paid'] }}</td>
                                            <td>${{ $with['charge'] }}</td>
                                            <td>${{ $with['amount_credited'] }}</td>
                                            <td>{{ $with['wallet_address'] }}</td>
                                            <td>{{ $with['wallet_type'] }}</td>
                                            @if ($with['approved']==true)
                                            <td > <span class="label label-success">Aproved</span></td>
                                            @else
                                            <td > <span class="label label-danger">Not Aproved</span> </td>
                                            @endif
                                            <td>{{ $with['date'] }}</td>
                                            <td><a href="#" class="m-3" onclick="event.preventDefault();
                                                document.getElementById('approve_withdrawal_from-{{ $with['request_id'] }}').submit()">	<button class="btn btn-success  btn-rounded "><i class="fa fa-check"></i></button></a>
                                                <a href="#" class="m-3" onclick="event.preventDefault();
                                                document.getElementById('delete_withdrawal_from-{{ $with['request_id'] }}').submit()">	<button class="btn btn-danger btn-rounded "><i class="fa fa-trash"></i></button>
                                                </a></td>
                                            <form id="approve_withdrawal_from-{{ $with['request_id'] }}"
                                                action="{{ route('admin.withdrawal-request.update', $with['request_id'] ) }}" method="POST" style="display: none">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="amount_paid" value="{{ $with['amount_paid'] }}">
                                                <input type="hidden" name="amount_credited" value="{{ $with['amount_credited'] }}">
                                                <input type="hidden" name="wallet_address" value="{{ $with['wallet_address'] }}">
                                                <input type="hidden" name="methodname" value="{{ $with['methodname'] }}">
                                                <input type="hidden" name="wallet_type" value="{{ $with['wallet_type'] }}">
                                                <input type="hidden" name="email" value="{{ $with['email'] }}">
                                                <input type="hidden" name="username" value="{{ $with['username'] }}">
                                                <input type="hidden" name="user_id" value="{{ $with['user_id'] }}">
                                                <input type="hidden" name="currency_code" value="{{ $with['currency_code'] }}">
                                            </form>
                                            <form id="delete_withdrawal_from-{{ $with['request_id'] }}"
                                                action="{{ route('admin.withdrawal-request.destroy', $with['request_id'] ) }}" method="POST" style="display: none">
                                                @csrf
                                                @method('delete')
                                            </form>
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
