<?php namespace Acme\Blog\Components;

use Acme\Blog\Controllers\Articles as ControllersArticles;
use Cms\Classes\ComponentBase;

use Acme\Blog\Models\Article;


class Articles extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Articles Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function getArticle()
    {
        return Article::where('visibility', true)->orderBy('created_at', 'desc')->get();
    }

    public function getStateOptions()
    {
        $countryCode = Request::input('country'); // Load the country property value from POST
        
        $states = [
            'ca' => ['ab'=>'Alberta', 'bc'=>'British columbia'],
            'us' => ['al'=>'Alabama', 'ak'=>'Alaska']
    ];

    return $states[$countryCode];
    }

    public function defineProperties()
    {

        return [
            'country' => [
                'title'       => 'Country',
                'type'        => 'dropdown',
                'default'     => 'us'
            ],
        ];
    }
}
