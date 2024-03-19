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

Route::get('/', function () {
    try {
        updateLocaleTo('fr');
        return view('welcome', ['posts' => getPostsByCategory(getNewsSlug())]);
    } catch (Exception $e) {

        return view('welcome');
    }
});

Route::get('/en', function () {
    try {
        updateLocaleTo('en');
        return view('welcome', ['posts' => getPostsByCategory(getNewsSlug())]);
    } catch (Exception $e) {
        return view('welcome');
    }
});

Route::get('/activites/{slug}', function ($slug) {
    if (
        $slug === 'enduma' ||
        $slug === 'trimeta-agrofood' ||
        $slug === 'wimmo' ||
        $slug === 'orkidex' ||
        $slug === 'alma-villas'
    ) {
        updateLocaleTo('fr');
        return view('activities', ['slug' => $slug, 'path' => "/activites/{slug}"]);
    }
    abort(404);
})->name('activities');

Route::get('/en/activities/{slug}', function ($slug) {
    if (
        $slug === 'enduma' ||
        $slug === 'trimeta-agrofood' ||
        $slug === 'wimmo' ||
        $slug === 'orkidex' ||
        $slug === 'alma-villas'
    ) {
        updateLocaleTo('en');
        return view('activities', ['slug' => $slug, 'path' => "/activities/{slug}"]);
    }
    abort(404);
})->name('activities');



Route::get('/notre-groupe/dates-cles', function () {
    updateLocaleTo('fr');
    return view('key-dates', ['path' => '/notre-groupe/date-cles']);
})->name('about-us');

Route::get('/en/our-group/key-dates', function () {
    updateLocaleTo('en');
    return view('key-dates', ['path' => '/our-group/key-dates']);
})->name('about-us');


Route::get('notre-groupe/{slug}', function ($slug) {
    try {

        updateLocaleTo('fr');

        $post = Post::slug($slug)->first();

        $post = buildPost($post);
        return view('posts.show', ['post' => $post, 'posts' => null, 'path' => "/notre-groupe/{$slug}"]);
    } catch (Exception $e) {
        return view('posts.show', ['error' => true, 'path' => "/notre-groupe/{$slug}"],);
    }
})->name('notre-groupe');

Route::get('/en/our-group/{slug}', function ($slug) {
    try {

        updateLocaleTo('en');

        $post = Post::slug($slug)->first();

        $post = buildPost($post);
        return view('posts.show', ['post' => $post, 'posts' => null, 'path' => "/our-group/{$slug}"]);
    } catch (Exception $e) {
        return view('posts.show', ['error' => true, 'path' => "/our-group/{$slug}"]);
    }
})->name('our-group');

Route::get('/nos-engagements', function () {
    updateLocaleTo('fr');
    return view('commitments', ['path' => '/nos-engagements']);
})->name('commitments');

Route::get('/en/our-commitments', function () {
    updateLocaleTo('en');
    return view('commitments', ['path' =>  'our-commitments']);
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

        return view('posts.show', ['post' => $post, 'posts' => $posts, 'path' => "/news/{$slug}"],);
    } catch (\Throwable $th) {
        return view('posts.show', ['error' => true, 'path' => "/news/{$slug}"]);
    }
})->name('news');

Route::get('en/news/{slug}', function ($slug) {
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

        return view('posts.show', ['post' => $post, 'posts' => $posts, 'path' => "/news/{$slug}"],);
    } catch (\Throwable $th) {
        return view('posts.show', ['error' => true, 'path' => "/news/{$slug}"]);
    }
})->name('news');


Route::get('/actualites', function () {
    try {
        updateLocaleTo('fr');
        return view('posts.index', ['posts' => getPostsByCategory(getNewsSlug()), 'path' => '/actualites']);
    } catch (Exception $e) {
        return view('posts.index', ['error' => true, 'path' => '/actualites']);
    }
})->name('news');

Route::get('/en/news', function () {
    try {
        updateLocaleTo('en');
        return view('posts.index', ['posts' => getPostsByCategory(getNewsSlug()), 'path' => '/news']);
    } catch (Exception $e) {
        return view('posts.index', ['error' => true, 'path' => '/news']);
    }
})->name('news');

Route::get('/carriere', function () {
    try {
        updateLocaleTo('fr');

        $temp = getPostsByCategory(getCareerSlug());

        $enduma = [];
        $orkidex = [];
        $trimetaAgroFood = [];
        $wimmo = [];
        $almaVillas = [];
        $theGroup = [];

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
                    if ($category->slug === 'group-career') {
                        $theGroup[] = $t;
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
            [
                'name' => 'The Group',
                'posts' => $theGroup
            ],

        ];

        return view('career.index', ['posts' => $posts, 'path' => "/carrieres"]);
    } catch (Exception $e) {
        return view('career.index', ['error' => true, 'path' => '/carrieres']);
    }
})->name('career');


Route::get('en/career', function () {
    try {
        updateLocaleTo('en');
        $temp = getPostsByCategory(getCareerSlug());

        $enduma = [];
        $orkidex = [];
        $trimetaAgroFood = [];
        $wimmo = [];
        $almaVillas = [];
        $theGroup = [];

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
                    if ($category->slug === 'group-career') {
                        $theGroup[] = $t;
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
            [
                'name' => 'Le Groupe',
                'posts' => $theGroup
            ],

        ];

        return view('career.index', ['posts' => $posts, 'path' => '/career']);
    } catch (Exception $e) {
        return view('career.index', ['error' => true, 'path' => '/career']);
    }
})->name('career');


Route::get('carriere/{slug}', function ($slug) {
    try {
        updateLocaleTo('fr');
        $post = Post::slug($slug)->first();

        $post = buildPost($post);

        return view('posts.show', ['post' => $post, 'posts' => [], 'path' => "/carriere/{$slug}"]);
    } catch (Exception $e) {
        return view('posts.show', ['error' => true, 'path' => "/carriere/{$slug}"]);
    }
});

Route::get('/en/career/{slug}', function ($slug) {
    try {
        updateLocaleTo('en');
        $post = Post::slug($slug)->first();

        $post = buildPost($post);

        return view('posts.show', ['post' => $post, 'posts' => [], 'path' => "/career/{$slug}"]);
    } catch (Exception $e) {
        return view('posts.show', ['error' => true, 'path' => "/career/{$slug}"]);
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

Route::fallback(function () {
    return view('404');
});

function updateLocaleTo($locale)
{
    if ($locale !== Session::get('locale')) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
    }
}
