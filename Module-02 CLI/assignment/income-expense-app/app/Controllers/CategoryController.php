<?php

namespace App\Controllers;

use App\Models\Category;
use App\Views\CategoryView;

class CategoryController {
    private $categoryModel;
    private $categoryView;

    public function __construct() {
        $this->categoryModel = new Category();
        $this->categoryView = new CategoryView();
    }

    public function addCategory($name) {
        $this->categoryModel->addCategory($name);
        $this->categoryView->displayAddCategorySuccess();
    }

    public function viewCategories() {
        $categories = $this->categoryModel->getCategories();
        $this->categoryView->displayCategories($categories);
    }
}
