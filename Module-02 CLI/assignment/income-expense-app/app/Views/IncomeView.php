<?php

namespace App\Views;

class IncomeView {
    public function displayAddIncomeSuccess() {
        echo "Income added successfully.\n";
    }

    public function displayIncomes($incomes) {
        echo "Incomes:\n";
        foreach ($incomes as $income) {
            echo "Amount: {$income['amount']}, Category: {$income['category']}, Date: {$income['date']}\n";
        }
    }
}
