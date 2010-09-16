<?php

class SplashExtension extends DataObjectDecorator
{
    function extraStatics()
    {
        return array(
            'db' => array(
                'Duration' => 'Int',
                'Speed' => 'Int'
            ),
            'defaults' => array(
                'Duration' => '700',
                'Speed' => '8000'
            ),
            'has_many' => array(
                'SplashSections' => 'SplashSection'
            )
        );
    }

    function contentControllerInit($controller)
    {
    	Requirements::javascriptTemplate('themes/acumen/js/jquery.main.js', array(
            'Duration' => $this->owner->Duration,
            'Speed' => $this->owner->Speed
        ));
    }

    function updateCMSFields(&$fields)
    {
        $fields->addFieldToTab('Root.Content.SplashSettings', new NumericField('Duration', 'Animation Speed (smaller is faster; 700 is a good starting point)'));
        $fields->addFieldToTab('Root.Content.SplashSettings', new NumericField('Speed', 'Stop duration (1000 = 1 second; 5000 is a good starting point)'));
        $fields->addFieldToTab('Root.Content.SplashSettings', new DataObjectManager(
        	$this->owner, 
        	'SplashSections', 
        	'SplashSection',
        	array('Title' => 'Title', 'Thumbnail' => 'Image'),
        	'getCMSFields_forPopup'
        ));
    }

    
}
