@extends('templates.user')

@section('content')

<div class="row">
    <div class="col">
        <h3>Referral Bonus</h3>
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
                    <th class="text-white">Date</th>
                    <th class="text-white">Details</th>
                    <th class="text-white">Amount </th>
                    <th class="text-white">Status </th>
                </tr>
            </thead>
            <tbody>
                @foreach($bonus as $bon)
                <tr>
                    <td>{{ $bon->date }}</td>
                    <td>{{ $bon->descp }}</td>
                    <td>${{ $bon->amount }}</td>
                    <td>Paid</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div><!--end card-body-->
</div><!--end card-->


@endsection

