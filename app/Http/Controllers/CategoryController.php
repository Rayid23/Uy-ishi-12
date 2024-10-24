<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $_SESSION['actived'] = 1;
        $category = Category::paginate(10);
        
        return view('category.category', ['category' => $category]);
    }
    public function create(){
        return view ('category.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'=> 'required|max:255',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect('/')->with('check', ['Успешно добавлено данные', 'success']);
    }

    public function show(int $id){
        $category = Category::find($id);
        return view('category.show', ['category' => $category]);
    }

    public function delete(int $id){
        $model = Category::find($id);
        $model->delete();
        return redirect('/')->with('check', ['Успешно удалено данные', 'danger']);   
    }
}
