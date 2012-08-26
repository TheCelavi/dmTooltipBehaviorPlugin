<?php
/*
 * @author TheCelavi
 */
class dmTooltipBehaviorForm extends dmBehaviorBaseForm {
    
    protected $theme = array(
        'default' => 'Default'
    );
    
    protected $effect = array(
        'slide'=> 'Slide',
        'fade' => 'Fade'
    );
    
    protected $position = array(
        'top center' => 'North',
        'bottom center' => 'South',
//        'left center' => 'West',
//        'right center' => 'East',
//        'top left' => 'North-east',
//        'top right' => 'North-west',
//        'bottom left' => 'South-east',
//        'bottom right' => 'South-west'
    );
    
    protected $source = array(
        'alt' => 'ALT attribute',
        'title' => 'TITLE attribute',
        'rel' => 'REL attribute',
    );

    public function configure() {
        $this->widgetSchema['inner_target'] = new sfWidgetFormInputText();
        $this->validatorSchema['inner_target'] = new sfValidatorString(array(
            'required' => true
        ));
        
        $this->widgetSchema['theme'] = new sfWidgetFormChoice(array(
            'choices' => $this->getI18n()->translateArray($this->theme)
        ));
        $this->validatorSchema['theme'] = new sfValidatorChoice(array(
            'choices' => array_keys($this->theme)
        ));
        
        $this->widgetSchema['effect'] = new sfWidgetFormChoice(array(
            'choices' => $this->getI18n()->translateArray($this->effect)
        ));
        $this->validatorSchema['effect'] = new sfValidatorChoice(array(
            'choices' => array_keys($this->effect)
        ));
        
        $this->widgetSchema['source'] = new sfWidgetFormChoice(array(
            'choices' => $this->getI18n()->translateArray($this->source)
        ));
        $this->validatorSchema['source'] = new sfValidatorChoice(array(
            'choices' => array_keys($this->source)
        ));
        
        $this->widgetSchema['position'] = new sfWidgetFormChoice(array(
            'choices' => $this->getI18n()->translateArray($this->position)
        ));
        $this->validatorSchema['position'] = new sfValidatorChoice(array(
            'choices' => array_keys($this->position)
        ));
        
        $this->widgetSchema['predelay'] = new sfWidgetFormInputText();
        $this->validatorSchema['predelay'] = new sfValidatorInteger(array(
            'min'=>0,
            'max'=>3000
        ));
        
        $this->widgetSchema['delay'] = new sfWidgetFormInputText();
        $this->validatorSchema['delay'] = new sfValidatorInteger(array(
            'min'=>0,
            'required'=>true
        ));
        
        $this->widgetSchema['opacity'] = new sfWidgetFormInputText();
        $this->validatorSchema['opacity'] = new sfValidatorInteger(array(
            'min'=>0,
            'max'=>100
        ));
        
        $this->widgetSchema['x_axis'] = new sfWidgetFormInputText();
        $this->validatorSchema['x_axis'] = new sfValidatorInteger(array(
            'min'=>-1000,
            'max'=>1000
        ));
        
        $this->widgetSchema['y_axis'] = new sfWidgetFormInputText();
        $this->validatorSchema['y_axis'] = new sfValidatorInteger(array(
            'min'=>-1000,
            'max'=>1000
        ));
        
        $this->getWidgetSchema()->setHelps(array(
            'predelay' => 'Show delay in ms on mouse over',
            'delay' => 'Hide delay in ms on mouse out',
            'opacity' => 'Transparency in percentage',
            'x_axis' => 'Fine tuning of X axis positioning',
            'y_axis' => 'Fine tuning of X axis positioning'            
        ));
        
        if (is_null($this->getDefault('inner_target'))) $this->setDefault ('inner_target', 'img');
        if (is_null($this->getDefault('theme'))) $this->setDefault ('theme', 'default');
        if (is_null($this->getDefault('effect'))) $this->setDefault ('effect', 'slide');
        if (is_null($this->getDefault('source'))) $this->setDefault ('source', 'alt');
        if (is_null($this->getDefault('position'))) $this->setDefault ('position', 'bottom center');
        if (is_null($this->getDefault('delay'))) $this->setDefault ('predelay', 0);
        if (is_null($this->getDefault('delay'))) $this->setDefault ('delay', 30);
        if (is_null($this->getDefault('opacity'))) $this->setDefault ('opacity', 100);
        if (is_null($this->getDefault('x_axis'))) $this->setDefault ('x_axis', 0);
        if (is_null($this->getDefault('y_axis'))) $this->setDefault ('y_axis', 0);
        parent::configure();
    }
    
}

