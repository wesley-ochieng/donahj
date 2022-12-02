<?php

namespace App\Imports;

use App\Models\BulkUpload;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Str;

class PaymentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // check if the payment code is already in the database
        $payment_code = BulkUpload::where('payment_code', $row[0])->first();
        if($payment_code){
            return null;
        }

        return new BulkUpload([
            'ticket_number' => Str::orderedUuid(),
            'payment_code' => $row[0],
            'initiation_time' => $row[1],
            'details' => $row[2],
            'transaction_status' => $row[3],
            'amount' => $row[4],
            'other_party' => $row[8],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
