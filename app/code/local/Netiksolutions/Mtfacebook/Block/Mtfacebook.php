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
class Netiksolutions_Mtfacebook_Block_Mtfacebook extends Mage_Core_Block_Template
{
    public function _prepareLayout()
    {
	return parent::_prepareLayout();
    }
    
    function getDataFB()
    {
    	$mt_opt = $this->getConfig('fb_option');
    	switch ($mt_opt) {
		case 'fb_activity_feed':
			$mt_html = $this->getActivityFeed();
			break;
		case 'fb_like_box':
			$mt_html = $this->getLikebox();
			break;
		case 'fb_live_stream':
			$mt_html = $this->getLiveStream();
			break;
		case 'fb_recommandations':
			$mt_html = $this->getRecommendations();
			break;			
	}
	return $mt_html;
    }
    function getActivityFeed()
    { 
	//get params from admin config
	$mt_domain = $this->getConfig('af_domain');
	$mt_width = $this->getConfig('af_width');
	$mt_height = $this->getConfig('af_height');
	$mt_header = $this->getConfig('af_header');
	$mt_colorscheme = $this->getConfig('af_color_scheme');
	$mt_font = $this->getConfig('af_font');
	$mt_border = $this->getConfig('af_border');
	$mt_recommd = $this->getConfig('af_recommd');
	
	//get data from facebook
	$mt_afcontent = "";
	if ( !$mt_domain )
	{
	    $mt_afcontent .= 'Please enter valid domain.';
	}
	else
	{
	    $mt_afcontent .='<iframe src="http://www.facebook.com/plugins/activity.php?site='.$mt_domain;
	    if ( $mt_width )
	    {
		$mt_afcontent .= '&amp;width='.$mt_width;				
	    }
	    if ( $mt_height )
	    {
		$mt_afcontent .= '&amp;height='.$mt_height;
	    }
	    if ( $mt_header )
	    {
		$mt_afcontent .= '&amp;header=true';
	    }
	    if ( $mt_colorscheme )
	    {
		$mt_afcontent .= '&amp;colorscheme='.$mt_colorscheme;
	    }
	    if ( $mt_font )
	    {
		$mt_afcontent .= '&amp;font='.$mt_font;
	    }
	    if ( $mt_border )
	    {
		$mt_afcontent .= '&amp;border_color='.$mt_border;
	    }
	    if ( $mt_recommd )
	    {
		$mt_afcontent .= '&amp;recommendations=true"';
	    }
	    $mt_afcontent .= '" scrolling="no" frameborder="0" style="border:none; overflow:hidden;';
	    if ( $mt_width )
	    {
		$mt_afcontent .= 'width:'.$mt_width.'px;';
	    }
	    if ( $mt_height )
	    {
		$mt_afcontent .= 'height:'.$mt_height.'px;';
	    }
	    $mt_afcontent .= '" allowTransparency="true"></iframe>';
	}			
	//$mt_afcontent .='<div style="display: none;"><a href="http://www.magentheme.com" title="Magento Themes">Magento Themes</a> and Magento Extensions by MagenTheme.Com</div>';
	return $mt_afcontent;
    }
    public function getLikebox()
    {
	//get params from admin config
	$mt_pageid = $this->getConfig('lb_page_id');
	$mt_width = $this->getConfig('lb_width');
	$mt_height = $this->getConfig('lb_height');
	$mt_fan = $this->getConfig('lb_number_fan');
	$mt_stream = $this->getConfig('lb_stream');
	$mt_header = $this->getConfig('lb_header');
	
	// get data from facebook
	$mt_fbcontent = "";
	if (!$mt_pageid)
	{
	    $mt_fbcontent.='Please enter your valid Page ID or URL.';
	}
	else
	{
	    $mt_fbcontent .= '<iframe src="http://www.facebook.com/connect/connect.php?';
	    if(strlen(strstr($mt_pageid, 'http'))) {
		$mt_fbcontent .= 'href='.$mt_pageid;
	    } else {
		$mt_fbcontent .= 'id='.$mt_pageid;
	    }
	    $mt_fbcontent .= '&locale='.Mage::app()->getLocale()->getLocaleCode();
	    if ($mt_fan) {
		$mt_fbcontent .= '&connections='.$mt_fan;
	    }
	    if ($mt_stream) {
		$mt_fbcontent .= '&stream=true';
	    }
	    if ($mt_header) {
		$mt_fbcontent .= '&header=true';
	    }
	    if ($mt_width) {
		$mt_fbcontent .= '&width='.$mt_width;
	    }
	    if ($mt_height) {
		$mt_fbcontent .= '&height='.$mt_height;
	    }
	    $css_path = $this->getConfig('lb_css');
	    if($css_path) {
		$rd = rand(1,99999);
		$mt_fbcontent .= '&css='.Mage::getBaseUrl('media').'mtfacebook/'.$css_path.'?ts='.$rd;
	    }
	    
	    $mt_fbcontent .= '" scrolling="no" frameborder="0" style="border:none; overflow:hidden; ';
	    if ($mt_width)
	    {
		$mt_fbcontent .= 'width:'.$mt_width.'px;';
	    }
	    if ($mt_height)
	    {
		$mt_fbcontent .= 'height:'.$mt_height.'px;';
	    }
	    $mt_fbcontent .= '" allowTransparency="true"></iframe>';
	}
	//$mt_fbcontent .='<div style="display: none;"><a href="http://www.9magentothemes.com" title="Magento Themes">Magento Themes</a> and Magento Extensions by 9MagentoThemes.Com</div>';
	return $mt_fbcontent;
    }
	
    function getLiveStream()
    {
	// get params from admin config
	$mt_app_id = $this->getConfig('ls_app_id');
	$mt_width = $this->getConfig('ls_width');
	$mt_height = $this->getConfig('ls_height');
	$mt_xid = $this->getConfig('ls_xid');
	
	//get data from facebook
	$mt_lscontent="";
	if( !$mt_app_id )
	{
	    $mt_lscontent .= 'Please enter your valid App ID';
	}
	else
	{
	    $mt_lscontent .= '<iframe src="http://www.facebook.com/plugins/livefeed.php?app_id='.$mt_app_id;
	    if ( $mt_width )
	    {
		$mt_lscontent .= '&amp;width='.$mt_width;
	    }
	    if ( $mt_height )
	    {
		$mt_lscontent .= '&amp;height='.$mt_height;
	    }
	    if ( $mt_xid )
	    {
		$mt_lscontent .= '&amp;xid='.$mt_xid;
	    }
	    $mt_lscontent .= '"scrolling="no" frameborder="0" style="border:none; overflow:hidden;';
	    if ( $mt_width )
	    {
		$mt_lscontent .= 'width:'.$mt_width.'px;';
	    }
	    if ( $mt_height )
	    {
		$mt_lscontent .= 'height:'.$mt_height.'px;';
	    }
	    $mt_lscontent .= '" allowTransparency="true"></iframe>';
	}
	//$mt_lscontent .='<div style="display: none;"><a href="http://www.magentheme.com" title="Magento Themes">Magento Themes</a> and Magento Extensions by MagenTheme.Com</div>';
	
	return $mt_lscontent;
    }
	
    function getRecommendations()
    {      
	//get params from admin config
	$mt_domain = $this->getConfig('r_domain');
	$mt_width = $this->getConfig('r_width');
	$mt_height = $this->getConfig('r_height');
	$mt_header = $this->getConfig('r_header');
	$mt_colorscheme = $this->getConfig('r_color_scheme');
	$mt_border = $this->getConfig('r_border');
	$mt_font = $this->getConfig('r_font');
	
	//get data from facebook
	$mt_rcontent = "";
	if ( !$mt_domain )
	{
	    $mt_rcontent .= 'Please enter valid domain';
	}
	else
	{
	    $mt_rcontent .= '<iframe src="http://www.facebook.com/plugins/recommendations.php?site='.$mt_domain;
	    if ( $mt_width )
	    {
		$mt_rcontent .= '&amp;width='.$mt_width;
	    }
	    if ( $mt_height )
	    {
		$mt_rcontent .= '&amp;height='.$mt_height;
	    }
	    if ( $mt_header )
	    {
		$mt_rcontent .= '&amp;header=true';
	    }
	    if ( $mt_colorscheme )
	    {
		$mt_rcontent .= '&amp;colorscheme='.$mt_colorscheme;
	    }
	    if ( $mt_font )
	    {
		$mt_rcontent .= '&amp;font='.$mt_font;
	    }
	    if ( $mt_border )
	    {
		$mt_rcontent .= '&amp;border_color='.$mt_border;
	    }
	    $mt_rcontent .= '" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden;';
	    if ( $mt_width )
	    {
		$mt_rcontent .= 'width:'.$mt_width.'px; ';
	    }
	    if ( $mt_height )
	    {
		$mt_rcontent .= 'height:'.$mt_height.'px;';
	    }
	    $mt_rcontent .= '" ></iframe>';
	}
	//$mt_rcontent .='<div style="display: none;"><a href="http://www.magentheme.com" title="Magento Themes">Magento Themes</a> and Magento Extensions by MagenTheme.Com</div>';
	
	return $mt_rcontent;
    }
    
    public function getConfig($att) 
    {
	$config = Mage::getStoreConfig('mtfacebook');
	if (isset($config['mtfacebook_config']) ) {
	    $value = $config['mtfacebook_config'][$att];
	    return $value;
	} else {
	    throw new Exception($att.' value not set');
	}
    }
}