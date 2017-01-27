<?php

namespace App\Classes;

use App\Traits\HtmlTrait;

class SocialButtons
{
    use HtmlTrait;

    /**
     * Page title.
     *
     * @var string
     */
    protected $title;

    /**
     * Page description.
     *
     * @var string
     */
    protected $description;

    /**
     * Page URL.
     *
     * @var string
     */
    protected $url;

    /**
     * Image URL.
     *
     * @var string|null
     */
    protected $image;

    public function __construct(
        $title       = null,
        $description = null,
        $url         = null,
        $image       = null
    ) {
        $this->title       = $title;
        $this->description = $description;
        $this->url         = $url;
        $this->image       = $image;
    }

    /**
     * Generate Twitter share link.
     *
     * @return string
     */
    public function twitter() : string
    {
        $parameters = [];

        if (empty($this->title) === false) {
            $parameters['text'] = $this->title;
        }

        if (empty($this->url) === false) {
            $parameters['url'] = $this->url;
        }

        return $this->createHtmlElement('a', [
            'target' => '_blank',
            'rel'    => 'noopener',
            'href'   => 'https://twitter.com/intent/tweet?'.http_build_query($parameters),
        ], 'Twitter');
    }

    /**
     * Generate VK share link.
     *
     * @return string
     */
    public function vk() : string
    {
        $parameters = [];

        if (empty($this->title) === false) {
            $parameters['title'] = $this->title;
        }

        if (empty($this->description) === false) {
            $parameters['description'] = $this->description;
        }

        if (empty($this->url) === false) {
            $parameters['url'] = $this->url;
        }

        if (empty($this->image) === false) {
            $parameters['image'] = $this->image;
        }

        return $this->createHtmlElement('a', [
            'target' => '_blank',
            'rel'    => 'noopener',
            'href'   => 'https://vk.com/share.php?'.http_build_query($parameters),
        ], 'VK');
    }

    /**
     * Generate Facebook share link.
     *
     * @return string
     */
    public function facebook() : string
    {
        $parameters = [];

        if (empty($this->title) === false) {
            $parameters['title'] = $this->title;
        }

        if (empty($this->url) === false) {
            $parameters['u'] = $this->url;
        }

        return $this->createHtmlElement('a', [
            'target' => '_blank',
            'rel'    => 'noopener',
            'href'   => 'https://www.facebook.com/share.php?'.http_build_query($parameters),
        ], 'Facebook');
    }
}