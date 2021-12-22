@extends('templates.user')

@section('content')
<div class="row">
    <div class="col">
        <h3>Referred Partners</h3>
    </div>
    <div class="col-auto">
        <div class="text-center m-2">
           <a  class="btn btn-outline-primary" id="referralLink" href="#" referral_id="{{ $referral_code }}" >Copy Referral Link</a>
       </div>
   </div>
</div>
<div class="card">
    <div class="card-body">
        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead class="bg-dark text-white">
                <tr>
                    <th class="text-white">Full Name</th>
                    <th class="text-white">Email Address</th>
                    <th class="text-white">Invested </th>
                </tr>
            </thead>
            <tbody>
                @foreach($referrals as $ref)
                <tr>
                    <td>{{ $ref->name }} {{ $ref->last_name }}</td>
                    <td>{{ $ref->email }}</td>
                    @if ($ref->invested==true)
                    <td > <span class="badge bg-success p-2 " style="font-size: 12px !important">Invested</span></td>
                    @else
                    <td > <span class="badge bg-warning p-2 " style="font-size: 12px !important">Pending</span> </td>
                    @endif
                </tr>
                @endforeach
            </tbody>

        </table>
    </div><!--end card-body-->
</div><!--end card-->
@endsection
