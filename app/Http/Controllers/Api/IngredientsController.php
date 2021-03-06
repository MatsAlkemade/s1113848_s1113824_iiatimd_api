<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Auth;

class IngredientsController extends Controller
{
    public function store(Request $request){

        $ingredient = new Ingredient;
        $ingredient->name = $request->name;

        $ingredient->save();
        return response()->json([
            'success'=> true,
            'message' => 'Toegevoegd!',
            'ingredient' => $ingredient,
        ]);
    }

    public function destroy(Request $request){
        $ingredient = Ingredient::find($request->id);
        try {
            $ingredient->delete();
            return response()->json([
                'success' => true,
                'message'=> 'Deleted!'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => ''.$e
            ]);
        }
    }

    // what is in the db
    public function ingredients(){
        $ingredients = Ingredient::orderBy('name', 'asc')->get();
        return response()->json([
            'ingredients' => $ingredients
        ]);
    }
}
