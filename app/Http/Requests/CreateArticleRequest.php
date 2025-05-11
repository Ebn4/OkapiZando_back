<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException ; 
use Illuminate\Contracts\Validation\validator ; 

class CreateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required' , 'min : 2' , 'max : 255 '],
            'description' => ['required', 'string'] , 
            'details' => ['required', 'string'] ,
            'color' => ['required'  , 'string'],  
            'stock' => ['required' , 'integer' , 'min : 1'] ,
            'image' => ['required' , 'string'] , 
            'shop_id' => ['required', 'integer' , 'exists:users,id'] , 
            'price' => ['required', 'numeric' ] , 


        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false , 
            'error' => true , 
            'message' => 'Erreur de validation Article ' , 
            'errorsList' => $validator->errors() ,
        ]))  ;
    }
}
