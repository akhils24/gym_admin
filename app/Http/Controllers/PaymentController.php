<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show($id){
        $cust=customer::findOrFail($id);
        return view('payment',compact('cust'));
    }

    // To make payment
    public function insert($id,Request $request){

        $request->validate([
            'amount'=> 'required|string',
            'method' => 'required|in:Cash,UPI,Card',
            'edate'=> 'required|date',
            'validity'=> 'required|string',
            'sdate' => 'required|date',
        ],[
            'method.in' =>'The payment method must be either Cash,UPI, or Card.',
        ]);
        $payment = payment::create([
            'customer_id'=>$id,
            'amount'=> $request->amount,
            'payment_method'=>$request->method,
            'validity'=>$request->validity,
            'payment_date'=>$request->sdate,
            'expiry_date'=>$request->edate,
        ]);
        if ($payment) {
            customer::where('id', $id)->update(['status' => true]); 
        }
        return redirect('/custview')->with('success','Payment recorded and customer activated.');
    }

    // To view Inactive customers
    public function view(Request $request){

        $users = customer::where('status', false)
        ->with(['payments' => function ($q) {
            $q->latest('expiry_date')->limit(1);
        }])->get();

        return view('inactive', compact('users'));
    }
    // To check for inactive customers
    public function update(){
        $today = Carbon::today();

        $activeCustomers = Customer::where('status', true)
            ->with(['payments' => function ($query) {
                $query->latest('expiry_date')->limit(1);
            }])->get();

        foreach ($activeCustomers as $customer) {
            $latestPayment = $customer->payments->first();
            if ($latestPayment && $latestPayment->expiry_date < $today) {
                $customer->status = false;
                $customer->save();
            }
        }
        return redirect('/inactivecust')->with('success','Expiry check completed. Inactive customers updated.');
    }

    // To view payment Details
    public function dtls(Request $request){
        $payments = Payment::with('customer')->get();
        return view('paymentdtls',compact('payments'));
    }
}
    