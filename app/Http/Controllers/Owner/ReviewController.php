<?php

namespace Tenomed\Http\Controllers\owner;

use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:owner');
    }
}
