<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create_bill');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'issue_date' => 'required|date',
            'types_of_bills' => 'required',
            'issuer' => 'required|max:255',
            'payment_address' => 'required|max:255',
            'payment_place' => 'required|max:255',
            'due_date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        $bill = new Bill();

        $bill->issue_date = $request->issue_date;
        $bill->types_of_bills = $request->types_of_bills;
        $bill->issuer = $request->issuer;
        $bill->receiver = $request->receiver;
        $bill->payment_address = $request->payment_address;
        $bill->payment_place = $request->payment_place;
        $bill->due_date = $request->due_date;
        $bill->amount = $request->amount;
        $bill->save();
        
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
