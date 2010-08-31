<?php

class Faq extends DataObject
{
	static $db = array(
		'Question' => 'Text',
		'Answer' => 'Text'
	);
	
	static $has_one = array(
		'FaqPage' => 'FaqPage'
	);
	
	public function getCMSFields_forPopup() {
		return new FieldSet(
			new TextField('Question', 'Question'),
			new TextField('Answer', 'Answer')
		);
	}
}