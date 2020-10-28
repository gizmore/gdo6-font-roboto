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
            GDT_FontWeight::make('font_weight_mono')->enumValues('100', '200', '300', '400', '500', '600', '700')->initial('400'),
            GDT_Checkbox::make('font_include')->initial('1'),
            GDT_Checkbox::make('font_include_mono')->initial('1'),
        );
    }
    public function cfgFontWeight() { return $this->getConfigVar('font_weight'); }
    public function cfgFontWeightMono() { return $this->getConfigVar('font_weight_mono'); }
    public function cfgIncludeFont() { return $this->getConfigVar('font_include'); }
    public function cfgIncludeFontMono() { return $this->getConfigVar('font_include_mono'); }
    
    ###########
    ### CSS ###
    ###########
    public function onIncludeScripts()
    {
        # Always load normal font
        $weight = $this->cfgFontWeight();
        $this->addBowerCSS("fontsource-roboto/{$weight}.css"); # Font face

        # Expose as default?
        if ($this->cfgIncludeFont())
        {
            $this->addCSS('css/gdo6-roboto.css'); # Body style
        }
    
        # Optionally load mono too
        if ($this->cfgIncludeFontMono())
        {
            $weight = $this->cfgFontWeightMono();
            $this->addBowerCSS("fontsource-roboto-mono/{$weight}.css"); # Font face
        }
    }
    
}
