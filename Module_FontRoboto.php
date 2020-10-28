<?php
namespace GDO\FontRoboto;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_FontWeight;
use GDO\DB\GDT_Checkbox;

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
            GDT_FontWeight::make('font_weight')->enumValues('100', '200', '300', '400', '500', '700', '900')->initial('400'),
            GDT_Checkbox::make('font_include')->initial('1'),
        );
    }
    public function cfgFontWeight() { return $this->getConfigVar('font_weight'); }
    public function cfgIncludeFont() { return $this->getConfigVar('font_include'); }
    
    ###########
    ### CSS ###
    ###########
    public function onIncludeScripts()
    {
        $weight = $this->cfgFontWeight();
        $this->addBowerCSS("fontsource-roboto/{$weight}.css"); # Font face
        if ($this->cfgIncludeFont())
        {
            $this->addCSS('css/gdo6-roboto.css'); # Body style
        }
    }
    
}
