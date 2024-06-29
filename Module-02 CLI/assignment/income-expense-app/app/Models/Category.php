<?php

namespace App\Models;

use App\Helpers\FileHelper;

class Category {
    private $file = 'data/categories.json';
    private $categories = [];

    public function __construct() {
        $this->categories = FileHelper::readFile($this->file);
        if ($this->categories === null) {
            $this->categories = [];
        }
    }

    public function addCategory($name) {
        if (!in_array($name, $this->categories)) {
            $this->categories[] = $name;
            FileHelper::writeFile($this->file, $this->categories);
        }
    }

    public function getCategories() {
        return $this->categories;
    }
}
