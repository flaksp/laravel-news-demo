<?php

namespace App;

use Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/* Dependencies */
use cebe\markdown\Markdown;
use Carbon\Carbon;

class Article extends Model
{
    use SoftDeletes;

    /**
     * Table name.
     *
     * @var array
     */
    protected $table = 'articles';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Return human readable 'created at' date.
     *
     * E.g. '3 hours ago'.
     *
     * @return string
     */
    public function getCreatedAgoAttribute() : string
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    /**
     * Return human readable 'updated at' date.
     *
     * E.g. '3 hours ago'.
     *
     * @return string
     */
    public function getUpdatedAgoAttribute() : string
    {
        return Carbon::parse($this->updated_at)->diffForHumans();
    }

    /**
     * Return article preview.
     *
     * @return string
     */
    public function getBodyPreviewAttribute() : string
    {
        $clean_article = strip_tags($this->getBodyParsedAttribute());
        $clean_article = mb_strimwidth($clean_article, 0, 200, '...');

        return $clean_article;
    }

    /**
     * Return formatted article body.
     *
     * @return string
     */
    public function getBodyParsedAttribute() : string
    {
        return Cache::remember('article_'.$this->id, 120, function () {
            $markdown = new Markdown;
            $markdown->html5 = true;

            return $markdown->parse($this->body);
        });
    }

    /**
     * Caches article body on edit.
     *
     * @return void
     */
    public function setBodyAttribute($value)
    {
        $markdown = new Markdown;
        $markdown->html5 = true;

        Cache::put('article_'.$this->id, $markdown->parse($value), 120);

        $this->attributes['body'] = $value;
    }

    /**
     * Get the tags that this article owns.
     */
    public function tags()
    {
        return $this->hasMany('App\ArticleTag');
    }

    /**
     * Get the comma-separated list of tags.
     *
     * @return string
     */
    public function getCommaSeparatedTagsAttribute() : string
    {
        $tags = [];

        foreach ($this->tags as $tag) {
            $tags[] = $tag->tag;
        }

        return implode(', ', $tags);
    }
}
