<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;

class UpdateRequest extends FormRequest
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
        $product_id = $this->route('product_id');
        $image_rule = 'required|image|mimes:jpeg,png';
        if ($product_id && $this->productHasImage($product_id)) {
            $image_rule = 'nullable|image|mimes:jpeg,png';
        }
        return [
            'name' => 'required',
            'price' => ['required', 'numeric', 'between:0,10000'],
            'image' => $image_rule,
            'seasons' => 'required',
            'description' => ['required', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'price.required' => '値段を入力してください',
            'price.numeric' => '数値で入力してください',
            'price.between' => '0~10000円以内で入力してください',
            'image.required' => '商品画像を登録してください',
            'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください',
            'seasons.required' => '季節を選択してください',
            'description.required' => '商品説明を入力してください',
            'description.max' => '120文字以内で入力してください',
        ];
    }

    private function productHasImage($product_id)
    {
        $product = Product::find($product_id);
        return $product && !empty($product->image);
    }
}
