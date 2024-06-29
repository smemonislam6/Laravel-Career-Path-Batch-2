<?php

namespace App\Models;

use App\Helpers\FileHelper;

class Expense {
    private $file = 'data/expense.json';
    private $expenses = [];

    public function __construct() {
        $this->expenses = FileHelper::readFile($this->file);
        if ($this->expenses === null) {
            $this->expenses = [];
        }
    }

    public function addExpense($amount, $category) {
        $expense = [
            'amount' => $amount,
            'category' => $category,
            'date' => date('Y-m-d H:i:s')
        ];
        $this->expenses[] = $expense;
        FileHelper::writeFile($this->file, $this->expenses);
    }

    public function getExpenses() {
        return $this->expenses;
    }
}
