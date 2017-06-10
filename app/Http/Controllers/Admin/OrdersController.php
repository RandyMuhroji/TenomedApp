<?php

namespace Tenomed\Http\Controllers\Admin;

use Tenomed\Models\Order;
use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
        {
            $this->middleware('permission:admin');
            // $this->middleware('permission:create', ['only' => ['create', 'store']]);
            // $this->middleware('permission:edit', ['only' => ['edit', 'update']]);
            // $this->middleware('permission:delete', ['only' => ['show', 'delete']]);
        }
        public function index()
        {
            $orders = Order::all();

            $params = [
                'title' => 'Orders Listing',
                'orders' => $orders,
            ];

            return view('admin.orders.orders_list')->with($params);
        }
    }
