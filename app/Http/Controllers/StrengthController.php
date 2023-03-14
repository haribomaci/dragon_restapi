<?php

namespace App\Http\Controllers;
use App\Models\Strength;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Http\Resources\Strength as StrengthResources;
use Validator;

class StrengthController extends BaseController
{

    public function index()
    {
        $strengths = Strength::with("dragon")->get();
        return $this->sendResponse(StrengthResources::collection($strengths),"ok");
    }

    public function update(Request $request, $id ){
        $input = $request->all();

        $validator = Validator::make($input, [
            "strength"=> "required"
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
       }

       $strengths = Strength::find($id);
       $strengths->update($request->all());

            return $this->sendResponse(new StrengthResources($strengths), "Képesség frissítve");
    }

    public function store(Request $request){
        $input =$request->all();
        $validator = Validator::make($input, [
            "strength" => "required"
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $strengths = Strength::create($input);

        return $this->sendResponse(New StrengthResources($strengths), "Képesség hozzáadva");
    }

    public function destroy($id){
        Strength::destroy($id);

            return $this->sendResponse([],"Post törölve");
    }
}
