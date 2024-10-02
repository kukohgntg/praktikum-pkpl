<?php

namespace App\Http\Controllers;

use App\Models\LoanRecord;

class LoanRecordController extends Controller
{
    public function loan_records_view()
    {
        $records = LoanRecord::with('users', 'books')->get();
        return view('loan-records', ['records' => $records]);
    }
}
