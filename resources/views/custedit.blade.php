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
                        <div class="card-title">CUSTOMER REGISTERATION</div>
                    </div>
                    <form method="POST" action="{{ route('customers.update',$cust->id) }}">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="email2">Email Address</label>
                                    <input type="email" class="form-control" id="email2" placeholder="Enter Email" name="email" value="{{ old('email',$cust->email) }}" required/>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label><br />
                                    <div class="d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" required value="Male"{{ old('gender', $cust->gender) == 'Male' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexRadioDefault1" > Male </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" required value="Female"{{ old('gender', $cust->gender) == 'Female' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexRadioDefault2" > Female </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="fname">Full Name</label>
                                    <input type="text" class="form-control" id="fname" placeholder="Enter name" name="fname" value="{{ old('fname',$cust->name) }}" required />
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" placeholder="Enter DOB" name="dob" value="{{ old('dob',$cust->dob) }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" class="form-control" id="phone" placeholder="Enter Phone" name="phone" value="{{ old('phone',$cust->phone) }}" required />
                                </div>
                                <div class="form-group">
                                    <label for="sdate">Admission Date</label>
                                    <input type="date" class="form-control" id="sdate" placeholder="Enter Admission Date" name="sdate" value="{{ old('sdate',$cust->addate) }}" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-warning">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>
@endsection