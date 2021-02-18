<?php

namespace Acme\Blog\Controllers\Behaviors;

use Backend;
use Illuminate\Support\Facades\View;
use Backend\Classes\ControllerBehavior;
use Illuminate\Support\Facades\Response;

class PopupController extends ControllerBehavior
{
    protected $controller;

    public function __construct($controller)
    {
        parent::__construct($controller);
    }

    public function onUpdateForm()
    {
        $this->controller->asExtension('FormController')->update(post('record_id'));

        $this->controller->vars['recordId'] = post('record_id');

        return $this->controller->makePartial('form_update');
    }

    public function onUpdate()
    {
        $this->controller->asExtension('FormController')->update_onSave(post('record_id'));

        return $this->controller->listRefresh();
    }

    public function onCreateForm()
    {
        $this->controller->asExtension('FormController')->create();

        return $this->controller->makePartial('form_create');
    }

    public function onCreate()
    {
        return $this->controller->asExtension('FormController')->create_onSave();
    }

    public function onLoadReorder()
    {
        $this->controller->asExtension('ReorderController')->reorder();

        return $this->controller->makePartial('form_reorder');
    }
}
