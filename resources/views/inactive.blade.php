@extends('layouts.app')

@section('content')
    <div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" >
            <div class="ms-md-auto py-2 py-md-0">
                <form action="{{ route('customers.expiry') }}" method="POST" class="mb-3">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-round">Check & Update Expiry</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">INACTIVE CUSTOMERS</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table table-striped table-hover" style="table-layout: auto; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 10%">Name</th>
                                    <th>Phone</th>
                                    <th>Admission Date</th>
                                    <th>Membership End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Admission Date</th>
                                    <th>Membership End Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->addate }}</td>

                                    @php $payment = $user->payments->first(); @endphp

                                    <td>{{ $payment->expiry_date ?? 'N/A'  }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            @if ($user->status)
                                                <span class="btn btn-link btn-success" data-bs-toggle="tooltip" title="Already active" style="cursor: pointer; padding-top: 15px;"> <i class="fa fa-times"></i> </span>
                                            @else
                                                <a href="{{ route('customers.payment',$user->id) }}" class="btn btn-link btn-success" data-bs-toggle="tooltip" title="Activate via Payment" style="padding-top: 15px;"> <i class="fa fa-check"></i> </a>
                                            @endif
                                        </div>   
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Customers Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection