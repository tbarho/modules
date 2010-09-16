<?php

class SplashSection extends DataObject {
	
	static $db = array(
		'Title' => 'Varchar(255)'
	);
	
	static $has_one = array(
		'Page' => 'Page',
		'Image' => 'Image'
	);
	
	function getCMSFields_forPopup() {
		return new FieldSet(
			new TextField('Title', 'Title'),
			new ImageField('Image', 'Image')
		);
	}
	
	function Thumbnail()
    {
    	$Image = $this->Image();
    	if($Image) {
    		return $Image->CMSThumbnail();
    	} else {
    		return null;
    	}
    }
	

}

