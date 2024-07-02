<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\IncomeController;
use App\Controllers\ExpenseController;
use App\Controllers\CategoryController;
use App\Controllers\SavingsController;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Category;
use App\Models\Savings;
use App\Views\IncomeView;
use App\Views\ExpenseView;
use App\Views\CategoryView;
use App\Views\SavingsView;
use App\Helpers\JsonStorage;
use App\Helpers\TextStorage;
use App\CLI\CommandLineInterface;

// Choose the storage type
$storageType = 'json';
$storage = ($storageType === 'json') ? new JsonStorage() : new TextStorage();

// Initialize models
$categoryModel = new Category($storage);
$incomeModel = new Income($storage);
$expenseModel = new Expense($storage);
$savingsModel = new Savings($incomeModel, $expenseModel);

// Initialize views
$categoryView = new CategoryView();
$incomeView = new IncomeView();
$expenseView = new ExpenseView();
$savingsView = new SavingsView();

// Initialize controllers
$categoryController = new CategoryController($categoryModel, $categoryView);
$incomeController = new IncomeController($incomeModel, $categoryController, $incomeView);
$expenseController = new ExpenseController($expenseModel, $expenseView, $categoryController);
$savingsController = new SavingsController($incomeModel, $expenseModel);

// Initialize CLI application
$app = new CommandLineInterface(
    $incomeController,
    $expenseController,
    $categoryController,
    $savingsController
);

$app->run();