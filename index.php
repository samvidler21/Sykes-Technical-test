<?php
namespace PhpNwSykes;
require_once __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

$positiveTests = [
    'X' => 10,
    'IX' => 9,
    'V' => 5,
    'MMX' => 2010,
];

$negativeTests = [
    'Bad',
    'XI Something',
    'Something MM',
    '-X',
];

?>
<h2>Valid Tests</h2>
<?php
foreach ($positiveTests as $numerial => $expected) {
    printf('<p>%s should be %s - Result %s</p>', $numerial, $expected, ((new RomanNumeral($numerial))->toInt() === $expected) ? 'PASS' : 'FAIL');
}
?>
<h2>Invalid Tests</h2>
<?php
foreach($negativeTests as $numerial) {
    $exception = false;
    try {
        (new RomanNumeral($numerial))->toInt(); 
    } catch (\Exception $e) {
        $exception = true;
    }

    printf('<p>%s should throw exception - Result %s</p>', $numerial, $exception ? 'PASS' : 'FAIL');
}
