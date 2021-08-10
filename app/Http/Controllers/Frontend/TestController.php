<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Request;

class TestController extends BaseController
{
    public function index(Request $request)
    {
        return view('frontend.test');
    }
}
