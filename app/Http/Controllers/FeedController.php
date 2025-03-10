<?php 
namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Image;
use App\Models\News;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::select('id', 'title', 'content', 'created_at')->get()->map(function ($article) {
            return [
                'type' => 'article',
                'title' => $article->title,
                'content' => $article->content,
                'created_at' => $article->created_at,
            ];
        });

        $images = Image::select('id', 'image_path', 'caption', 'created_at')->get()->map(function ($image) {
            return [
                'type' => 'image',
                'image_path' => $image->image_path,
                'caption' => $image->caption,
                'created_at' => $image->created_at,
            ];
        });

        $news = News::select('id', 'headline', 'details', 'created_at')->get()->map(function ($news) {
            return [
                'type' => 'news',
                'title' => $news->headline,
                'content' => $news->details,
                'created_at' => $news->created_at,
            ];
        });

        // Sab data combine karna aur sorting karna
        $feed = collect($articles)->merge($images)->merge($news)->sortByDesc('created_at')->values();

        if ($request->ajax()) {
            return view('feed.partials.feed-items', compact('feed'))->render();
        }

        return view('feed.index', compact('feed'));
    }
}
