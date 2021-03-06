<?php
class  campuswisdom_Form_Events_AddEvent extends Zend_Form
{

    public function __construct($options)
		{
                 $time_arr=array(
                     array('key'=>'6 am','value'=>'6 am'),
                     array('key'=>'7 am','value'=>'7 am'),
                     array('key'=>'8 am','value'=>'8 am'),
                     array('key'=>'9 am','value'=>'9 am'),
                     array('key'=>'10 am','value'=>'10 am'),
                     array('key'=>'11 am','value'=>'11 am'),
                     array('key'=>'12 pm','value'=>'12 pm'),
                     array('key'=>'1 pm','value'=>'1 pm'),
                     array('key'=>'2 pm','value'=>'2 pm'),
                     array('key'=>'3 pm','value'=>'3 pm'),
                     array('key'=>'4 pm','value'=>'4 pm'),
                     array('key'=>'5 pm','value'=>'5 pm'),
                     array('key'=>'6 pm','value'=>'6 pm'),
                     array('key'=>'7 pm','value'=>'7 pm'),
                     array('key'=>'8 pm','value'=>'8 pm'),
                     array('key'=>'9 pm','value'=>'9 pm'),
                     array('key'=>'10 pm','value'=>'10 pm'),
                     array('key'=>'11 pm','value'=>'11 pm'),
                     array('key'=>'12 am','value'=>'12 am'),
                     array('key'=>'1 am','value'=>'1 am'),
                     array('key'=>'2 am','value'=>'2 am'),
                     array('key'=>'3 am','value'=>'3 am'),
                     array('key'=>'4 am','value'=>'4 am'),
                     array('key'=>'5 am','value'=>'5 am'),
                     );
                     //var_dump($time);
		parent::__construct(NULL);
		$this->setName('newevent')
		         ->setMethod('post');
			 //->addDecorator('Label', array('optSuffix' => ':', 'reqSuffix' =>':*'));
	        $name = new Zend_Form_Element_Text('name');
		$name->setLabel('Event Name')
					->setRequired(true)
					->addFilter('StripTags')
					->addFilter('StringTrim')
                                        ->setDescription('Name of the event should concisely and precisely describe the event ')
					->addValidator('NotEmpty');

                $group = new Zend_Form_Element_Select('group');
		$group->setLabel('For which group?')
					->setRequired(true)
                                        ->addMultiOptions($options)
					->addFilter('StripTags')
					->addFilter('StringTrim')
                                        ->setDescription('Only your group members can respond(RSVP) to the event ')
					->addValidator('NotEmpty');

		$description = new Zend_Form_Element_Textarea('description',array('cols'=>25,'rows'=>5));
		$description->setLabel('Description')
					->setRequired(false)
					->addFilter('StripTags')
                                        ->setDescription('You may optionally write a brief description of the event ')
					->addFilter('StringTrim');
		$venue = new Zend_Form_Element_Text('venue');
		$venue->setLabel('Venue')
		              ->setRequired(true)
			      ->addFilter('StripTags')
                             ->addFilter('StringTrim')
                            ->setDescription('State the place where the event will take place ')
			     ->addValidator('NotEmpty');

		$date = new Zend_Form_Element_Text('date',array('validators'=>array('date')));
		$date->setLabel('Date (yyyy-mm-dd)')
		            //  ->addValidator(new Zend_Validate_Digits())
			 ->setRequired(true)
			 ->addFilter('StripTags')
			 ->addFilter('StringTrim')
                         ->setDescription('Enter the date of the event.Date format should be yyyy-mm-dd. Example: 2010-10-02 ')
                         ->addValidator('NotEmpty');

		$time= new Zend_Form_Element_Select('time');
		$time->setLabel('Time')
			 ->setRequired(true)
                        ->addMultiOptions($time_arr)
			 ->addFilter('StripTags')
                        ->addValidator('NotEmpty')
                         ->setDescription('Time of the event ')
			 ->addFilter('StringTrim');

		$charges = new Zend_Form_Element_Text('charges');
		$charges->setLabel('Charges (Optional)')
				->setRequired(false)
				->addFilter('StripTags')
                               ->setDescription('Describe the event charges if any ')
			       ->addFilter('StringTrim');
               /*
                $type=new Zend_Form_Element_Checkbox('type');
                $type->setLabel('Private to my group')
                          ->setChecked(true);
                
                */
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton')
			      ->setLabel('Submit');

		$this->addElements(array($group,$name,$description,$venue,$date,$time,$charges,$submit));

		}
}