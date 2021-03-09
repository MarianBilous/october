<?php namespace Acme\Blog\Classes;


use Backend\Skins\Standard;



/**
 * Modified backend skin information file.
 *
 * This is modified to include an additional path to override the default layouts.
 *
 */
class BackendSkin extends Standard
{
    /**
     * {@inheritDoc}
     */
    public function getLayoutPaths()
    {
        return [
            plugins_path('acme/blog/layouts'),
            $this->skinPath . '/layouts'
        ];
    }
}
