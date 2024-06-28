<?php

    /**
     * Abstract Class: যে ক্লাসের অবজেক্ট তৈরি করা যায় না কিন্তু চাইল্ড ক্লাসে তৈরি করা যায়। Abstract-Method এবং Non-abstract
     * Method থাকে সেই ক্লাসকে Abstract Class বলে।
     * 
     * Abstract Method: যে Method এর Body থাকে কিন্তু Implementation থাকে না, তাকে Abstract Method বলে।
     * 
     * Non-abstract Method: যে Method এর Body এবং Implemetation থাকে, তাকে Non Abstract Method বলে।
     * 
     * Note: 1. Abstract ক্লাস কে Inherite করা Child ক্লাস গুলোকে Concrete ক্লাস বলে।
     *       2. Abstract Method কে private ঘোষনা করা যায় না।
     *       3. Abstract Method কে Visibility হিসাবে public or protected রাখতে হবে।
     *       4. Abstract Method কে Parameter ব্যবহার করলে Child ক্লাসগুলোতে ব্যবহার করতে হবে। Parameter কম বা বেশি হওয়া যাবে নাহ।
     *       5. Child ক্লাসে Default Parameter Value ব্যবহার করা যায়।
     * 
     */


    abstract class Vehicle 
    {
        abstract protected function getBaseFare(): int;
        abstract protected function getPerKiloFare(): int;

        public function getTotal()
        {
            return $this->getBaseFare() + $this->getPerKiloFare();
        }
    }

    
    class Car extends Vehicle
    {
        public function getBaseFare(): int
        {
            return 10;
        }

        public function getPerKiloFare(): int
        {
            return 20;
        }
    }

    $car = new Car();
    // echo $car->getTotal();


    abstract class Person 
    {
        abstract protected function getName($name): string;
        abstract protected function getFullName($name): string;
    }

    class Employee extends Person
    {
        public function getName($name):string 
        {
            return "Hi, {$name}";
        }

        public function getFullName($name, $prefix='Mr.'):string
        {
            return "Hi, {$prefix} $name";
        }
    }

    $employee = new Employee;
    echo $employee->getName('SM Emon') . "\n";
    echo $employee->getFullName('SM Emon');