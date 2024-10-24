<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $_SESSION['actived'] = 4;

        $joined = Order::leftJoin('products', 'orders.prod_id', '=', 'products.id')->select('orders.*', 'products.name as prod_name')->paginate(10);
        return view('order.order', ['orders' => $joined]);
    }
    public function create()
    {
        $product = Product::all();
        return view('order.create', ['products' => $product]);
    }
    public function store(Request $request)
    {

        $request->validate([
            'prod_id' => 'required|exists:products,id',
            'count' => "required",
        ]);

        $data = $request->all();
        $product_price = Product::find($request->prod_id);
        $data['summa'] = $product_price->price * $request->count;
        Order::create($data);

        return redirect('/orders')->with('check', ['Успешно добавлено данные', 'success']);
    }

    public function show(int $id)
    {
        $orders = Order::find($id);
        return view('order.show', ['orders' => $orders]);
    }

    public function delete(int $id)
    {
        $model = Order::find($id);
        $model->delete();
        return redirect('/orders')->with('check', ['Успешно удалено данные', 'danger']);
    }
}
