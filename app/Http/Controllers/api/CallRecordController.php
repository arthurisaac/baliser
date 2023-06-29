<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\CallRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PhoneResource;

class CallRecordController extends BaseController
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'file' => 'required|file',
            'phone' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $request->file->move(public_path('uploads'), $request->file->getClientOriginalName());

        $input['name'] = $request->file->getClientOriginalName();

        $capture = CallRecord::query()->where("name", $input["name"])->first();
        if (is_null($capture)) {
            $capture = CallRecord::create($input);
        }

        return $this->sendResponse(new PhoneResource($capture), 'Call record added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
