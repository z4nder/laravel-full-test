<?php

namespace Tests;

use PHPUnit\Framework\TestResult;
use PHPUnit\TextUI\DefaultResultPrinter;

class Printer extends DefaultResultPrinter
{
    protected function printFooter(TestResult $result): void
    {
        $total             = $result->count();
        $errors            = $result->failureCount() + $result->errorCount();
        $errorPercentage   = ($errors / $total) * 100;
        $successPercentage = abs( round(100 - $errorPercentage,2));

        file_put_contents(base_path('score.txt'), "FS_SCORE:{$successPercentage}%");
    }
}
