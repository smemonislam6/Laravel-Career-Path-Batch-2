<?php

namespace App\Views;

class CategoryView {
    public function displayAddCategorySuccess() {
        echo "Category added successfully.\n";
    }

    public function displayCategoryExists() {
        echo "Category already exists.\n";
    }

    public function displayCategories($categories) {
        if (empty($categories)) {
            echo "No categories found.\n";
        } else {
            echo "Categories:\n";
            foreach ($categories as $category) {
                echo "- $category\n";
            }
        }
    }
}
