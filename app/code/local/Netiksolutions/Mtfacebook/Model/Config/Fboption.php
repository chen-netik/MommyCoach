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
class Netiksolutions_Mtfacebook_Model_Config_Fboption
{

    public function toOptionArray()
    {
        return array(
        array('value'=>'fb_like_box', 'label'=>Mage::helper('adminhtml')->__('Like Box')),
		array('value'=>'fb_activity_feed', 'label'=>Mage::helper('adminhtml')->__('Activity Feed')),
		array('value'=>'fb_live_stream', 'label'=>Mage::helper('adminhtml')->__('Live Stream')),
		array('value'=>'fb_recommandations', 'label'=>Mage::helper('adminhtml')->__('Recommandations'))
        );
    }

}
