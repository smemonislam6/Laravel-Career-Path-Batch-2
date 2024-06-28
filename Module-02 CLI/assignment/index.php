<?php

class Transaction {
    protected $amount;
    protected $category;

    public function __construct($amount, $category) {
        $this->amount = $amount;
        $this->category = $category;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getCategory() {
        return $this->category;
    }

    public function __toString() {
        return $this->category . ": $" . number_format($this->amount, 2);
    }
}

class Income extends Transaction {
    public function __construct($amount, $category) {
        parent::__construct($amount, $category);
    }
}

class Expense extends Transaction {
    public function __construct($amount, $category) {
        parent::__construct($amount, $category);
    }
}

class BudgetManager {
    private $incomes = [];
    private $expenses = [];

    public function addIncome($amount, $category) {
        $this->incomes[] = new Income($amount, $category);
    }

    public function addExpense($amount, $category) {
        $this->expenses[] = new Expense($amount, $category);
    }

    public function viewIncomes() {
        if (empty($this->incomes)) {
            echo "No incomes recorded.\n";
            return;
        }
        foreach ($this->incomes as $income) {
            echo $income . "\n";
        }
    }

    public function viewExpenses() {
        if (empty($this->expenses)) {
            echo "No expenses recorded.\n";
            return;
        }
        foreach ($this->expenses as $expense) {
            echo $expense . "\n";
        }
    }

    public function viewSavings() {
        $totalIncome = 0;
        foreach ($this->incomes as $income) {
            $totalIncome += $income->getAmount();
        }

        $totalExpense = 0;
        foreach ($this->expenses as $expense) {
            $totalExpense += $expense->getAmount();
        }

        $savings = $totalIncome - $totalExpense;
        echo "Total Savings: $" . number_format($savings, 2) . "\n";
    }

    public function viewCategories() {
        $categories = [];

        foreach ($this->incomes as $income) {
            $categories[$income->getCategory()] = true;
        }

        foreach ($this->expenses as $expense) {
            $categories[$expense->getCategory()] = true;
        }

        echo "Categories:\n";
        foreach (array_keys($categories) as $category) {
            echo "- " . $category . "\n";
        }
    }
}

class CliApp {
    private const ADD_INCOME = 1;
    private const ADD_EXPENSE = 2;
    private const VIEW_INCOMES = 3;
    private const VIEW_EXPENSES = 4;
    private const VIEW_SAVINGS = 5;
    private const VIEW_CATEGORIES = 6;
    private const EXIT_APP = 7;

    private array $options = [
        self::ADD_INCOME => "Add income",
        self::ADD_EXPENSE => "Add expense",
        self::VIEW_INCOMES => "View incomes",
        self::VIEW_EXPENSES => "View expenses",
        self::VIEW_SAVINGS => "View savings",
        self::VIEW_CATEGORIES => "View categories",
        self::EXIT_APP => "Exit",
    ];

    private BudgetManager $manager;

    public function __construct() {
        $this->manager = new BudgetManager();
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
                    $this->manager->addIncome($amount, $category);
                    break;
                case self::ADD_EXPENSE:
                    $amount = floatval(readline("Enter Your Amount: "));
                    $category = readline("Enter Your Category: ");
                    $this->manager->addExpense($amount, $category);
                    break;
                case self::VIEW_INCOMES:
                    $this->manager->viewIncomes();
                    break;
                case self::VIEW_EXPENSES:
                    $this->manager->viewExpenses();
                    break;
                case self::VIEW_SAVINGS:
                    $this->manager->viewSavings();
                    break;
                case self::VIEW_CATEGORIES:
                    $this->manager->viewCategories();
                    break;
                case self::EXIT_APP:
                    return;
                default:
                    echo "Invalid Option \n";
            }
        }
    }
}

$app = new CliApp();
$app->run();

