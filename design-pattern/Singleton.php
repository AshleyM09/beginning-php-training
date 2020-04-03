<?php
declare(strict_types=1);

namespace App\DesignPattern;

class Singleton
{
    /** @var Singleton */ //contain an object of class Singleton
    private static $instance;
    /** @var array */ //declaring $instance will always be an array
    private $data;

    final private function __construct(array $properties = []) //constructor with optional array called $properties
    {
        $this->data = $properties;
    }

    //public and static so you can call it, but you can't change it
    //is Singleton Design pattern
    final public static function instance(array $properties = []): self
    {
        if (!self::$instance) { //if variable was pointing to an object (not true)
            self::$instance = new self($properties); //create object using new self
        }

        return self::$instance;
    }

    //checking to see if field is key in data array
    //with error handling
    public function get(string $field) //creating an immutable service without set function
    {
        if (!array_key_exists($field, $this->data)) {
            throw new \InvalidArgumentException("No field $field");
        }

        return $this->data[$field];
    }

    //builds new copy of Singleton instance
    public static function reset(): void
    {
        self::$instance = null;
    }
}
