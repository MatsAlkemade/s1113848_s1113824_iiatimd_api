<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cocktail;
use Illuminate\Support\Facades\Auth;

class CocktailsController extends Controller
{
    public function create(Request $request){

        $cocktail = new Cocktail;
        $cocktail->title = $request->title;
        $cocktail->desc = $request->desc;

        if($request->photo != ''){
            $photo = time().'jpg';
            file_put_contents('storage/cocktails/'.$photo,base64_decode($request->photo));
            $cocktail->photo = $photo; 
        }

        $cocktail->save();
        $cocktail->user;
        return response()->json([
            'werktWel'=> true,
            'message' => 'Toegevoegd!',
            'cocktail' => $cocktail]);
    }

    public function show(){
        return "Hello world";
    }
}