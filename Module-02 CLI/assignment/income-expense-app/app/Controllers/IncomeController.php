<?php

namespace App\Controllers;

use App\Models\Income;
use App\Views\IncomeView;
use App\Controllers\CategoryController;

class IncomeController {
    private $incomeModel;
    private $incomeView;
    private $categoryController;

    public function __construct() {
        $this->incomeModel = new Income();
        $this->incomeView = new IncomeView();
        $this->categoryController = new CategoryController();
    }

    public function addIncome($amount, $category) {
        // Check if category exists, if not add it
        $this->categoryController->addCategory($category);
        
        // Add income
        $this->incomeModel->addIncome($amount, $category);
        $this->incomeView->displayAddIncomeSuccess();
    }

    public function viewIncomes():void 
    {
        $incomes = $this->incomeModel->getIncomes();
        $this->incomeView->displayIncomes($incomes);
    }
}
