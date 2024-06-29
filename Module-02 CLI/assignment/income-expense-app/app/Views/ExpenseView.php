<?php

namespace App\Views;

class ExpenseView {
    public function displayAddExpenseSuccess() {
        echo "Expense added successfully.\n";
    }

    public function displayExpenses($expenses) {
        echo "Expenses:\n";
        foreach ($expenses as $expense) {
            echo "Amount: {$expense['amount']}, Category: {$expense['category']}, Date: {$expense['date']}\n";
        }
    }
}
