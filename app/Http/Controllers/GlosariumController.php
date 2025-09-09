<?php

namespace App\Http\Controllers;

use App\Models\Glosarium;
use Illuminate\Http\Request;

class GlosariumController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        
        if ($query) {
            // Search dengan scope untuk relevansi yang lebih baik
            $kamus = Glosarium::search($query)
                        ->orderByRelevance($query)
                        ->paginate(15)
                        ->appends(['query' => $query]);
        } else {
            $kamus = Glosarium::orderBy('judul', 'asc')->paginate(15);
        }
        
        return view('page.glosarium.index', compact('kamus', 'query'));
    }

    public function cari(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $kamus = Glosarium::search($query)
                        ->orderByRelevance($query)
                        ->paginate(15)
                        ->appends(['query' => $query]);
        } else {
            $kamus = Glosarium::orderBy('judul', 'asc')->paginate(15);
        }

        return view('page.glosarium.index', compact('kamus', 'query'));
    }

    /**
     * API untuk live search glosarium
     */
    public function apiSearch(Request $request)
    {
        $query = $request->input('query', '');
        
        if (empty($query)) {
            $kamus = Glosarium::orderBy('judul', 'asc')->paginate(15);
        } else {
            $kamus = Glosarium::search($query)
                        ->orderByRelevance($query)
                        ->paginate(15);
        }

        return response()->json([
            'data' => $kamus->items(),
            'total' => $kamus->total(),
            'current_page' => $kamus->currentPage(),
            'last_page' => $kamus->lastPage(),
            'per_page' => $kamus->perPage(),
            'from' => $kamus->firstItem(),
            'to' => $kamus->lastItem(),
            'query' => $query
        ]);
    }
}
