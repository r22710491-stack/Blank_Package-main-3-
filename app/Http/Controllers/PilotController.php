<?php

namespace App\Http\Controllers;

use App\Models\havapeyma;
use App\Models\Pilot;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class PilotController extends Controller
{
    public function store(Request $request)
    {
        $Pilot =   havapeyma::create($request->all());
        return response()->json([
            'massage' => 'خلبان با موفقیت ایجاد شد',
            'data' => $Pilot
        ]);
    }
    public function show(havapeyma $Pilot)
    {
        return response()->json([
            'message' => 'اطلاعات خلبان با موفقیت ارسال شد',
            'data' => $Pilot
        ]);
    }
    #[NoReturn]
    public function update(Request $request, Havapeyma $Pilot )
    {

        $Pilot->update(\request()->all());
        $Pilot  = havapeyma::find($Pilot->id);

        return response()->json([
            'message' => 'اطلاعات خلبان با موفقیت بروزرسانی شد',
            'data' => $Pilot
        ]);
    }

    public function destroy(havapeyma $havapeyma)
    {
        $havapeyma->delete();
        return response()->json([
            'massage'=>'حذف هواپیما با موفقیت انجام شد',
            'data' => $havapeyma
        ]);
    }
    public function token(Pilot $pilot)
    {
        $pilotToken = $pilot->createToken('User |  Api');
        return response()->json([
            'massage'=>'کاربر با موفقیت ثبت شد',
            'token' => $pilotToken->plainTextToken,$pilot
        ]);
    }

}
