<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article ; 
use Exception ;
use App\Http\Requests\CreateArticleRequest ; 
use App\Http\Requests\EditArticleRequest ; 



class ArticleController extends Controller
{

    public function index()
    {
        try{
            return response()->json([
            "status_code" => 200, 
            "msg" => "Recuperation des articles effectué" , 
            "data" =>  Article::all() 
        ]);
        }catch(Exception $e){
            return response()->json($e) ; 
        }
    }
    public function store(CreateArticleRequest $request )
    {
       try{$article = new Article() ; 
        $article->title = $request->title ; 
        $article->description =  $request->description ; 
        $article->details = $request->details ; 
        $article->color  = $request->color ; 
        $article->stock = $request->stock ; 
        $article->image = $request->image ; 
        $article->shop_id = $request->shop_id ; 
        $article->price = $request->price ; 
        $article->save() ; 

        return response()->json([
            "status_code" => 200, 
            "msg" => "l'article a été ajoutée " , 
            "data" => $article 
        ]);
        }catch(Exception $e){
            return response()->json($e) ; 
        }

    }

    public function update(EditArticleRequest $request , Article $article)
    {

      try{ 

       $article->title = $request->title ; 
        $article->description =  $request->description ; 
        $article->details = $request->details ; 
        $article->color  = $request->color ; 
        $article->stock = $request->stock ; 
        $article->image = $request->image ; 
        $article->shop_id = $request->shop_id ; 
        $article->price = $request->price ; 
        $article->save() ; 

        return response()->json([
            "status_code" => 200, 
            "msg" => "l'article a été modifié " , 
            "data" => $article 
        ]);
    }catch(Exception $e){
            return Response()->json($e)  ;
        }
    }

    public function delete(Article $article)
    {
    try{
      $article->delete() ; 
      return response()->json([
            "status_code" => 200, 
            "msg" => "l'article a été supprimé " , 
            "data" => $article 
        ]); 

    }catch(Exception $e){
            return Response()->json($e)  ;
        }
    }
    
}
