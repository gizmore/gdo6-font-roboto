<?php
namespace GDO\FontRoboto;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_FontWeight;

/**
 * Includes Roboto Font CSS on init.
 * Do not forget to run yarn.sh before installation.
 * @author gizmore
 * @version 6.10
 * @since 6.10
 * @license Apache2.0
 */
final class Module_FontRoboto extends GDO_Module
{
    ##############
    ### Module ###
    ##############
    public $module_priority = 90;
    
    public $module_license = "Apache2.0";
    
    public function onLoadLanguage() { return $this->loadLanguage('lang/roboto'); }
    
    ##############
    ### Config ###
    ##############
    public function getConfig()
    {
        return array(
            GDT_FontWeight::make('font_weight')->initial('400'),
        );
    }
    public function getFontWeight() { return $this->getConfigVar('font_weight'); }
    
    ###########
    ### CSS ###
    ###########
    public function onIncludeScripts()
    {
        $weight = $this->getFontWeight();
        $this->addBowerCSS("fontsource-roboto/{$weight}.css"); # Font face
        $this->addCSS('css/gdo6-roboto.css'); # Body style
    }
    
}
