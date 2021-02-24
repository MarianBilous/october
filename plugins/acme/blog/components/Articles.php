<?php namespace Acme\Blog\Components;

use Cms\Classes\ComponentBase;

use Acme\Blog\Models\Article;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use October\Rain\Support\Facades\Twig;
use October\Rain\Parse\Syntax\Parser as SyntaxParser;
use October\Rain\Support\Facades\Yaml;

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
        $filePath = plugins_path('acme/blog/models/article/fields.yaml');
        $array = Yaml::parseFile($filePath);

        //dd($array);

        //$syntax = SyntaxParser::parse();
        //$expiresAt = Carbon::now()->addMinutes(10);

        //Cache::put('datt', $expiresAt, $expiresAt);
        //dd(Cache::pull('datt'));

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
