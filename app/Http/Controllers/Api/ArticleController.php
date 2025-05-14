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
       try{
            $data = $request->validated();
            $article = Article::create($data);
            return response()->json([
                "msg" => "l'article a été ajoutée " ,
                "data" => $article
            ]);
        }catch(Exception $e){
            return response()->json($e) ;
        }

    }

    public function update(EditArticleRequest $request ,$id)
    {

      try{

        $data = $request->validated();
        $article = Article::findorfail($id);
        $article->update($data);

        return response()->json([
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
            "msg" => "l'article a été supprimé " ,
            "data" => $article
        ]);

    }catch(Exception $e){
            return Response()->json($e)  ;
        }
    }

    public function show($id){
        $article = Article::find();
        if(!$article){
            return response()->json([
                'error' => 'article not found',
            ]);
        }

        return $article;
    }

}
