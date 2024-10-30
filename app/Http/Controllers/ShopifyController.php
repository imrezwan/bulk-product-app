<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shopify\Clients\Rest;

use Log;

class ShopifyController extends Controller
{
    public function getProducts()
    {
        // Get the current authenticated shop's instance
        
        $shop = auth()->user();
        Log::info("Shop object:" . json_encode($shop));

        // Create a new REST client using the shop's domain and access token
        $client = $shop->api();

        try {
            // Make the request to retrieve all products
            $response = $client->rest('GET', '/admin/products.json');
            
            $products = $response['body']['products'];
        
            Log::info("Products:" . json_encode($products));

            // Pass the products to the view
            return view('products', compact('products'));
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to retrieve products.');
        }
    }
}
