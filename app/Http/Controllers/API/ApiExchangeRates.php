<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExchangeRate;
use Validator;
use App\Http\Controllers\Enum\ValidateEnum;
use App\Http\Resources\ExchangeRate as ExchangeRateResources;
class ApiExchangeRates extends Controller
{
    //

    public function showRate(){
        return view('admin.exchange-rate');
    }

    public function store(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED, $error->required());
        if(!$validate->passes()){
            return response()->json(['status' => 0, 'error'=> $validate->errors()->toArray()]);
        }else{
            $rate = new ExchangeRateResources(ExchangeRate::create([
                'name'      => [
                    'ar'        => $request->name_ar,
                    'en'        => $request->name_en,
                ],
                'sale'      => $request->sale,
                'buy'       => $request->buy,
            ]));
            if($rate)
                return response()->json(['status' => 1, 'success' =>__('main.Success')]);
            return response()->json(['error' => 'sorry can not insert']);
        }
    }

    public function show(){
        $rates = ExchangeRateResources::collection(ExchangeRate::get());
        return response()->json([
            'status'    => 1,
            'rates'     => $rates
        ]);
    }

    public function edit($id){
        $rate = ExchangeRate::find($id);
        return response()->json([
            'status'    => 1,
            'rate'      => $rate,
        ]);
    }

    public function update(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED, $error->required());
        if(!$validate->passes()){
            return response()->json(['status' => 0, 'error'=> $validate->errors()->toArray()]);
        }else{
            $id = $request->id;
            $find = ExchangeRate::find($id);
            $find->name = [
                'ar'        => $request->name_ar,
                'en'        => $request->name_en
            ];
            $find->sale = $request->sale;
            $find->buy = $request->buy;
            $update = new ExchangeRateResources($find->update());
            if($update)
                return response()->json(['status' => 1, 'success' =>__('main.Success')]);
        }
    }

    public function active(Request $request){
        $rate;
        $id = $request->rate_active_id;
        $find = new ExchangeRateResources(ExchangeRate::find($id));
        if($find->is_active == 0){
            $rate = new ExchangeRateResources(ExchangeRate::where('id', $id)->update(['is_active' => 1]));
        }else{
            $rate = new ExchangeRateResources(ExchangeRate::where('id', $id)->update(['is_active' => 0]));
        }
        if($rate)
            return response()->json(['status' => 1, 'success' =>__('main.Success')]);
        return back()->with(['error'=>'can not inserted']);
    }

    public function delete(Request $request){
        $id = $request->id;
        $find = ExchangeRate::find($id);
        $delete = $find->delete();
        if($delete)
            return response()->json(['status' => 1, 'success' =>__('main.Success')]);
        return back()->with(['error'=>'can not inserted']);
    }


}
