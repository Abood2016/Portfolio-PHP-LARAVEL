<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio as RequestsPortfolio;
use App\Http\Requests\PortfolioRequest;
use App\Models\Document;
use App\Models\Portfolio;
use App\Traits\PortfolioTrait;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class PortfolioController extends Controller
{
    use PortfolioTrait;

    public function index()
    {

        Portfolio::all();

        if (request()->ajax()) {

            $portfolio = Portfolio::orderBy('id', 'desc')->get();
            return Datatables::of($portfolio)
                ->editColumn('name', function ($portfolio) {
                    return view('admin.portfolio.portfolioAction', compact('portfolio'));
                })->editColumn('user', function ($portfolio) {
                    return view('admin.portfolio.user', compact('portfolio'));
                })->make(true);
        }
        return view('admin.portfolio.index');
    }

    public function store(PortfolioRequest $request)
    {
        $file_name =  $this->saveImages($request->image, 'images/portfolio');
        Portfolio::create([
            'image' => $file_name,
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
        ]);
        return Response::json('success', 200);
    }


    public function edit($id, Request $request)
    {
        $where = array('id' => $id);
        $portfolio = Portfolio::where($where)->first();
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request)
    {

        $portfolio = Portfolio::find($request->portfolio_id);
        // dd($request->image);

        $array = [];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
            if (File::exists(public_path('/images/portfolio/') . $portfolio->image)) {
                File::delete(public_path('/images/portfolio/') . $portfolio->image);
            }
            $file->move(public_path('/images/portfolio/'), $fileName);
            $array = ['image' => $fileName] + $array;
        }


        if ($request->name != $portfolio->name) {
            $array['name'] = $request->name;
        }


        if ($request->description != $portfolio->description) {
            $array['description'] = $request->description;
        }


        if (!empty($array)) {
            $portfolio->update($array);
        }

        return response()->json([
            'status' => true,
            'msg' => 'تم تحديث العرض بنجاح',
        ]);
    }


    public function show($id)
    {
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.show', compact('portfolio'));
    }


    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();
        return Response()->json($portfolio);
    }



}
