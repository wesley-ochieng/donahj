<?php

namespace App\Http\Controllers;

use App\Models\BulkUpload;
use Illuminate\Http\Request;
use Str;

class BulkUploadController extends Controller
{
    // create a bulk upload from excel file
    public function bulkUpload(Request $request)
    {
        try {
            if ($request->file) {
                $file = $request->file('file');

                // File Details
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $tempPath = $file->getRealPath();
                $fileSize = $file->getSize();
                $mimeType = $file->getMimeType();

                $valid_extension = array("csv");

                // 20MB in Bytes
                $maxFileSize = 209715200000;

                if (in_array(strtolower($extension), $valid_extension)) {

                    if ($fileSize <= $maxFileSize) {

                        $location = storage_path('app/public') . '/uploads/usersfile/';

                        $file->move($location, $filename);

                        $filepath = $location . '/' . $filename;

                        $file = fopen($filepath, "r");

                        $importData_arr = array();
                        $i = 0;

                        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                            $num = count($filedata);

                            if ($i == 0) {
                                $i++;
                                continue;
                            }
                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata[$c];
                            }
                            $i++;
                        }

                        fclose($file);
                        foreach ($importData_arr as $importData) {
                            $transaction['payment_code'] = $importData[0];
                            $transaction['inititation_time'] = $importData[1];
                            $transaction['details'] = $importData[2];
                            $transaction['transaction_status'] = $importData[3];
                            $transaction['transaction_amount'] = $importData[4];
                            $transaction['other_party'] = $importData[8];
                            $transaction['status'] = 'paid';
                            $transaction['ticket_number'] = Str::orderedUuid();
                            // check if the transaction exists
                            $transactionExists = BulkUpload::where('payment_code', $transaction['payment_code'])->first();

                            // if the transaction does not exist, create it otherwise skip
                            if (!$transactionExists) {
                                BulkUpload::create($transaction);
                            }
                        }

                        toastr()->success('Payments uploaded successfully!');
                        return redirect()->back();
                    } else {
                        toastr()->error('File too large. File must be less than 2MB.');
                        return redirect()->back();
                    }
                } else {
                    // toastr()->error('Invalid File Extension');
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Invalid File Extension',
                    ]);
                }
            }
        } catch (\Exception $e) {
            // toastr()->error($e->getMessage());
            $message = str_replace(array("\r", "\n", "'", "`"), ' ', $e->getMessage());
            $error = sprintf('[%s],[%d] ERROR:[%s]', __METHOD__, __LINE__, json_encode($e->getMessage(), true));
            toastr()->error($error);
            return back();
        }
    }

    public function storeBulk (Request $request) {
        try {
            // upload file
            Excel::import(new PaymentImport, $request->file('file'));
        
            return redirect('/')->with('success', 'All good!');
        } catch (\Throwable $th) {
            toastr('error', $th->getMessage());
            return redirect()->back();
        }
    }
}
