<?php

namespace App\Http\Controllers;

use App\StackExchangeSearch\SearchService;
use Illuminate\Http\Request;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($request->has('query')) {
            $issuesList = app(SearchService::class)->search($query);
            return view('index.result', compact('query', 'issuesList'));
        } else {
            return view('index.index');
        }
    }
}
