<?php

use Corcel\Model\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('lang/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});

Route::get('/', function () {
    try {

        return view('welcome', ['posts' => getNewsOrFail(getNewsSlug())]);
    } catch (Exception $e) {

        return view('welcome');
    }
});

Route::get('/activities/{slug}', function ($slug) {
    try {
        return view('activities', ['slug' => $slug, 'posts' => getNewsOrFail([$slug])]);
    } catch (Exception $e) {
        return view('activities', ['slug' => $slug]);
    }
})->name('activities');

Route::get('/about-us/key-dates', function () {
    return view('key-dates');
})->name('about-us');

Route::get('/about-us/our-ethical-charter', function () {
    return view('our-ethical-charter');
})->name('about-us');

Route::get('about-us/{slug}', function ($slug) {
    try {

        $frTranslation = [
            "ceo-words" => "les-mots-du-president",
            'our-history' => "notre-histoire",
        ];

        if ('fr' === Session::get('locale')) {
            $slug = $frTranslation[$slug];
        }

        $post = Post::slug($slug)->first();

        $post = buildPost($post);

        $posts = [];

        if ('ceo-words' !== $slug || $frTranslation['ceo-words'] !== $slug || 'our-history' !== $slug || $frTranslation['our-history'] !== $slug) {
            $posts = Post::where('post_name', '!=', $slug)
                ->where('ping_status', 'open')
                ->published()
                ->paginate(3)
                ->map(function ($p) {
                    return buildPost($p);
                });
        }

        return view('posts.show', ['post' => $post, 'posts' => $posts]);
    } catch (Exception $e) {
        return view('posts.show');
    }
})->name('about-us');

Route::get('/our-commitments', function () {
    return view('commitments');
})->name('commitments');

Route::get('news/{slug}', function ($slug) {

    $post = Post::slug($slug)->first();

    $post = buildPost($post);

    $posts = null;

    $posts = Post::where('post_name', '!=', $slug)
        ->where('ping_status', 'open')
        ->published()
        ->taxonomy('category', getNewsSlug())
        ->paginate(3)
        ->map(function ($p) {
            return buildPost($p);
        });

    return view('posts.show', ['post' => $post, 'posts' => $posts]);
})->name('news');

Route::get('/news', function () {
    try {
        return view('posts.index', ['posts' => getNewsOrFail(getNewsSlug())]);
    } catch (Exception $e) {
        return view('posts.index');
    }
})->name('news');


function buildPost($value)
{
    if ($value) {

        $value = [
            'title' => $value->title,
            'slug' => $value->slug,
            'content' => $value->content,
            'excerpt' => $value->excerpt,
            'thumbnail' => $value->thumbnail ? $value->thumbnail["attachment"]["url"] : null,
            'date' => $value->created_at->diffForHumans(),
            'categories' => $value["taxonomies"],
        ];

        return $value;
    }
    return null;
}

function getNewsOrFail($slug = 'news')
{
    return Post::published()
        ->taxonomy('category', $slug)
        ->where('ping_status', 'open')
        ->get()
        ->map(function ($post) {
            return buildPost($post);
        });
}

function getNewsSlug()
{
    if ('fr' === Session::get('locale')) {
        return 'news-fr';
    }
    return 'news';
}
