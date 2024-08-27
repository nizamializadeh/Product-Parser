<?php

namespace App\Http\Controllers;

use App\Services\ProductParserService;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;
class ProductParserController extends Controller
{
    public function parse(Request $request)
    {
        $url = $request->query('url');
        $parser = new ProductParserService();
        $productData = $parser->parseProductData($url);
        return response()->json($productData);
    }
}
