<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Glosarium;
use Illuminate\Http\Request;

class GlosariumApiController extends Controller
{
    /**
     * Live search API untuk glosarium
     */
    public function search(Request $request)
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
