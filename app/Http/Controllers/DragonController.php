<?php

namespace App\Http\Controllers;
use App\Models\Strength;
use App\Models\Dragon;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Http\Resources\Dragon as DragonResources;
use Validator;

class DragonController extends BaseController
{
    public function store(Request $request){
        $input = $request->all();
        $input["strength_id"] = Strength::where("strength",$input["strength_id"])->first()->id;
        

        $input["strength_id"] = $strength->id;
        $validator = Validator::make($input, [
            "name"=>"required",
            "age"=>"required",
            "strength_id"=>"required"
        ]);

        if($validator->fails()){
             return $this->sendError($validator->errors());
        }

         $dragon = Dragon::create($input);

        return $this->sendResponse(new DragonResources($dragon), "létrehozva");
    }

    public function index()
    {
        $dragons = Dragon::all();
        return $this->sendResponse(DragonResources::collection($dragons),"ok");
    }

    public function show($id){
        $dragon = Dragon::find($id);

        if(is_null( $dragon )){
            return $this->sendError("Sárkány nem létezik");
        }

        return $this->sendResponse( new DragonResources($dragon), "Ok");
    }

    public function update(Request $request, $id ){
        $input = $request->all();

        $validator = Validator::make($input, [
            "name"=> "required",
            "age"=> "required"
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
       }

       $dragon = Dragon::find($id);
       $dragon->update($request->all());

       return $this->sendResponse(new DragonResources($dragon), "Sárkány frissítve");
    }

    public function destroy($id){
        Dragon::destroy($id);

        return $this->sendResponse([],"Post törölve");
    }
}
