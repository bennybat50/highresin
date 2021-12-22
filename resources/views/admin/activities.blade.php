
@extends('templates.admin')

@section('content')
<style>
    .unread{padding: 20px}
</style>
<div class="row">


    <aside class="col-lg-12 col-md-12 p-2">
        <div class="panel panel-refresh pa-0">
            <div class="refresh-container">
                <div class="la-anim-1"></div>
            </div>
            <div class="panel-heading pt-20 pb-20 pl-15 pr-15">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Activites</h6>
                </div>
                <div class="pull-right">

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body inbox-body pa-0">

                    <div class="table-responsive mb-0">
                        <table id="datable_1"  class="table table-inbox display table-hover mb-0">
                            <thead class="data-table-head">
                                <tr class="data-table-head">
                                    <th class="hd">S/N</th>
                                    <th class="hd">Name</th>
                                    <th class="hd">Title</th>
                                    <th class="hd">Description</th>
                                    <th class="hd">Amount</th>
                                    <th class="hd">Date</th>
                                    <th class="hd">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activities as $key=> $active)
                                <tr class="unread p-4">
                                    <td class="view-message">{{ $key }}</td>
                                    <td class="view-message">{{ $active->name }}</td>
                                    <td class="view-message">{{ $active->title }}</td>
                                    <td class="view-message">{{ $active->descp }}</td>
                                    <td class="view-message">${{ $active->amount }}</td>
                                    <td class="view-message">{{ $active->date }}</td>

                                    @if ($active->category=="earning" || $active->category=="bonus")
                                    <td class="view-message"><span class="label label-success">{{ $active->category }}</span></td>
                                    @elseif ($active->category=="withdrawals")
                                    {{-- <td > <span class="bg-danger p-1 font-10 text-white">WITHDRAWAL</span></td> --}}
                                    <td class="view-message"><span class="label label-danger">{{ $active->category }}</span></td>
                                    @elseif ($active->category=="deposit")
                                    {{-- <td > <span class="bg-primary p-1 font-10 text-white">DEPOSIT</span></td> --}}
                                    <td class="view-message"><span class="label label-primary">{{ $active->category }}</span></td>
                                    @elseif ($active->category=="expired")
                                    {{-- <td > <span class="bg-primary p-1 font-10 text-white">DEPOSIT</span></td> --}}
                                    <td class="view-message"><span class="label label-danger">{{ $active->category }}</span></td>
                                    @elseif ($active->category=="error")
                                    {{-- <td > <span class="bg-primary p-1 font-10 text-white">DEPOSIT</span></td> --}}
                                    <td class="view-message"><span class="label label-danger">{{ $active->category }}</span></td>
                                    @elseif ($active->category=="cancelled")
                                    {{-- <td > <span class="bg-primary p-1 font-10 text-white">DEPOSIT</span></td> --}}
                                    <td class="view-message"><span class="label label-danger">{{ $active->category }}</span></td>
                                    @endif
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>
@endsection
