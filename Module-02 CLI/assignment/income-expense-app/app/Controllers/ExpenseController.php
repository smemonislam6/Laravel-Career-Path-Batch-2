<?php

namespace App\Controllers;

use App\Models\Expense;
use App\Views\ExpenseView;
use App\Controllers\CategoryController;

class ExpenseController {
    private $expenseModel;
    private $expenseView;
    private $categoryController;

    public function __construct(Expense $expenseModel, ExpenseView $expenseView, CategoryController $categoryController) {
        $this->expenseModel = $expenseModel;
        $this->expenseView = $expenseView;
        $this->categoryController = $categoryController;
    }

    public function addExpense($amount, $category) {
        // Check if category exists, if not add it
        $this->categoryController->addCategory($category);
        
        // Add expense
        $this->expenseModel->addExpense($amount, $category);
        $this->expenseView->displayAddExpenseSuccess();
    }

    public function viewExpenses() {
        $expenses = $this->expenseModel->getExpenses();
        $this->expenseView->displayExpenses($expenses);
    }
}
