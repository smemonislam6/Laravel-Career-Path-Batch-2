<?php

namespace App\Controllers;

use App\Models\Income;
use App\Models\Expense;
use App\Models\Savings;
use App\Views\SavingsView;

class SavingsController {
    private $savingsModel;
    private $savingsView;

    public function __construct(Income $incomeModel, Expense $expenseModel) {
        $this->savingsModel = new Savings($incomeModel, $expenseModel);
        $this->savingsView = new SavingsView();
    }

    public function viewSavings() {
        $savings = $this->savingsModel->getSavingsByCategory();
        $this->savingsView->displaySavings($savings);
    }
}
