<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
    public function create()
    {
        return view('admin.portfolio.document.new-document');
    }


    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,png,jpg,jpeg,gif,mp4',
            'title' => 'required',
        ]);
        $data = new Document;
        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $request->file->move(public_path('documents/'), $filename);
            $data->file = $filename;
            }
            $data->title = $request->title;
            $data->user_id = Auth::id();
            $data->save();
            return response()->json([
                'success' => 'Done', 200
            ]);
        }

    public function show()
    {
        $document = Document::OrderBy('id', 'desc')->get();
        return view('admin.portfolio.document.show-document', compact('document'));
    }

    public function download($file)
    {
        return response()->download('documents/' . $file);
        return view('admin.portfolio.document.show-document', compact('document'));
    }


    public function edit($id)
    {
        $document = Document::find($id);
        return view('admin.portfolio.document.edit-document', compact('document'));
    }

    public function update(Request $request)
    {
        $document = Document::find($request->document_id);

        $request->validate([
            'title' => 'required'
        ]);

        $array = [];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            if (File::exists(public_path('documents/') . $document->file)) {
                File::delete(public_path('documents/') . $document->file);
            }
            $file->move(public_path('documents/'), $filename);
            $array = ['file' => $filename] + $array;
        }

        if ($request->title != $document->title) {
            $array['title'] = $request->title;
        }

        if (!empty($array)) {
            $document->update($array);
        }

        return response()->json([
            'status' => true,
            'msg' => 'تم تحديث البيانات بنجاح',
        ]);
    }


    public function view($id)
    {
        $document = Document::find($id);
        return view('admin.portfolio.document.view-document', compact('document'));
    }


    public function deleteDocument(Request $request)
    {
        $doc = Document::find($request->id);

        if (!$doc) {
            return response()->json();
        }
        if (File::exists(public_path('documents/') . $doc->file)) {
            File::delete(public_path('documents/') . $doc->file);
        }
        $doc->delete();

        return response()->json([
            'status' => true,
            'msg' => 'تم الحذف بنجاح',
            'id' =>  $request->id
        ]);
    }
}
