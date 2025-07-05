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
                        <h4 class="card-title">PAYMENT DETAILS</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table table-striped table-hover" style="table-layout: auto; width: 110%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 10%">Name</th>
                                    <th>Phone</th>
                                    <th>Amount</th>
                                    <th>Validity</th>
                                    <th>Payment Date</th>
                                    <th>Expiry Date</th>
                                    <th>Payment Mode</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Amount</th>
                                    <th>Validity</th>
                                    <th>Payment Date</th>
                                    <th>Expiry Date</th>
                                    <th>Payment Mode</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->customer->id }}</td>
                                    <td>{{ $payment->customer->name }}</td>
                                    <td>{{ $payment->customer->phone }}</td>
                                    <td>{{ $payment->amount }}</td>
                                    <td>{{ $payment->validity }}</td>
                                    <td>{{ $payment->payment_date }}</td>
                                    <td>{{ $payment->expiry_date }}</td>
                                    <td>{{ $payment->payment_method }}</td>
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