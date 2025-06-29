<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Dashboard
    public function show(Request $request){
        return view("home");
    }
    // customer Registration page view
    public function regshow(Request $request){
        return view("customerreg");
    }
    // Customer Registeration
    public function insert(Request $request){
        $request->validate([
            'email' => 'required|email|max:255|unique:customers',
            'gender'=> 'required',
            'fname'=> 'required',
            'dob'=> 'required|date',
            'phone'=> 'required|digits:10',
            'sdate' => 'required|date',
        ]);
        customer::create([
            'name'=> $request->fname,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'addate' => $request->sdate,
            'gender' => $request->gender,
        ]);
        return redirect('/register')->with('success','Registration succesfull');
    }
    // customer view
    public function custview(Request $request){
        $users=customer::all();
        return view('customers',compact('users'));
    }

    //customer edit 
    public function edit($id){
        $cust=customer::findOrFail($id);
        return view('custedit',compact('cust'));
    }

    public function update($id,Request $request){
        $request->validate([
            'email' => 'required|email|max:255|unique:customers,email,' . $id,
            'gender'=> 'required',
            'fname'=> 'required',
            'dob'=> 'required|date',
            'phone'=> 'required|digits:10',
            'sdate' => 'required|date',
        ]);

        $customer = customer::findOrFail($id);
        $customer->update([
            'name'   => $request->fname,
            'email'  => $request->email,
            'phone'  => $request->phone,
            'dob'    => $request->dob,
            'addate' => $request->sdate,
            'gender' => $request->gender,
        ]);
        return redirect('/custview')->with('success','Customer updated succesfully');
    }
}
