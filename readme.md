# Commands

This package is created for close business logic in the class. You can use closed business logic in different places of your project (views, controllers, jobs, tests etc.). 


##Usage
Install through composer

    composer require  ruslander-rulez/laravel-buisiness-logic-encapsulator

Create new class

    <?php
    namespace Some\Namespace;
    
    use  RuslanderRulez\Encapsulator\AbstractCommand;
    
    class SomeName extents AbstractCommand
    {
        private $input1;
        
        private $input2;

        private $someInjection;
        
        public function __construct($inputVariable1, $inputVariable2, SomeInjection $someInjection)
        {
            $this->input1 = $inputVariable1;
            $this->input2 = $inputVariable2;
            
            $this->someInjection = $someInjection;
        }
        
        public function handle()
        {
            /*
            SOME LOGIC
            */
        
            return $this->input1 === $this->input2;
        }
        /**
         * @retunn boolean
         **/
        public function executeFromParams($inputVariable1, $inputVariable2)
        {
            return self::execute(compact("inputVariable1", "inputVariable2"));
        }
    }
    
Use created class in where your need

    //some code here
    
    $result  = SomeName::executeFromParams($value1, $value2);
    
    //some code here
    
    if ($result) {
        //some code here
    }
        //some code here
