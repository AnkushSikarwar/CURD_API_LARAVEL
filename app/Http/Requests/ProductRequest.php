<?php

// namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;

// class ProductRequest extends FormRequest
// {
//     /**
//      * Determine if the user is authorized to make this request.
//      */
//     public function authorize()
//     {
//         return true;
//     }



//     /**
//      * Get the validation rules that apply to the request.
//      *
//      * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
//      */
//     public function rules(): array
//     {
//         return [
//             'name'=>'required|max:255|unique:products','name','.$this->product',
//             'description'=>'required',
//             'price'=>'required|max:10',
//             'discount'=>'required|max:4',
//         ];
//     }
//     public function store(ProductRequest $productRequest){
//         return $productRequest->all();
//     }
// }


// app/Http/Requests/ProductRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
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
        if(request()->isMethod('put'))
   {     return [
            'name' => 'required|max:255|unique:products,name,' . $this->product,
            'description' => 'required',
            'price' => 'required|numeric|max:9999999999',
            'discount' => 'required|numeric|max:9999',
        ];}
        else{
            return [
                'name' => 'required|max:255|unique:products,name,' . $this->product,
                'description' => 'required',
                'price' => 'required|numeric|max:9999999999',
                'discount' => 'required|numeric|max:9999',
            ];
        }
    }
}
