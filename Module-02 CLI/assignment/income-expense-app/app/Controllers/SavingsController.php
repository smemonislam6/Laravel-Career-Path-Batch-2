<?php

namespace App\Controllers;

use App\Models\Savings;
use App\Models\Income;
use App\Models\Expense;
use App\Views\SavingsView;

class SavingsController {
    private $savingsModel;
    private $savingsView;
    private $incomeModel;
    private $expenseModel;

    public function __construct() {
        $this->incomeModel = new Income();
        $this->expenseModel = new Expense();
        $this->savingsModel = new Savings($this->incomeModel, $this->expenseModel);
        $this->savingsView = new SavingsView();
    }

    public function viewSavings() {
        $savings = $this->savingsModel->getSavingsByCategory();
        $this->savingsView->displaySavings($savings);
    }
}
