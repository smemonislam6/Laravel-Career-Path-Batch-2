<?php 
require_once 'app/Helpers/FileHelper.php';
require_once 'app/Models/Income.php';
require_once 'app/Models/Expense.php';
require_once 'app/Models/Category.php';
require_once 'app/Models/Savings.php';
require_once 'app/Views/IncomeView.php';
require_once 'app/Views/ExpenseView.php';
require_once 'app/Views/CategoryView.php';
require_once 'app/Views/SavingsView.php';
require_once 'app/Controllers/IncomeController.php';
require_once 'app/Controllers/ExpenseController.php';
require_once 'app/Controllers/CategoryController.php';
require_once 'app/Controllers/SavingsController.php';

use App\Controllers\IncomeController;
use App\Controllers\ExpenseController;
use App\Controllers\CategoryController;
use App\Controllers\SavingsController;

// Initialize controllers


class CliApp {
    private const ADD_INCOME = 1;
    private const ADD_EXPENSE = 2;
    private const VIEW_INCOMES = 3;
    private const VIEW_EXPENSES = 4;
    private const VIEW_SAVINGS = 5;
    private const VIEW_CATEGORIES = 6;
    private const EXIT_APP = 7;

    private  $incomeController;
    private  $expenseController;
    private  $categoryController;
    private  $savingsController;
    private array $options = [
        self::ADD_INCOME => "Add income",
        self::ADD_EXPENSE => "Add expense",
        self::VIEW_INCOMES => "View incomes",
        self::VIEW_EXPENSES => "View expenses",
        self::VIEW_SAVINGS => "View savings",
        self::VIEW_CATEGORIES => "View categories",
        self::EXIT_APP => "Exit",
    ];

    public function __construct()
    {
        $this->incomeController = new IncomeController();
        $this->expenseController = new ExpenseController();
        $this->categoryController = new CategoryController();
        $this->savingsController = new SavingsController();
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