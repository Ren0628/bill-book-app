<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(isset($request->month)){

            $month = $request->month;

            $bills = Bill::orderby('issue_date', 'ASC')
                        ->whereYear('issue_date', substr($month, 0, 4))
                        ->whereMonth('issue_date', substr($month, 5, 2))
                        ->get();
        } else {

            $month = date('Y-m');

            $bills = Bill::orderby('issue_date', 'ASC')
                        ->whereYear('issue_date', date('Y'))
                        ->whereMonth('issue_date', date('m'))
                        ->get(); 
        }

        return view('pages.index', compact(['bills', 'month']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $today = date('Y-m-d');

        return view('pages.create_bill', compact('today'));
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
            'receiver' => 'max:255',
            'payment_address' => 'max:255',
            'payment_place' => 'required|max:255',
            'due_date' => 'required|date',
            'amount' => 'required',
        ]);

        $target = array(',', '￥');
        $amount = str_replace($target, '', $request->amount);

        if(!preg_match('/^[0-9]+$/', $amount)) {
            throw ValidationException::withMessages(['amount' => '金額が正しくありません。']);
        }

        $bill = new Bill();

        $bill->issue_date = $request->issue_date;
        $bill->types_of_bills = $request->types_of_bills;
        $bill->issuer = $request->issuer;
        $bill->receiver = $request->receiver;
        $bill->payment_address = $request->payment_address;
        $bill->payment_place = $request->payment_place;
        $bill->due_date = $request->due_date;
        $bill->amount = $amount;
        $bill->save();

        $prev_issue_date = $request->issue_date;
        
        return back()->with(['prev_issue_date' => $prev_issue_date, 'bill' => $bill]);
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

    public function get_issuer_data(Request $request)
    {
        $issuer_data = Bill::orderby('id', 'DESC')
                            ->where('issuer', '=', $request->issuer)
                            ->first();
        
        return response()->json($issuer_data, 200);
    }
}
