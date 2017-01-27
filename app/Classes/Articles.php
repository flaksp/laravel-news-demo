<?php

namespace App\Classes;

/* Dependencies */
use cebe\markdown\Markdown;
use Carbon\Carbon;

/* Eloquent */
use App\Article;
use App\ArticleTag;

class Articles
{

    /**
     * Create an article.
     *
     * @param \App\Http\Requests\CreateArticle $request
     *
     * @return int Created article ID.
     */
    public static function createArticle(\App\Http\Requests\CreateArticle $request) : int
    {
        $article = new Article;

        $article->title     = $request->input('title');
        $article->body      = $request->input('body');
        $article->cover_url = $request->input('cover_url');

        $article->save();

        if (($tags = $request->input('tags')) !== null) {
            self::createTags($tags, $article->id);
        }

        return $article->id;
    }

    /**
     * Update an article.
     *
     * @param \App\Http\Requests\UpdateArticle $request
     *
     * @return int Updated article ID.
     */
    public static function updateArticle(\App\Http\Requests\UpdateArticle $request) : int
    {
        $article = Article::findOrFail($request->input('id'));

        $article->title     = $request->input('title');
        $article->body      = $request->input('body');
        $article->cover_url = $request->input('cover_url');

        $article->save();

        if (($tags = $request->input('tags')) !== null) {
            self::createTags($tags, $article->id);
        } else {
            self::removeTags($article->id);
        }

        return $article->id;
    }

    /**
     * Remove article.
     *
     * @param int $id Article ID.
     *
     * @return void
     */
    public static function removeArticle(int $id)
    {
        $article = Article::findOrFail($id);

        $article->delete();
    }

    /**
     * Created article related tags.
     *
     * @param string $tags Comma-separated list of tags.
     * @param int $article_id
     *
     * @return void
     */
    protected static function createTags(string $tags, int $article_id)
    {
        self::removeTags($article_id);

        foreach (explode(',', $tags) as $tag) {
            if (empty($tag) === true) {
                continue;
            }

            $article_tags = new ArticleTag;

            $article_tags->article_id = $article_id;
            $article_tags->tag        = $tag;

            $article_tags->save();
        }
    }

    /**
     * Remove article related tags.
     *
     * @param int $article_id
     *
     * @return void
     */
    protected static function removeTags(int $article_id)
    {
        ArticleTag::where('article_id', $article_id)->delete();
    }
}
