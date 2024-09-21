<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class ShowApAppleNewsController extends Controller
{
    public function index()
    {
       // Create a new Guzzle client
       $client = new Client();
       
       // Define the News API endpoint
      // Get today's date in YYYY-MM-DD format
      $today = date('Y-m-d');
      
      // Get the date 5 days ago
      $fiveDaysAgo = date('Y-m-d', strtotime('-5 days'));
      
      // Update the URL with the dynamic dates
      $apiKey = '2a587b45eaac4cc5841d59775be2eda1';
      $url = ("https://newsapi.org/v2/everything?q=apple&from={$fiveDaysAgo}&to={$today}&sortBy=popularity&apiKey={$apiKey}");

       
       
       // Send a GET request to the API
       $response = $client->get($url);
       
       // Decode the JSON response into an array
       $newsData = json_decode($response->getBody(), true);
       
       // Check if there are any articles
       if (isset($newsData['articles'])) {
           // Pass the articles to the view
           return view('news.index', ['articles' => $newsData['articles']]);
       }
       
       // If no articles found, return a default message
       return view('news.index', ['articles' => []]);
    }
    
}
