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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">CUSTOMER DETAILS</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table table-striped table-hover" style="table-layout: auto; width: 120%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th style="width: 10%">Name</th>
                                    <th>Phone</th>
                                    <th>Admission Date</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th >Name</th>
                                    <th>Phone</th>
                                    <th>Admission Date</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th >Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->addate }}</td>
                                    <td>{{ $user->dob }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>
                                        @if($user->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('customers.edit',$user->id) }}" data-bs-toggle="tooltip" title="Edit" class="btn btn-link btn-primary btn-lg"> <i class="fa fa-edit"></i> </a>
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