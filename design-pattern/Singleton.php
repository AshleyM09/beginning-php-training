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

    final public static function instance(array $properties = []): self
    {
        if (!self::$instance) {
            self::$instance = new self($properties);
        }

        return self::$instance;
    }

    public function get(string $field)
    {
        if (!array_key_exists($field, $this->data)) {
            throw new \InvalidArgumentException("No field $field");
        }

        return $this->data[$field];
    }

    public static function reset(): void
    {
        self::$instance = null;
    }
}
