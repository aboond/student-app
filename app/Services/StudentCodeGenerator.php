<?php

namespace App\Services;

class StudentCodeGenerator
{
    public function generate(int $id, int $year): string
    {
        return sprintf('STU-%d-%04d', $year, $id);
    }
}
