<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\{Snippet, PDF, Link};


class managementController extends Controller
{

    // Link related methods

    public function linkManager()
    {
        return inertia('LinkManager');
    }

    public function indexLinks()
    {

        $links = Link::all();
        return $links;
    }

    public function storeLink(Request $request)
    {

        $request->validate(['title', 'link', 'open_in_new_tab']);

        return Link::create($request->all());

    }

    public function editLink($id)
    {
        $link = Link::find($id);
        return inertia('EditLink', ["item" => $link]);
    }

    public function updateLink(Request $request)
    {

        $link = Link::find($request->id);
        $link->update($request->all());

        return Redirect::route('link.linkManager');
    }

    public function destroyLink($id)
    {
        return Link::destroy($id);
    }


    // PDF related methods
    
    public function pdfManager()
    {
        return inertia('PDFManager');
    }

    public function indexPDF()
    {

        $pdfs = PDF::all();
        return $pdfs;
    }

    public function storePDF(Request $request)
    {

        $request->validate(['title' => 'required', 'pdf' => 'required', ]);

        if ($request->hasFile('pdf'))
        {

            $random = Str::random(30);

            $file = $request->file('pdf');
            $filename = $file->getClientOriginalName();

            $path = 'storage/pdfs/';

            $file->storeAs($path, $random.$filename, 'local');

            $file_url = $path.$random.$filename;
        }

        $pdf = new PDF;
        $pdf->title = $request->title;
        $pdf->file_url = $file_url;
        $pdf->save();

        return $pdf;

    }

    public function editPDF($id)
    {
        $pdf = PDF::find($id);
        return inertia('EditPDF', ["item" => $pdf]);
    }

    public function updatePDF(Request $request)
    {

        if ($request->hasFile('pdf') && $request->title)
        {

            $random = Str::random(30);

            $file = $request->file('pdf');
            $filename = $file->getClientOriginalName();

            $path = 'storage/pdfs/';

            $file->storeAs($path, $random.$filename, 'local');

            $file_url = $path.$random.$filename;

            $pdf = PDF::find($request->id);

            Storage::disk('local')->delete($pdf->file_url);
            
            $pdf->file_url = $file_url;
            $pdf->title = $request->title;

            $pdf->save();
        }

        $pdf = PDF::find($request->id);
        $pdf->update($request->all());

        return Redirect::route('pdf.pdfManager');
    }

    public function destroyPDF($id)
    {

        $pdf = PDF::find($id);
        Storage::disk('local')->delete($pdf->file_url);

        return PDF::destroy($id);
    }



    // Snippet related methods

    public function snippetManager()
    {
        return inertia('SnippetManager');
    }

    public function indexSnippets()
    {

        $snippets = Snippet::all();
        return $snippets;
    }

    public function storeSnippet(Request $request)
    {

        $request->validate(['title', 'description', 'snippet']);
        return Snippet::create($request->all());

    }

    public function editSnippet($id)
    {
        $snippet = Snippet::find($id);
        return inertia('EditSnippet', ["item" => $snippet]);
    }

    public function updateSnippet(Request $request)
    {

        $snippet = Snippet::find($request->id);
        $snippet->update($request->all());

        return Redirect::route('snippet.snippetManager');
    }

    public function destroySnippet($id)
    {
        return Snippet::destroy($id);
    }

}

