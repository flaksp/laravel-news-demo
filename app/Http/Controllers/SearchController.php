<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Classes */
use App\Classes\Articles;
use App\Classes\SocialButtons;

/* Requests */
use App\Http\Requests\CreateArticle;
use App\Http\Requests\UpdateArticle;

/* Eloquent */
use App\Article;
use App\ArticleTag;

class SearchController extends Controller
{

    /**
     * Show the listing of tags.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing()
    {
        return view('articles.search.listing', [
            'tags' => ArticleTag::select('tag')
                                ->groupBy('tag')
                                ->orderBy('tag', 'asc')
                                ->paginate(10)
        ]);
    }

    /**
     * Show the listing of articles by tag.
     *
     * @param string $tag Tag name.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(string $tag)
    {
        $articles = Article::whereHas('tags', function ($query) use ($tag) {
            $query->where('tag', '=', $tag);
        })->paginate(5);

        return view('articles.listing', [
            'articles' => $articles
        ]);
    }
}
