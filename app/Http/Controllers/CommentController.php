<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $_SESSION['actived'] = 5;

        $joined = Comment::leftJoin('posts', 'comments.post_id', '=', 'posts.id')->select('comments.*', 'posts.title as pos_title')->paginate(10);

        return view('comments.comment', ['com' => $joined]);
    }

    public function create()
    {
        $post = Post::all();
        return view('comments.create', ['posts' => $post]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required',
        ]);

        $data = $request->all();
        Comment::create($data);

        return redirect('/comment')->with('check', ['Успешно добавлено данные', 'success']);
    }
    public function show(int $id)
    {
        $comments = Comment::find($id);
        return view('comments.show', ['comments' => $comments]);
    }

    public function delete(int $id)
    {
        $model = Comment::find($id);
        $model->delete();
        return redirect('/comment')->with('check', ['Успешно удалено данные', 'danger']);
    }
}
