<?php namespace Acme\Blog\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Illuminate\Support\Facades\Request;
use Backend\Traits\InspectableContainer;
/**
 * Articles Back-end Controller
 */
class Articles extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public function onGetInspectorConfiguration()
    {
        $configuration = [];
        // Load and use some values from the posted form
        //
        $someValue = Request::input('prop');
        dd($someValue);
        return [
            'configuration' => [
                'properties'  => $configuration,
                'title'       => 'Inspector title',
                'description' => 'Inspector description'
            ]
        ];
    }
    
    public function getArticlesOptions()
    {
        $optionsArray = [];

        $optionsArray[] = ['value' => 'create', 'title' => 'Create'];
        $optionsArray[] = ['value' => 'update', 'title' => 'Update'];
        $optionsArray[] = ['value' => 'delete', 'title' => 'Delete'];

        return [
            'options' => $optionsArray
        ];
    }
    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Acme.Blog', 'blog', 'articles');
    }
}
