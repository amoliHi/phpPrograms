<?php

namespace RefactoringGuru\Singleton\Conceptual;

/**
 * The Singleton class defines the `GetInstance` method that serves as an
 * alternative to constructor and lets clients access the same instance of this
 * class over and over.
 */
class Singleton
{
    /**
     * The Singleton's instance is stored in a static field. This field is an
     * array, because we'll allow our Singleton to have subclasses. Each item in
     * this array will be an instance of a specific Singleton's subclass. You'll
     * see how this works in a moment.
     */
    private static $instances = [];

    /**
     * The Singleton's constructor should always be private to prevent direct
     * construction calls with the `new` operator.
     */
    protected function __construct() { }

    /**
     * Singletons should not be cloneable.
     */
    protected function __clone() { }

    /**
     * Singletons should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    /**
     * This is the static method that controls the access to the singleton
     * instance. On the first run, it creates a singleton object and places it
     * into the static field. On subsequent runs, it returns the client existing
     * object stored in the static field.
     *
     * This implementation lets you subclass the Singleton class while keeping
     * just one instance of each subclass around.
     */
    public static function getInstance(): Singleton
    {
        $cls = static::class;
        if (!isset(static::$instances[$cls])) {
            static::$instances[$cls] = new static;
        }

        return static::$instances[$cls];
    }

    /**
     * Finally, any singleton should define some business logic, which can be
     * executed on its instance.
     */
    public function someBusinessLogic()
    {
        // ...
    }
}

/**
 * The client code.
 */
function clientCode()
{
    $s1 = Singleton::getInstance();
    $s2 = Singleton::getInstance();
    if ($s1 === $s2) {
        echo "Singleton works, both variables contain the same instance.";
    } else {
        echo "Singleton failed, variables contain different instances.";
    }
}

clientCode();
/*********************************************************** */
/**
 * Lazy initialization example
 */
header('Content-type:text/plain; charset=utf-8');

class Fruit {
    private $type;
    private static $types = array();

    private function __construct($type) {
        $this->type = $type;
    }

    public static function getFruit($type) {
        // Lazy initialization takes place here
        if (!isset(self::types[$type])) {
            self::types[$type] = new Fruit($type);
        }

        return self::types[$type];
    }

    public static function printCurrentTypes() {
        echo 'Number of instances made: ' . count(self::types) . "\n";
        foreach (array_keys(self::types) as $key) {
            echo "$key\n";
        }
        echo "\n";
    }
}

Fruit::getFruit('Apple');
Fruit::printCurrentTypes();

Fruit::getFruit('Banana');
Fruit::printCurrentTypes();

Fruit::getFruit('Apple');
Fruit::printCurrentTypes();

/*
OUTPUT:

Number of instances made: 1
Apple

Number of instances made: 2
Apple
Banana

Number of instances made: 2
Apple
Banana
*/
