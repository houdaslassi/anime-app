<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $results = null;
        if($query = $request->get('query')){
            $results = Anime::search($query)->paginate(5);
        }
        return view('search',[
            'results' => $results
        ]);
    }
}
