<?php
   class Singleton {
      public static function getInstance() {
         static $instance = null;
         
         if (null === $instance) {
            /*
            late static bindings, refers to whatever class in the hierarchy you called the method on.
            which class called this static method, return one instance of class which called this static method
            */
            $instance = new static();
         }
         return $instance;
      }
      protected function __construct() {
      }
      
      private function __clone() {
      }
      
      private function __wakeup() {
      }
   }
   
   class SingletonChild extends Singleton {
   }
   
   $obj = Singleton::getInstance();
   var_dump($obj === Singleton::getInstance());
   
   $anotherObj = SingletonChild::getInstance();
   var_dump($anotherObj === Singleton::getInstance());
   var_dump($anotherObj === SingletonChild::getInstance()); 
?>