<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\PDF;
use App\Models\Link;
use App\Models\Snippet;

class visitorController extends Controller
{
    public function getLinks(){
        $links = Link::all();
        return inertia('Links',['links' => $links]);
    }

    public function getSnippets(){
        $snippets = Snippet::all();
        return inertia('Snippets',['snippets' => $snippets]);
    }

    public function getPDFs(){
        $pdfs = PDF::all();
        return inertia('PDFs',['pdfs' => $pdfs]);
    }


    public function download(Request $request)
    {

        $file_name = $request->pdfFile;
        return Storage::download($file_name);
    }
}
