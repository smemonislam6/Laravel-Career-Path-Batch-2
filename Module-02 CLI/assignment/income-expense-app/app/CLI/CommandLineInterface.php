<?php

namespace App\CLI;

use App\Controllers\IncomeController;
use App\Controllers\ExpenseController;
use App\Controllers\CategoryController;
use App\Controllers\SavingsController;

class CommandLineInterface {
    private const ADD_INCOME = 1;
    private const ADD_EXPENSE = 2;
    private const VIEW_INCOMES = 3;
    private const VIEW_EXPENSES = 4;
    private const VIEW_SAVINGS = 5;
    private const VIEW_CATEGORIES = 6;
    private const EXIT_APP = 7;

    private $incomeController;
    private $expenseController;
    private $categoryController;
    private $savingsController;
    private array $options = [
        self::ADD_INCOME => "Add income",
        self::ADD_EXPENSE => "Add expense",
        self::VIEW_INCOMES => "View incomes",
        self::VIEW_EXPENSES => "View expenses",
        self::VIEW_SAVINGS => "View savings",
        self::VIEW_CATEGORIES => "View categories",
        self::EXIT_APP => "Exit",
    ];

    public function __construct(
        IncomeController $incomeController,
        ExpenseController $expenseController,
        CategoryController $categoryController,
        SavingsController $savingsController
    ) {
        $this->incomeController = $incomeController;
        $this->expenseController = $expenseController;
        $this->categoryController = $categoryController;
        $this->savingsController = $savingsController;
    }

    public function run(): void {
        while (true) {
            foreach ($this->options as $option => $label) {
                printf("%d. %s\n", $option, $label);
            }

            $choice = intval(readline("Enter Your Option: "));

            switch ($choice) {
                case self::ADD_INCOME:
                    $amount = floatval(readline("Enter Your Amount: "));
                    $category = readline("Enter Your Category: ");
                    $this->incomeController->addIncome($amount, $category);
                    break;

                case self::ADD_EXPENSE:
                    $amount = floatval(readline("Enter Your Amount: "));
                    $category = readline("Enter Your Category: ");
                    $this->expenseController->addExpense($amount, $category);
                    break;

                case self::VIEW_INCOMES:
                    $this->incomeController->viewIncomes();
                    break;

                case self::VIEW_EXPENSES:
                    $this->expenseController->viewExpenses();
                    break;

                case self::VIEW_SAVINGS:
                    $this->savingsController->viewSavings();
                    break;

                case self::VIEW_CATEGORIES:
                    $this->categoryController->viewCategories();
                    break;

                case self::EXIT_APP:
                    return;
                default:
                    echo "Invalid Option \n";
            }
        }
    }
}
