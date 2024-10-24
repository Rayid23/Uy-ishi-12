<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $_SESSION['actived'] = 2;

        $joined = Post::leftJoin('categories', 'posts.cat_id', '=', 'categories.id')->select('posts.*', 'categories.name as cat_name')->paginate(10);
        return view('posts.post', ['posts'=>$joined]);
    }
    public function create(){
        $cat = Category::all();
        return view ('posts.create', ['category' => $cat]);
    }

    public function store(Request $request){
        $request->validate([
            'cat_id'=>'required|exists:categories,id',
            'title'=>'required|max:255',
            'body'=>'required',
        ]);

        $data = $request->all();
        $data['likes'] = rand(1,999);
        $data['dislikes'] = rand(1, 999);
        Post::create($data);

        return redirect('/posts')->with('check', ['Успешно добавлено данные', 'success']);
    }

    public function show(int $id){
        $post = Post::find($id);
        return view('posts.show', ['posts' => $post]);
    }

    public function delete(int $id){
        $model = Post::find($id);
        $model->delete();
        return redirect('/posts')->with('check', ['Успешно удалено данные', 'danger']);  
    }
}
