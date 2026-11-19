<?php

use App\Services\StudentCodeGenerator;

test('it builds a padded student code', function () {
    expect((new StudentCodeGenerator)->generate(5, 2026))->toBe('STU-2026-0005');
});
