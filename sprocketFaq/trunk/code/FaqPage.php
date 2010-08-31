<?php

class FaqPage extends Page
{
	static $db = array();
	static $has_many = array(
		'Faqs' => 'Faq'
	);
	
	static $defaults = array(
		'Content' => '$Faqs'
	);
	
	static $icon = 'sprocketFAQ/images/faqPage';

	
	function getCMSFields() {
		$fields = parent::getCMSFields();
		
		$faqs = new DataObjectManager(
				$controller = $this,
				$name = 'Faqs',
				$sourceClass = 'Faq',
				$fieldList = array(
					"Question" => "Question",
					"Answer" => "Answer"
				),
				$callThisFunctionForPopupFields = 'getCMSFields_forPopup'
			);
		$fields->addFieldToTab('Root.Content.Faqs', $faqs);

		
		return $fields;
	}
}

class FaqPage_Controller extends Page_Controller
{
	public function init() {
		parent::init();
		
		Requirements::javascript('sprocketFAQ/js/faq.js');
		Requirements::css('sprocketFAQ/css/faq.css');
	}
	public function index() {
		if($this->Content && $faqs = $this->Faqs()) {
			$hasLocation = stristr($this->Content, '$Faqs');
			if($hasLocation) {
				
				$content = str_ireplace('$Faqs', $this->customise(array('Faqs' => $faqs))->renderWith(array('Faq')), $this->Content);
				return array(
					'Content' => DBField::create('HTMLText', $content),
					'Faqs' => ""
				);
			}
		}
		return array(
			'Content' => $this->Content,
			'Faqs' => $this->Faqs
		);
	}
}