<?php

// Abstract class that serves as a base for controller classes.
abstract class Controller
{
    protected $manager;

    // Abstract method that must be implemented by subclasses to define controller logic.
    protected abstract function run();
}

?>
