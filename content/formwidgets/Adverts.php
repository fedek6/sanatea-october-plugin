<?php namespace RealHero\Content\FormWidgets;

use Backend\Classes\FormWidgetBase;
use RealHero\Content\Models\Advert;

class Adverts extends FormWidgetBase {
    /**
     * Info about widget.
     */
    public function widgetDetails()
    {
        return [
            'name' => 'Advert selector',
            'description' => 'Select article advert',
        ];
    }


    public function prepareVars()
    {
        $this->vars['name']     = $this->formField->getName();
        $this->vars['value']    = $this->getLoadValue();

        $this->vars['adverts'] = Advert::where('placement', 'articles')
            ->select('id', 'name')
            ->get();
    }

    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('widget', ['var' => 'value']);
    }
}