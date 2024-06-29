<?php

namespace App\Views;

class SavingsView {
    public function displaySavings($savings) {
        echo "Savings by Category:\n";
        foreach ($savings as $category => $amount) {
            echo "Category: $category, Savings: $amount\n";
        }
    }
}
