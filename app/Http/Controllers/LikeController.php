<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index()
    {
        $_SESSION['actived'] = 6;

        $joined = Like::leftJoin('posts', 'likes.post_id', '=', 'posts.id')->select('likes.*', 'posts.title as pos_title')->paginate(10);

        return view('likes.like', ['likes' => $joined]);
    }
    public function create()
    {
        $post = Post::all();
        return view('likes.create', ['posts' => $post]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required',
            'is_active' => 'required',
        ]);

        $data = $request->all();

        Like::create($data);

        return redirect('/likes')->with('check', ['Успешно добавлено данные', 'success']);
    }

    public function show(int $id)
    {
        $likes = Like::find($id);
        return view('likes.show', ['likes' => $likes]);
    }

    public function delete(int $id)
    {
        $model = Like::find($id);
        $model->delete();
        return redirect('/likes')->with('check', ['Успешно удалено данные', 'danger']);
    }
}
