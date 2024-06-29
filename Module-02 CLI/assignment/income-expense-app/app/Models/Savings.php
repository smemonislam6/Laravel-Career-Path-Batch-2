<?php

namespace App\Models;

use App\Models\Income;
use App\Models\Expense;

class Savings {
    private $incomeModel;
    private $expenseModel;

    public function __construct(Income $incomeModel, Expense $expenseModel) {
        $this->incomeModel = $incomeModel;
        $this->expenseModel = $expenseModel;
    }

    public function getSavingsByCategory() {
        $incomes = $this->incomeModel->getIncomes();
        $expenses = $this->expenseModel->getExpenses();
        $categories = array_merge(
            array_unique(array_column($incomes, 'category')),
            array_unique(array_column($expenses, 'category'))
        );

        $savings = [];

        foreach ($categories as $category) {
            $totalIncome = array_sum(array_column(
                array_filter($incomes, function ($income) use ($category) {
                    return $income['category'] === $category;
                }),
                'amount'
            ));

            $totalExpense = array_sum(array_column(
                array_filter($expenses, function ($expense) use ($category) {
                    return $expense['category'] === $category;
                }),
                'amount'
            ));

            $savings[$category] = $totalIncome - $totalExpense;
        }

        return $savings;
    }
}
