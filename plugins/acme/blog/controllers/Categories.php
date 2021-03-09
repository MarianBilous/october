<?php namespace Acme\Blog\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Response;
use View;
/**
 * Categories Back-end Controller
 */
class Categories extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ReorderController',
        'Acme.Blog.Controllers.Behaviors.PopupController',
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @var string Configuration file for the `ReorderController` behavior.
     */
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Acme.Blog', 'blog', 'categories');
    }

    public function create($context = null)
    {
        return Response::make(View::make('cms::404'), 404);
    }

    public function update($recordId = null, $context = null)
    {
        return Response::make(View::make('cms::404'), 404);
    }

    public function reorder()
    {
        return Response::make(View::make('cms::404'), 404);
    }

    // public function update($recordId, $context = null)
    // {
    //     //
    //     // Do any custom code here
    //     //

    //     // Call the FormController behavior update() method
    //     return $this->getClassExtension('Backend.Behaviors.FormController')->update($recordId, $context);
    // }
}
