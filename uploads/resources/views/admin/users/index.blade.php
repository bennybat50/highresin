@extends('templates.admin')

@section('content')

<style>
    .divider{width: 100%; height: 1px; background-color: #eaeaea; margin: 10px;}
</style>


    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">All Users Data</h6>
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
                                            <th class="hd">Last Name</th>
                                            <th class="hd">Email</th>
                                            <th class="hd">Phone</th>
                                            <th class="hd">City</th>
                                            <th class="hd">Referred By</th>
                                            <th class="hd">State</th>
                                            <th class="hd">Verified</th>
                                            <th class="hd">Status</th>
                                            <th class="hd">Actions</th>
                                            <th class="hd"></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>Referred By</th>
                                            <th>State</th>
                                            <th>Verified</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($users as $key=> $user)
                                        @if($user->email!="admin1@test.com")
                                            <tr>
                                                <td>{{ $key }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->city }}</td>
                                                <td>{{ $user->referred_user['name'] }} ({{ $user->referred_user['email'] }})</td>
                                                <td>{{ $user->state }}</td>
                                                @if($user->email_verified_at==null)
                                                <td > <span class="label label-warning">Pending</span></td>
                                                @else
                                                <td > <span class="label label-success">Verified</span></td>
                                                @endif

                                                @if($user->blocked==null)
                                                <td > <span class="label label-warning">Pending</span></td>
                                                @elseif ($user->blocked=="blocked")
                                                <td > <span class="label label-danger">Suspended</span></td>
                                                @elseif ($user->blocked=="approved" || $user->blocked=="opened")
                                                <td > <span class="label label-success">Active</span></td>
                                                @endif
                                                <td>
                                                    <div class="dropdown show-on-hover">
                                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                                        Action <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu"  role="menu">
                                                        <li><a href="{{ route('admin.impersonate', $user->user_id ) }}" >Login</a></li>

                                                            <li><a href="" data-toggle="modal" data-target="#update-user-modal{{ $user->user_id }}">View User</a></li>
                                                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('verify_account-{{ $user->user_id }}').submit()">Verify User</a></li>
                                                            <li><a href="" data-toggle="modal" data-target="#upline-user-modal{{ $user->user_id }}">Assign Upline</a></li>
                                                            <li><a href="activities?user_id={{ $user->user_id }}" >Activities</a></li>
                                                            <li><a href="users-investments?user_id={{ $user->user_id }}" >Investments</a></li>
                                                            <li><a href="" onclick="event.preventDefault();document.getElementById('delete_user_from-{{ $user->user_id }}').submit()">Delete Account   </a></li>

                                                                {{-- account status section --}}
                                                                 @if($user->blocked==null)
                                                                  {{-- Approve Account --}}
                                                                 <li><a href="#" onclick="event.preventDefault();
                                                                    document.getElementById('approve_user_account-{{ $user->user_id }}').submit()">Approve Account</a></li>
                                                                 <form id="approve_user_account-{{ $user->user_id }}"
                                                                    action="{{ route('admin.users.update', $user->user_id) }}"
                                                                    method="POST" style="display: none">
                                                                    @csrf
                                                                    @method('put')
                                                                    <input type="text" name="approve" value="approved" >
                                                                </form>
                                                                 {{-- Approve Account  End--}}
                                                                 @elseif ($user->blocked=="blocked")

                                                                 {{-- Open Account  --}}
                                                                 <li><a href="#" onclick="event.preventDefault();
                                                                    document.getElementById('open_user_account-{{ $user->user_id }}').submit()">Open Account</a></li>

                                                                 <form id="open_user_account-{{ $user->user_id }}"
                                                                    action="{{ route('admin.users.update', $user->user_id) }}"
                                                                    method="POST" style="display: none">
                                                                    @csrf
                                                                    @method('put')
                                                                    <input type="text" name="open" value="opened" >
                                                                </form>
                                                                 {{-- Open Account End --}}
                                                                 @else

                                                                  {{-- Block Account  --}}
                                                                  <li><a href="#" onclick="event.preventDefault();
                                                                    document.getElementById('block_user_account-{{ $user->user_id }}').submit()">Block Account</a></li>

                                                                 <form id="block_user_account-{{ $user->user_id }}"
                                                                    action="{{ route('admin.users.update', $user->user_id) }}"
                                                                    method="POST" style="display: none">
                                                                    @csrf
                                                                    @method('put')
                                                                    <input type="text" name="block" value="block" >
                                                                </form>
                                                                 {{-- Block Account End --}}

                                                                 @endif
                                                                 {{-- account status section  end --}}

                                                                 {{-- verify account button --}}
                                                                 <form id="verify_account-{{ $user->user_id }}"
                                                                    action="{{ route('admin.users.update', $user->user_id) }}"
                                                                    method="POST" style="display: none">
                                                                    @csrf
                                                                    @method('put')
                                                                    <input type="text" name="verify" value="verify" >
                                                                </form>
                                                        </ul>
                                                    </div>

                                                </td>
                                                <td></td>


                                                <form id="delete_user_from-{{ $user->user_id }}"
                                                    action="{{ route('admin.users.destroy', $user->user_id) }}"
                                                    method="POST" style="display: none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </tr>
                                            @endif

                                            <div id="update-user-modal{{ $user->user_id }}" class="modal fade" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary txt-light">
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h5 class="modal-title font-20">View And manage
                                                                {{ $user->name }} {{ $user->last_name }} Profile</h5>
                                                        </div>
                                                        <form data-toggle="validator" id="update_trader_form"
                                                            action="" role="form">
                                                            {{-- @csrf
                                                            @method('put') --}}
                                                            <div class="modal-body">

                                                                <div class="row">
                                                                    <div class="form-group col-md-6 text-center">
                                                                        <label for="trader_name"
                                                                            class="control-label  ">Uploaded Id:</label>
                                                                        <img src="{{ asset('uploads/'.$user->kyc ) }}"  id="trader_image"
                                                                            style="width:100%; height:100px;  object-fit:contain;" />
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label for="trader_name"
                                                                            class="control-label  ">First Name:</label>
                                                                            <h4> {{ $user->name }}</h4>
                                                                            <div class="divider"></div>
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label for="trader_name"
                                                                            class="control-label  ">Last Name:</label>
                                                                            <h4> {{ $user->last_name }}</h4>
                                                                            <div class="divider"></div>
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label for="trader_name"
                                                                            class="control-label  ">Email:</label>
                                                                            <h4> {{ $user->email }}</h4>
                                                                            <div class="divider"></div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="trader_name"
                                                                            class="control-label  ">Phone:</label>
                                                                            <h4> {{ $user->phone }}</h4>
                                                                            <div class="divider"></div>
                                                                    </div>



                                                                    <div class="form-group col-md-6">
                                                                        <label for="trader_name"
                                                                            class="control-label  ">City:</label>
                                                                            <h4> {{ $user->city }}</h4>
                                                                            <div class="divider"></div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="trader_name"
                                                                            class="control-label  ">State:</label>
                                                                            <h4> {{ $user->state }}</h4>
                                                                            <div class="divider"></div>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label for="trader_name"
                                                                            class="control-label  ">Zip Code:</label>
                                                                            <h4> {{ $user->state }}</h4>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="form-group col-md-9">
                                                                        <label for="trader_name"
                                                                            class="control-label  ">Address:</label>
                                                                            <h4> {{ $user->address }}</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default btn-rounded"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-rounded">Disbale Account
                                                                    </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="upline-user-modal{{ $user->user_id }}" class="modal fade" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary txt-light">
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h5 class="modal-title font-20">Assign upline to
                                                                {{ $user->name }} {{ $user->last_name }}</h5>
                                                        </div>
                                                        <form data-toggle="validator" id="update_trader_form"
                                                            action="{{ route('admin.users.update', $user->user_id) }}" role="form"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                <div class="col-md-1"></div>
                                                                 <div class="col-md-10">
                                                                 <input type="hidden" name="user_id" value="{{$user->user_id}}"/>
                                                                 <input type="hidden" name="upline_update" value="{{$user->user_id}}"/>
                                                                 <select name="upline_id" class="form-control" required>
                                                                    <option value="">Select Users</option>
                                                                    <option value="">Remove Upline</option>
                                                                    @foreach($users as $key=> $uplines)
                                                                        @if($uplines->user_id != $user->user_id ){
                                                                            <option value="{{$uplines->user_id}}">{{ $uplines->name }} {{ $uplines->last_name }}  ({{ $uplines->email }})</option>
                                                                        }
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                </div>
                                                                <div class="col-md-1"></div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default btn-rounded"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-rounded">Assign Upline
                                                                    </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
    {{-- {{ $users->links()  }} --}}
    </div>

@endsection
