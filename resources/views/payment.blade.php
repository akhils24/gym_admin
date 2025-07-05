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
                        <div class="card-title">CUSTOMER PAYMENT</div>
                    </div>
                    <form method="POST" action="{{ route('customers.pay', $cust->id ) }}">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="adnum">Admission Number</label>
                                    <input type="text" class="form-control" id="adnum"  name="adnum" value="{{ $cust->id }}" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="fname">Full Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname" value="{{ $cust->name }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="amnt">Subscription Amount</label>
                                    <input type="number" class="form-control" id="amnt" placeholder="Enter Subscription Amount" name="amount" required/>
                                </div>
                                <div class="form-group">
                                    <label for="sdate">Subscription Date</label>
                                    <input type="date" class="form-control" id="sdate" placeholder="Enter Subscription Date" name="sdate" required/>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="defaultSelect">Payment Method</label> 
                                    <select class="form-select form-control" id="defaultSelect" name="method" required >
                                        <option value="" selected disabled>Select Payment Method</option>
                                        <option value="Cash">Cash</option>
                                        <option value="UPI">UPI</option>
                                        <option value="Card">Card</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="edate">Subscription End Date</label>
                                    <input type="date" class="form-control" id="edate" placeholder="Enter Subscription Expiry Date" name="edate" required/>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="validity">Subscription Period</label>
                                    <input type="text" class="form-control" id="validity" placeholder="Enter the Subscription Period" name="validity"  required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success">Confirm Payment</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection