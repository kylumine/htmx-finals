<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function show(Student $student)
    {
        $account = $student->accounts()->latest()->first();
        $charges = $account->charges;
        $payments = $account->payments;

        return view('billing.show', compact('student', 'account', 'charges', 'payments'));
    }
}
