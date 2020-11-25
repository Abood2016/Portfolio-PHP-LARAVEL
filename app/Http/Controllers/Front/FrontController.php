<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Portfolio;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::orderBy('id' , 'desc')->get();
        return view('front.layouts.app')->with(['portfolios' => $portfolios]);
    }


    public function show($id)
    {
        $portfolio = Portfolio::find($id);
        return view('front.portfolio.show' , compact('portfolio'));
    }


    public function download($file)
    {
        return response()->download('documents/' . $file);
        return view('front.layouts.app', compact('document'));
    }
}
