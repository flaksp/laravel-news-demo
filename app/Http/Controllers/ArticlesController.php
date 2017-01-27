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

class ArticlesController extends Controller
{

    /**
     * Show the listing of articles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles.listing', [
            'articles' => Article::orderBy('updated_at', 'desc')
                                 ->orderBy('created_at', 'desc')
                                 ->paginate(5)
        ]);
    }

    /**
     * Show article.
     *
     * @param int $id An ID of the article.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(int $id)
    {
        try {
            $article = Article::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('articles.errors.404', [], 404);
        }

        $social_buttons = new SocialButtons(
            'test',
            $article->body_preview,
            url()->full(),
            $article->cover_url
        );

        return view('articles.view', [
            'article'        => $article,
            'social_buttons' => $social_buttons
        ]);
    }

    /**
     * Show creating or updating form.
     *
     * @param int $id An ID of the article.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage(int $id = null)
    {
        if ($id === null) {
            return view('articles.manage');
        }

        try {
            $article = Article::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('articles.errors.404', [], 404);
        }

        return view('articles.manage', [
            'article' => $article
        ]);
    }

    /**
     * Create an article and redirect user to its page.
     *
     * @param \App\Http\Requests\CreateArticle $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CreateArticle $request)
    {
        $id = Articles::createArticle($request);

        return redirect()->route('view_article', ['id' => $id]);
    }

    /**
     * Update or remove an article.
     *
     * If article was updated, user will be redirected to its page.
     * If article was removed, user will be redirected to listing of articles.
     *
     * @param \App\Http\Requests\UpdateArticle $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateArticle $request)
    {
        if ($request->input('remove') === 'yes') {
            Articles::removeArticle($request->input('id'));
            return redirect()->route('listing_of_articles');
        }

        $id = Articles::updateArticle($request);

        return redirect()->route('view_article', ['id' => $id]);
    }
}
