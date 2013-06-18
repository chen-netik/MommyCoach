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
class Netiksolutions_Mtfacebook_Model_Config_Font
{

    public function toOptionArray()
    {
        return array(
        	array('value'=>'', 'label'=>Mage::helper('adminhtml')->__('')),
		array('value'=>'arial', 'label'=>Mage::helper('adminhtml')->__('Arial')),
		array('value'=>'lucida grande','label'=>Mage::helper('adminhtml')->__('Lucida Grande')),
		array('value'=>'segoe ui', 'label'=>Mage::helper('adminhtml')->__('Segoe UI')),
		array('value'=>'tahoma', 'label'=>Mage::helper('adminhtml')->__('Tahoma')),
		array('value'=>'trebuchet ms', 'label'=>Mage::helper('adminhtml')->__('Trebuchet MS')),
		array('value'=>'verdana', 'label'=>Mage::helper('adminhtml')->__('Verdana'))
        );
    }

}
