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

        return view('welcome', ['posts' => getPostsByCategory(getNewsSlug())]);
    } catch (Exception $e) {

        return view('welcome');
    }
});

Route::get('/activities/{slug}', function ($slug) {
    if (
        $slug === 'enduma' ||
        $slug === 'trimeta-agrofood' ||
        $slug === 'wimmo' ||
        $slug === 'orkidex' ||
        $slug === 'alma-villas'
    ) {
        return view('activities', ['slug' => $slug]);
    }
    abort(404);
})->name('activities');

Route::get('/about-us/key-dates', function () {
    return view('key-dates');
})->name('about-us');


Route::get('about-us/{slug}', function ($slug) {
    try {

        $frTranslation = [
            "ceo-words" => "les-mots-du-president",
            'our-history' => "notre-histoire",
            'our-mission' => "notre-mission",
            'our-values' => "nos-valeurs",
            'legal-notice' => 'mentions-legales',
            'about-us' => 'a-propos-de-nous'
        ];

        if ('fr' === Session::get('locale')) {
            $slug = $frTranslation[$slug];
        }

        $post = Post::slug($slug)->first();

        $post = buildPost($post);

        // get related posts
        $posts = [];

        $isNotCEOWords = 'ceo-words' !== $slug || $frTranslation['ceo-words'] !== $slug;
        $isNotOurHistory = 'our-history' !== $slug || $frTranslation['our-history'] !== $slug;
        $isNotOurMission = 'our-mission' !== $slug || $frTranslation['our-mission'] !== $slug;


        // if not special pages
        if ($isNotCEOWords || $isNotOurHistory || $isNotOurMission) {
            $temp = Post::where('post_name', '!=', $slug)
                ->where('ping_status', 'open')
                ->published()
                ->paginate(3);
            // ->map(function ($p) {
            //     return buildPost($p);
            // });

            // only add non null value
            foreach ($temp as $p) {
                if ($p) {
                    $posts[] = $p;
                }
            }
        }
        return view('posts.show', ['post' => $post, 'posts' => $posts, 'slug' => $slug]);
    } catch (Exception $e) {
        return view('posts.show', ['error' => true]);
    }
})->name('about-us');

Route::get('/our-commitments', function () {
    return view('commitments');
})->name('commitments');

Route::get('news/{slug}', function ($slug) {
    try {
        $post = Post::slug($slug)->first();

        $post = buildPost($post);

        $posts = Post::where('post_name', '!=', $slug)
            ->where('ping_status', 'open')
            ->published()
            ->taxonomy('category', getNewsSlug())
            ->paginate(3)
            ->map(function ($p) {
                return buildPost($p);
            });

        return view('posts.show', ['post' => $post, 'posts' => $posts]);
    } catch (\Throwable $th) {
        return view('posts.show', ['error' => true]);
    }
})->name('news');

Route::get('/news', function () {
    try {
        return view('posts.index', ['posts' => getPostsByCategory(getNewsSlug())]);
    } catch (Exception $e) {
        return view('posts.index', ['error' => true]);
    }
})->name('news');

Route::get('/career', function () {
    try {
        $temp = getPostsByCategory(getCareerSlug());

        $enduma = [];
        $orkidex = [];
        $trimetaAgroFood = [];
        $wimmo = [];
        $almaVillas = [];

        foreach ($temp as $t) {
            if ($t['categories']) {
                foreach ($t['categories'] as $category) {
                    if ($category->slug === 'enduma-career') {
                        $enduma[] = $t;
                    }
                    if ($category->slug === 'orkidex-career') {
                        $orkidex[] = $t;
                    }
                    if ($category->slug === 'trimeta-agro-food-career') {
                        $trimetaAgroFood[] = $t;
                    }
                    if ($category->slug === 'wimmo-career') {
                        $wimmo[] = $t;
                    }
                    if ($category->slug === 'alma-villas-career') {
                        $almaVillas[] = $t;
                    }
                }
            }
        }

        $posts = [
            [
                'name' => 'Enduma',
                'posts' => $enduma
            ],
            [
                'name' => 'Trimeta Agro Food',
                'posts' => $trimetaAgroFood
            ],
            [
                'name' => 'Wimmo',
                'posts' => $wimmo
            ],
            [
                'name' => 'Orkidex',
                'posts' => $orkidex
            ],
            [
                'name' => 'Alma Villas',
                'posts' => $almaVillas
            ],

        ];

        return view('career.index', ['posts' => $posts]);
    } catch (Exception $e) {
        return view('career.index', ['error' => true]);
    }
})->name('career');

Route::get('career/{slug}', function ($slug) {
    try {
        $post = Post::slug($slug)->first();

        $post = buildPost($post);

        return view('posts.show', ['post' => $post, 'posts' => []]);
    } catch (Exception $e) {
        return view('posts.show', ['error' => true]);
    }
});


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

function getPostsByCategory($slug = 'news')
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

function getCareerSlug()
{

    if ('fr' === Session::get('locale')) {
        return 'careers-fr';
    }
    return 'careers';
}

Route::fallback(function() {
    return view('404');
});
