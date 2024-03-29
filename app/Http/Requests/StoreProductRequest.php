<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        return ["nama_kopi" => "required|string|max:255",
        "harga" => "required|numeric|min:0",
        //"gambar"=>"required|string|mimes:jpg,jpeg,png|max:255",
        "gambar" => "required|images|file|max:1024658",
        "stock" => "required|numeric|min:0",
        ];
        //
    }
    public function message(): array
    {
        return[
            'nama_kopi.required'=>'masukkan nama',
            'harga.required'=>'masukkan harga',
            'gambar.required'=>'masukkan gambar',
            'stock.required'=>'masukkan stock'
        ];
    }
}
