<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;


class FetchNews extends Command
{
    protected $signature = 'fetch:news';
    protected $description = 'Fetch news articles from the News API and store them in the database.';

    public function handle()
    {
        if (Cache::has('news-fetch-today')) {
            $this->info('News fetch already ran today.');
            return;
        }
        
        $apiKey = '2a587b45eaac4cc5841d59775be2eda1';
        $today = date('Y-m-d');
        $response = Http::get("https://newsapi.org/v2/everything?q=tesla&from={$today}0&sortBy=publishedAt&apiKey={$apiKey}");

        // print_r($response);
        if ($response->successful()) {
            $articles = $response->json()['articles'];

            foreach ($articles as $article) {
 
                 $publishedAt = Carbon::parse($article['publishedAt'])->format('Y-m-d H:i:s');
            
                News::updateOrCreate(
                    ['title' => $article['title']],
                    [
                        'description'   => $article['description'],
                        'url'           => $article['url'],
                        'published_at'  => $publishedAt,
                        'source'        => $article['source']['name'],
                    ]
                );
            }
            // Set cache to prevent running more than once a day
            Cache::put('news-fetch-today', true, now()->endOfDay());

            $this->info('News articles fetched and stored successfully!');
        } else {
            $this->error('Failed to fetch news articlesss.');
        }
    }
}
// php artisan fetch:news