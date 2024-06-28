<?php

abstract class Product
{
    protected $name;
    protected $price;
    protected $brand;

    public function __construct($name, $price, $brand)
    {
        $this->name = $name;
        $this->price = $price;
        $this->brand = $brand;
    }


    abstract protected function displayInfo();

    public function calculateDiscount($discountPrice)
    {
        return $this->price - (1 - ($discountPrice / 100));
    }
}


class Book extends Product
{
    private $author;
    private $genre;

    public function __construct($name, $price, $brand, $author, $genre)
    {
        parent::__construct($name, $price, $brand);
        $this->author = $author;
        $this->genre = $genre;
    }

    public function displayInfo()
    {
        echo "Book: {$this->name} by {$this->author}, Genre: {$this->genre}, Price: {$this->price}\n";
    }
}

// Concrete class for Electronics
class Electronics extends Product {
    private $manufacturer;
    private $specifications;
 
    public function __construct($name, $price, $brand, $manufacturer, $specifications) {
        parent::__construct($name, $price, $brand);
        $this->manufacturer = $manufacturer;
        $this->specifications = $specifications;
    }
 
    public function displayInfo() {
        echo "Electronics: {$this->name} by {$this->manufacturer}, Specifications: {$this->specifications}, Price: {$this->price}\n";
    }
}
 
// Concrete class for Clothing
class Clothing extends Product {
    private $size;
    private $material;
 
    public function __construct($name, $price, $brand, $size, $material) {
        parent::__construct($name, $price, $brand);
        $this->size = $size;
        $this->material = $material;
    }
 
    public function displayInfo() {
        echo "Clothing: {$this->name}, Size: {$this->size}, Material: {$this->material}, Price: {$this->price}\n";
    }
}

// Usage
$book = new Book("The Great Gatsby", 19.99, "Penguin", "F. Scott Fitzgerald", "Fiction");
$electronics = new Electronics("Smartphone", 499.99, "Samsung", "Samsung Electronics", "5.5-inch display, 64GB storage");
$clothing = new Clothing("T-Shirt", 14.99, "Nike", "Medium", "Cotton");
 
$book->displayInfo();
echo "Discounted Price: {$book->calculateDiscount(10)}\n";
 
$electronics->displayInfo();
echo "Discounted Price: {$electronics->calculateDiscount(5)}\n";
 
$clothing->displayInfo();
echo "Discounted Price: {$clothing->calculateDiscount(15)}\n";