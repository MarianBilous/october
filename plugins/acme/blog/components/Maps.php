<?php namespace Acme\Blog\Components;

use Cms\Classes\ComponentBase;

class Maps extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Maps Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function onRun()
    {
        $key = "AIzaSyAekObjEZU2YRqyeTh6rq3S3WmTSb4a-Uk";

        $this->page['key'] = $key;
    }

    public function defineProperties()
    {
        return [];
    }
}
