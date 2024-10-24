<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $_SESSION['actived'] = 3;

        $joined = Product::leftJoin('categories', 'products.car_id', '=', 'categories.id')->select('products.*', 'categories.name as cat_name')->paginate(10);
        return view('product.product', ['products'=>$joined]);
    }
    public function create(){
        $cat = Category::all();
        return view ('product.create', ['category' => $cat]);
    }

    public function store(Request $request){

        $request->validate([
            'car_id' => 'required|exists:categories,id',
            'name' => 'required|max:255',
            'price' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();
        Product::create($data);

        return redirect('/products')->with('check', ['Успешно добавлено данные', 'success']);
    }

    public function show(int $id){
        $products = Product::find($id);
        return view('product.show', ['products' => $products]);
    }

    public function delete(int $id){
        $model = Product::find($id);
        $model->delete();
        return redirect('/products')->with('check', ['Успешно удалено данные', 'danger']); 
    }
}
