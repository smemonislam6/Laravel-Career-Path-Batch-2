<?php

namespace App\Models;

use App\Helpers\StorageInterface;

class Category {
    private $file = 'data/categories.json';
    private $categories = [];
    private $storage;

    public function __construct(StorageInterface $storage) {
        $this->storage = $storage;
        $this->categories = $this->storage->read($this->file);
        if ($this->categories === null) {
            $this->categories = [];
        }
    }

    public function addCategory($name) {
        if (!in_array($name, $this->categories)) {
            $this->categories[] = $name;
            $this->storage->write($this->file, $this->categories);
        }
    }

    public function getCategories() 
    {
        return $this->categories;
    }
}
