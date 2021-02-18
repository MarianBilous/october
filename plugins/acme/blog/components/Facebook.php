<?php namespace Acme\Blog\Components;

use Cms\Classes\ComponentBase;

class Facebook extends ComponentBase
{
    public $ID = 391670622129379;
    public $SECRET = 'f8376b983094850c5e5cee2e596eaaa5';
    public $URL = 'http://localhost/October/contact';

    public function componentDetails()
    {
        return [
            'name'        => 'Facebook Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
}
