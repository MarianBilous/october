<?php namespace Acme\Blog;

use Backend;
use Illuminate\Support\Facades\Event;
use System\Classes\PluginBase;
use Config;
/**
 * Blog Plugin Information File
 */
class Plugin extends PluginBase
{
    public $require = [
        'VorlonTech.SeoManager',
    ];
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Blog',
            'description' => 'No description provided yet...',
            'author'      => 'Acme',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        Config::set('cms.backendSkin', 'Acme\Blog\Classes\BackendSkin');

        Event::listen('seo.extendSeoFields', function ($fields) {

        });

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Acme\Blog\Components\category' => 'Category',
            'Acme\Blog\Components\tag' => 'Tag',
            'Acme\Blog\Components\captcha' => 'Captcha',
            'Acme\Blog\Components\maps' => 'Maps',
            'Acme\Blog\Components\articles' => 'Articles',
            'Acme\Blog\Components\ContactForm' => 'contactform',
            'Acme\Blog\Components\ArticleDetail' => 'articleDetail',
            'Acme\Blog\Components\TagDetail' => 'tagDetail',
            'Acme\Blog\Components\CategoryDetail' => 'categoryDetail',
            'Acme\Blog\Components\Facebook' => 'facebook',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {

        return [
            'acme.blog.some_permission' => [
                'tab' => 'Blog',
                'label' => 'Some permission'
            ],
        ];
    }

    public function registerFormWidgets()
    {
        return [
            'Acme\Blog\FormWidgets\TagSelector' => 'tagselector'
        ];
    }

    public function registerSchedule($schedule)
    {
        $schedule->command('cache:clear')->hourly();
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {

        return [
            'blog' => [
                'label'       => 'Blog',
                'url'         => \Backend::url('acme/blog/tags'),
                'icon'        => 'icon-pencil',
                'order'       => 500,

                'sideMenu' => [
                    'posts' => [
                        'label'       => 'Tag',
                        'icon'        => 'icon-tags',
                        'url'         => \Backend::url('acme/blog/tags'),
                    ],
                    'categories' => [
                        'label'       => 'Categories',
                        'icon'        => 'icon-copy',
                        'url'         => \Backend::url('acme/blog/categories'),
                    ],
                    'articles' => [
                        'label'       => 'Articles',
                        'icon'        => 'icon-newspaper-o',
                        'url'         => \Backend::url('acme/blog/articles'),
                    ],
                    'contact' => [
                        'label'       => 'Contact',
                        'icon'        => 'icon-envelope',
                        'url'         => \Backend::url('acme/blog/contacts'),
                    ]
                ]
            ],
        ];
    }
}
