<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\CaptureAudio;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PhoneResource;

class CaptureAudioController extends BaseController
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

        $fileName =  time() . '.'. $request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);

        $input['name'] = $fileName;
        $capture = CaptureAudio::create($input);

        $phone = Phone::query()->find($input['phone']);
        $phone->captureAudio = 0;
        $phone->captureAudioDuration = 0;
        $phone->save();

        return $this->sendResponse(new PhoneResource($capture), 'Capture photo added.');
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
