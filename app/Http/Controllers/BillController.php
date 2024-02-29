<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use My_func;

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
                        ->where('issuer', '!=', '1')
                        ->whereYear('issue_date', substr($month, 0, 4))
                        ->whereMonth('issue_date', substr($month, 5, 2))
                        ->paginate(20);

            foreach($bills as $bill){
                $dueDateWareki = My_func::wareki(substr($bill->due_date, 0, 4));
                $dueDateWareki = preg_replace('/[^0-9]/', '', $dueDateWareki);
                $bill->due_date_wareki = $dueDateWareki;
            }

            $wareki = My_func::wareki(substr($month, 0, 4));

        } else {

            $month = date('Y-m');

            $bills = Bill::orderby('issue_date', 'ASC')
                        ->where('issuer', '!=', '1')
                        ->whereYear('issue_date', date('Y'))
                        ->whereMonth('issue_date', date('m'))
                        ->paginate(20);

            foreach($bills as $bill){
                $dueDateWareki = My_func::wareki(substr($bill->due_date, 0, 4));
                $dueDateWareki = preg_replace('/[^0-9]/', '', $dueDateWareki);
                $bill->due_date_wareki = $dueDateWareki;
            }

            $wareki = My_func::wareki(date('Y'));
        }

        return view('pages.index', compact(['bills', 'month', 'wareki']));
    }

    public function bill_payable_list(Request $request)
    {
        if(isset($request->month)){

            $month = $request->month;

            $bills = Bill::orderby('issue_date', 'ASC')
                        ->where('issuer', '=', '1')
                        ->whereYear('issue_date', substr($month, 0, 4))
                        ->whereMonth('issue_date', substr($month, 5, 2))
                        ->paginate(20);

            foreach($bills as $bill){
                $dueDateWareki = My_func::wareki(substr($bill->due_date, 0, 4));
                $dueDateWareki = preg_replace('/[^0-9]/', '', $dueDateWareki);
                $bill->due_date_wareki = $dueDateWareki;
            }

            $wareki = My_func::wareki(substr($month, 0, 4));

        } else {

            $month = date('Y-m');

            $bills = Bill::orderby('issue_date', 'ASC')
                        ->where('issuer', '=', '1')
                        ->whereYear('issue_date', date('Y'))
                        ->whereMonth('issue_date', date('m'))
                        ->paginate(20);

            foreach($bills as $bill){
                $dueDateWareki = My_func::wareki(substr($bill->due_date, 0, 4));
                $dueDateWareki = preg_replace('/[^0-9]/', '', $dueDateWareki);
                $bill->due_date_wareki = $dueDateWareki;
            }

            $wareki = My_func::wareki(date('Y'));
        }

        return view('pages.index', compact(['bills', 'month', 'wareki']));
    }

    public function due_date_receive_list(Request $request)
    {
        if(isset($request->month)){

            $month = $request->month;

            $bills = Bill::orderby('issue_date', 'ASC')
                        ->where('issuer', '!=', '1')
                        ->whereYear('due_date', substr($month, 0, 4))
                        ->whereMonth('due_date', substr($month, 5, 2))
                        ->paginate(20);

            $sumAmount = Bill::where('issuer', '!=', '1')
                            ->whereYear('due_date', substr($month, 0, 4))
                            ->whereMonth('due_date', substr($month, 5, 2))
                            ->sum('amount');

            foreach($bills as $bill){
                $dueDateWareki = My_func::wareki(substr($bill->due_date, 0, 4));
                $dueDateWareki = preg_replace('/[^0-9]/', '', $dueDateWareki);
                $bill->due_date_wareki = $dueDateWareki;
            }

            $wareki = My_func::wareki(substr($month, 0, 4));

        } else {

            $month = date('Y-m');

            $bills = Bill::orderby('issue_date', 'ASC')
                        ->where('issuer', '!=', '1')
                        ->whereYear('due_date', date('Y'))
                        ->whereMonth('due_date', date('m'))
                        ->paginate(20);

            $sumAmount = Bill::where('issuer', '!=', '1')
                            ->whereYear('due_date', substr($month, 0, 4))
                            ->whereMonth('due_date', substr($month, 5, 2))
                            ->sum('amount');

            foreach($bills as $bill){
                $dueDateWareki = My_func::wareki(substr($bill->due_date, 0, 4));
                $dueDateWareki = preg_replace('/[^0-9]/', '', $dueDateWareki);
                $bill->due_date_wareki = $dueDateWareki;
            }

            $wareki = My_func::wareki(date('Y'));
        }

        return view('pages.index', compact(['bills', 'month', 'wareki', 'sumAmount']));
    }

    public function due_date_pay_list(Request $request)
    {
        if(isset($request->month)){

            $month = $request->month;

            $bills = Bill::orderby('issue_date', 'ASC')
                        ->where('issuer', '=', '1')
                        ->whereYear('due_date', substr($month, 0, 4))
                        ->whereMonth('due_date', substr($month, 5, 2))
                        ->paginate(20);

            $sumAmount = Bill::where('issuer', '=', '1')
                            ->whereYear('due_date', substr($month, 0, 4))
                            ->whereMonth('due_date', substr($month, 5, 2))
                            ->sum('amount');

            foreach($bills as $bill){
                $dueDateWareki = My_func::wareki(substr($bill->due_date, 0, 4));
                $dueDateWareki = preg_replace('/[^0-9]/', '', $dueDateWareki);
                $bill->due_date_wareki = $dueDateWareki;
            }

            $wareki = My_func::wareki(substr($month, 0, 4));

        } else {

            $month = date('Y-m');

            $bills = Bill::orderby('issue_date', 'ASC')
                        ->where('issuer', '=', '1')
                        ->whereYear('due_date', date('Y'))
                        ->whereMonth('due_date', date('m'))
                        ->paginate(20);

            $sumAmount = Bill::where('issuer', '=', '1')
                            ->whereYear('due_date', substr($month, 0, 4))
                            ->whereMonth('due_date', substr($month, 5, 2))
                            ->sum('amount');

            foreach($bills as $bill){
                $dueDateWareki = My_func::wareki(substr($bill->due_date, 0, 4));
                $dueDateWareki = preg_replace('/[^0-9]/', '', $dueDateWareki);
                $bill->due_date_wareki = $dueDateWareki;
            }

            $wareki = My_func::wareki(date('Y'));
        }

        return view('pages.index', compact(['bills', 'month', 'wareki', 'sumAmount']));
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

        $bill->issue_date_wareki = My_func::wareki(substr($bill->issue_date, 0, 4));
        $bill->due_date_wareki = preg_replace('/[^0-9]/', '', My_func::wareki(substr($bill->due_date, 0, 4)));

        $prev_issue_date = $request->issue_date;
        
        return back()->with(['prev_issue_date' => $prev_issue_date, 'bill' => $bill]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bill $bill)
    {
        return view('pages.edit_bill', compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bill $bill)
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

        $bill->issue_date = $request->issue_date;
        $bill->types_of_bills = $request->types_of_bills;
        $bill->issuer = $request->issuer;
        $bill->receiver = $request->receiver;
        $bill->payment_address = $request->payment_address;
        $bill->payment_place = $request->payment_place;
        $bill->due_date = $request->due_date;
        $bill->amount = $amount;
        $bill->save();

        if($bill->issuer == 1){
            $url = '/paylist?month='.substr($bill->issue_date, 0, 7);
        } else {
            $url = '/list?month='.substr($bill->issue_date, 0, 7);
        }
        
        return redirect($url);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        $bill->delete();

        return back();
    }

    public function get_issuer_data(Request $request)
    {
        $issuer_data = Bill::orderby('id', 'DESC')
                            ->where('issuer', '=', $request->issuer)
                            ->first();
        if($issuer_data){
            if($issuer_data->issuer == 1){
                $issuer_data->receiver = "";
            }
        }

        return response()->json($issuer_data, 200); 
    }
}
