<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'datetime' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        $account = Account::findOrFail($request->account_id);
        $account->payments()->create($request->only('datetime', 'amount'));

        $charges = $account->charges;
        $payments = $account->payments;
        $student = $account->student;

        return view('billing.partials.billing_content', compact('account', 'charges', 'payments'));
    }



}
