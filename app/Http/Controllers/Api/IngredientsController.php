<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Auth;

class IngredientsController extends Controller
{
    public function create(Request $request){

        $ingredient = new Ingredient;
        $ingredient->name = $request->name;

        $ingredient->save();
        return response()->json([
            'werktWel'=> true,
            'message' => 'Toegevoegd!',
            'ingredient' => $ingredient,
        ]);
    }

    public function delete(Request $request){
        $ingredient = Ingredient::find($request->id);
        $ingredient->delete();
        return response()->json([
            'succes' => true,
            'message' => 'ingredient deleted'
        ]);
    }
}