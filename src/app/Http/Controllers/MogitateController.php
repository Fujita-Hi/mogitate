<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Models\ProductSeason;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateRequest;

class MogitateController extends Controller
{
    public function products(){
        $products = Product::paginate(6);
        $keyword = null;
        $sort=null;
        return view('products', compact('products', 'keyword', 'sort'));
    }

    public function search(Request $request){
        $keyword = $request->keyword;
        $sort = $request->sort;
        if(!$sort){
            $products = Product::where('name', 'LIKE', '%' . $keyword . '%')->paginate(6);
        }
        else{
            $products = Product::where('name', 'LIKE', '%' . $keyword . '%')->orderBy('price', $sort)->paginate(6);
        }
        
        return view('products', compact('products', 'keyword', 'sort'));
    }

    public function register(){
        return view('register');
    }

    public function upload(RegisterRequest $request){
        if ($request->hasFile('image')) {
            $upload_file = $request->file('image');
            $file_name = $upload_file->getClientOriginalName();
            $request->file('image')->storeAs('img', $file_name);
        }
        

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $file_name;
        $product->description = $request->description;
        $product->save();

        $season_ids = $request->input('seasons', []);
        $product->seasons()->sync($season_ids);
        
        return redirect()->route('products');
    }

    public function detail($product_id){
        $product = Product::findOrFail($product_id);
        $season_ids = $product->seasons->pluck('id')->toArray();
        $seasons = [
            'haru' => in_array(1, $season_ids),
            'natsu' => in_array(2, $season_ids),
            'aki' => in_array(3, $season_ids),
            'fuyu' => in_array(4, $season_ids),
        ];
        return view('detail', compact('product', 'seasons'));
    }

    public function update(UpdateRequest $request, $product_id){
        $product = Product::findOrFail($product_id);

        if ($request->hasFile('image')) {
            $upload_file = $request->file('image');
            $file_name = $upload_file->getClientOriginalName();
            $request->file('image')->storeAs('img', $file_name);    
            $product->image = $file_name;
        }
        
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        $season_ids = $request->input('seasons', []);
        $product->seasons()->sync($season_ids);
        
        return redirect()->route('products');
    }

    public function delete($product_id){
        $product = Product::findOrFail($product_id);
        $product->delete();
        
        return redirect()->route('products');
    }

}