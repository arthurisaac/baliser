<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\PhoneResource;
use App\Models\Phone;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhoneController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phones = Phone::all();
        return $this->sendResponse(new PhoneResource($phones), 'All phones.');
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
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'device_model' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $phone = Phone::query()->where("name", $input['name'])->first();
        if (is_null($phone)) {
            $phone = Phone::create($input);
        }

        return $this->sendResponse(new PhoneResource($phone), 'Phone added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $phone = Phone::query()->find($id);
        if (is_null($phone)) {
            return $this->sendError('Phone not found.');
        }
        return $this->sendResponse(new PhoneResource($phone), 'Phone Retrieved Successfully.');
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
