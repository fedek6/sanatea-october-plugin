<?php namespace RealHero\Extensions;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function boot()
    {
        // Extend all backend form usage
        \Event::listen('backend.form.extendFieldsBefore', function($widget) {
            // Only for the CMS Index controller
            if (!$widget->getController() instanceof \Cms\Controllers\Index) {
                return;
            }

            // Only for the Page model
            if (!$widget->model instanceof \Cms\Classes\Page) {
                return;
            }

            // Footer type list
            $widget->tabs['fields']['viewBag[page_class]'] = [
                'label'   => 'Page class',
                'type'    => 'text',
                'comment' => 'This will be used as additional body class',
                'tab'     => 'Additional'
            ];
        });
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
}
