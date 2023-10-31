<?php

namespace App\Http\Controllers;

use App\Models\Foundation;
use Illuminate\Http\Request;
use Validator;
use Storage;
use DB;
use Log;
use Session;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use DataTables;
use Str;


class FoundationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foundations = Foundation::all();
        return view('foundation.index', compact('foundations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'header_image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'target'=>'required'
        ]);
        if($validator->fails()){
            foreach ($validator->errors()->all() as $error) {
                toastr()->warning($error);
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            $foundation = new Foundation();
            $foundation->name = $request->name;
            $foundation->start_date = $request->start_date;
            $foundation->end_date = $request->end_date;
            $foundation->target = $request->target;
            $foundation->description = $request->description;
            $foundation->slug = Str::slug($request->name);
            $foundation->save();

            if($request->hasFile('header_image')){

                $image_path = Storage::disk('public')->put('/Images/Foundation/'.$foundation->id, $request->header_image);
                $foundation->header_image = $image_path;
                $foundation->save();
            }
            //generate qr code that will rediriect user to the route foundation/id/pay
            $qr_code = QrCode::format('png')->size(900)->color( 0, 102, 0)->generate(route('foundation.pay', $foundation->id));
            $path = 'qr_codes/'.$foundation->id.'.png';
            Storage::disk('public')->put($path, $qr_code);
            $foundation->qr_code = $foundation->id.'.png';
            $foundation->save();
            DB::commit();
            toastr()->success('Foundation created successfully');
            return redirect()->back();  
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th->getMessage());
            toastr()->error('Something went wrong');
            return redirect()->back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foundation  $foundation
     * @return \Illuminate\Http\Response
     */
    public function show(Foundation $foundation)
    {
        //
         return response()->json($foundation, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foundation  $foundation
     * @return \Illuminate\Http\Response
     */
    public function edit(Foundation $foundation)
    {
        //
        return response()->json($foundation, 200);
    }

    public function showPage(Foundation $foundation ){
        return view('foundation.pay', compact('foundation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foundation  $foundation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foundation $foundation)
    {
        //

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'header_image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'target'=>'required'
        ]);
        if($validator->fails()){
            foreach ($validator->errors()->all() as $error) {
                toastr()->warning($error);
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            $foundation->name = $request->name;
            $foundation->start_date = $request->start_date;
            $foundation->end_date = $request->end_date;
            $foundation->description = $request->description;
            $foundation->target = $request->target;
            $foundation->save();
            if($request->hasFile('header_image')){
                $image_path = Storage::disk('public')->put('/Images/Foundation/'.$foundation->id, $request->header_image);
                $foundation->header_image = $image_path;
                $event->save();
            }
            DB::commit();
            toastr()->success('Foundation updated successfully');
            return redirect()->view('foundation.index');  
        } catch (\Throwable $th) {
            DB::rollback();
            toastr()->error('Something went wrong');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foundation  $foundation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foundation $foundation)
    {
        try {
            DB::beginTransaction();
            $foundation->delete();
            DB::commit();
            toastr()->success('Foundation deleted successfully');
            return redirect()->view('foundation.index');  
        } catch (\Throwable $th) {
            DB::rollback();
            toastr()->error('Something went wrong');
            return redirect()->back()->withInput();
        }
    }
}
