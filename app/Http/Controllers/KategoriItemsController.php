<?php
namespace App\Http\Controllers;
use App\Models\KategoriItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KategoriItemsController extends Controller
{
    public function index() {
        return view('kategori_items.index.index');
    }

    public function search(Request $request) {
        // Filter nama dan kode 
        $data = KategoriItem::query();
        if ($request->nama) $data->where('nama', 'LIKE', '%'.$request->nama.'%');
        if ($request->kode) $data->where('kode', 'LIKE', '%'.$request->kode.'%');
        
        return response()->json(['status' => 200, 'data' => $data->get()]);
    }

    public function formSubmit(Request $request) {
        $request->validate(['nama' => 'required', 'kode' => 'required']);
        return redirect('kategori-items');
    }

    // EAGER LOADING 
    public function singleView($id) {
        // Menggunakan with('masterItems') agar query cepat
        $data['kategori'] = KategoriItem::with('masterItems')->findOrFail($id); 
        return view('kategori_items.single.index', $data);
    }
    public function exportPdf($id) {
    $data['kategori'] = \App\Models\KategoriItem::with('masterItems')->findOrFail($id);
    
    $pdf = Pdf::loadView('kategori_items.single.pdf', $data);
    return $pdf->download('Kategori_'.$data['kategori']->nama.'.pdf');
}
}