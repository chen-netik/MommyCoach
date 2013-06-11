<?php
/******************************************************
 * @package MT Facebook module for Magento 1.4.x.x and Magento 1.5.x.x
 * @version 1.5.0.1
 * @author http://www.magentheme.com
 * @copyright (C) 2011- MagenTheme.Com
 * @license PHP files are GNU/GPL
*******************************************************/
?>
<?php
class Netiksolutions_Mtfacebook_Model_Config_Colorscheme
{

    public function toOptionArray()
    {
        return array(
            array('value'=>'light', 'label'=>Mage::helper('adminhtml')->__('Light')),
            array('value'=>'dark', 'label'=>Mage::helper('adminhtml')->__('Dark'))
        );
    }

}
