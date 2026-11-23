<?php

namespace App\Http\Controllers;




use App\Models\havapeyma;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class HavapeymaController extends Controller
{
    public function store(Request $request)
    {
        $havapeyma =   havapeyma::create($request->all());
        return response()->json([
            'massage' => 'هواپیما با موفقیت ایجاد شد',
            'data' => $havapeyma
        ]);
    }
    public function show(havapeyma $havapeyma)
    {
        return response()->json([
            'message' => 'اطلاعات هواپیما با موفقیت ارسال شد',
            'data' => $havapeyma
        ]);
    }
    #[NoReturn]
    public function update(Request $request, Havapeyma $havapeyma )
    {

        $havapeyma->update(\request()->all());
        $havapeyma  = havapeyma::find($havapeyma->id);

        return response()->json([
            'message' => 'اطلاعات هواپیما با موفقیت بروزرسانی شد',
            'data' => $havapeyma
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




}

