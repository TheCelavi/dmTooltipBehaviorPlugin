;(function($) {    
    
    var methods = {        
        init: function(behavior) {                       
            var $this = $(this), data = $this.data('dmTooltipBehavior');
            if (data && behavior.dm_behavior_id != data.dm_behavior_id) { // There is attached the same, so we must report it
                alert('You can not attach tooltip behavior to same content'); // TODO TheCelavi - adminsitration mechanizm for this? Reporting error
            };
            $this.data('dmTooltipBehavior', behavior);
        },
        
        start: function(behavior) {  
            var $this = $(this), $copy = $this.clone(true, true);
            $this = $this.replaceWith($copy);
            behavior.tipClass = 'dmTooltipBehavior ' + behavior.position + ' ' + behavior.theme;
            $copy.data('dmTooltipBehaviorPreviousDOM', $this).tooltip(behavior);
        },
        stop: function(behavior) {
            var $this = $(this);
            $this.replaceWith($this.data('dmTooltipBehaviorPreviousDOM'));
            $('div.dmTooltipBehavior').remove();
        },
        destroy: function(behavior) {            
            var $this = $(this);
            $this.data('dmTooltipBehavior', null);
            $this.data('dmTooltipBehaviorPreviousDOM', null);
        }
    };
    
    $.fn.dmTooltipBehavior = function(method, behavior){
        
        return this.each(function() {
            if ( methods[method] ) {
                return methods[ method ].apply( this, [behavior]);
            } else if ( typeof method === 'object' || ! method ) {
                return methods.init.apply( this, [method] );
            } else {
                $.error( 'Method ' +  method + ' does not exist on jQuery.dmTooltipBehavior' );
            }  
        });
    };
    
    $.extend($.dm.behaviors, {        
        dmTooltipBehavior: {
            init: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior) + ' ' + behavior.inner_target).dmTooltipBehavior('init', behavior);
            },
            start: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior) + ' ' + behavior.inner_target).dmTooltipBehavior('start', behavior);
            },
            stop: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior) + ' ' + behavior.inner_target).dmTooltipBehavior('stop', behavior);
            },
            destroy: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior) + ' ' + behavior.inner_target).dmTooltipBehavior('destroy', behavior);
            }
        }
    });
    
})(jQuery);