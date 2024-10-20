<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use PDF;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'received_from' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'sum' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
        ]);
    
        // Auto-generate a unique document number
        $documentNumber = 'DOC-' . str_pad(Document::max('id') + 1, 6, '0', STR_PAD_LEFT);
        // Merge the generated number into the validated data
        $data = array_merge($validated, ['number' => $documentNumber]);
        // Create a new document with the validated data and the generated number
        Document::create($data);
        return redirect()->route('documents.index')->with('success', 'Document created successfully!');
    }
    
    

public function show(Document $document)
{
    // Pass the document to the view
    return view('documents.show', compact('document'));
}


    public function edit(Document $document)
    {
        return view('documents.edit', compact('document'));
    }
    public function update(Request $request, Document $document)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'number' => 'nullable|string', // Nullable since it is auto-generated if not provided
            'amount' => 'required|string',
            'received_from' => 'required|string|max:255',
            'sum' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
        ]);
    
        // If the number is not provided, generate it (in case it needs to be changed manually)
        if (empty($validated['number'])) {
            $validated['number'] = 'DOC-' . strtoupper(uniqid());
        }
    
        // Update the document with the validated data
        $document->update($validated);
    
        return redirect()->route('documents.index')->with('success', 'Document mis à jour avec succès!');
    }
    
    

    public function downloadPDF(Document $document)
    {
        $pdf = PDF::loadView('documents.pdf', compact('document'));
        return $pdf->download('document.pdf');
    }
    public function destroy(Document $document)
{
    try {
        $document->delete();
        return response()->json([
            'success' => true,
            'message' => 'Document supprimé avec succès.'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Erreur lors de la suppression du document.'
        ], 500);
    }
}
}
