<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{

    /**
     * Table name.
     *
     * @var array
     */
    protected $table = 'article_tags';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Lowercase tag.
     *
     * @return void
     */
    public function setTagAttribute($value)
    {
        $tag = mb_strtolower($value);
        $tag = str_replace('/', ' ', $tag);
        $tag = preg_replace('/\s+/', ' ', $tag);
        $tag = trim($tag);

        $this->attributes['tag'] = $tag;
    }

    /**
     * Get the article that owns the tag.
     */
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
