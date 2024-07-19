<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Charge;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'title' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        Charge::create($request->only('account_id', 'title', 'amount'));

        $account = Account::with(['charges', 'payments', 'student'])->find($request->account_id);
        $charges = $account->charges;
        $payments = $account->payments;
        $student = $account->student;

        return view('billing.partials.billing_content', compact('account', 'charges', 'payments'));
    }

    public function destroy(Charge $charge)
    {
        $charge->delete();

        $account = Account::with(['charges', 'payments', 'student'])->find($charge->account_id);
        $charges = $account->charges;
        $payments = $account->payments;
        $student = $account->student;

        return view('billing.partials.billing_content', compact('account', 'charges', 'payments'));
    }




}
