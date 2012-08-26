<?php
/**
 * @author TheCelavi
 */
class dmTooltipBehaviorView extends dmBehaviorBaseView {
    
    public function filterBehaviorVars(array $vars = array()) {
        $vars = parent::filterBehaviorVars($vars);
        (isset($vars['opacity'])) ? $vars['opacity'] = round($vars['opacity'] / 100, 2) : $vars['opacity'] = 1;
        $vars['offset'] = array(
            ((isset($vars['x_axis'])) ? $vars['x_axis'] : 0),
            ((isset($vars['y_axis'])) ? $vars['y_axis'] : 0)
        );
        return $vars; 
    }

    public function getJavascripts() {
        return array(
            'dmTooltipBehaviorPlugin.tooltip',
            'dmTooltipBehaviorPlugin.dynamic',
            'dmTooltipBehaviorPlugin.slide',
            'dmTooltipBehaviorPlugin.launch'
        );
    }
    
    public function getStylesheets() {
        return array(
            'dmTooltipBehaviorPlugin.themes'
        );
    }
    
}
