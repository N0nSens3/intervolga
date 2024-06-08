<?php
require_once("blocks\\header.php");

$data = [

    ['Иванов', 'Математика', 5],

    ['Иванов', 'Математика', 4],

    ['Иванов', 'Математика', 5],

    ['Петров', 'Математика', 5],

    ['Сидоров', 'Физика', 4],

    ['Иванов', 'Физика', 4],

    ['Петров', 'ОБЖ', 4],

];

#Ser error handler to catch PHP Warnings : Undefined array key

set_error_handler(function ($errno, $err_msg, $err_file, $err_line)
{
    throw new ErrorException($err_msg, 0, $errno, $err_file, $err_line );
}, E_WARNING);
 
$students_sheet = [];
$courses = [' ',];
foreach($data as $arr) {
    $name = $arr[0];
    $course = $arr[1];
    try {
    $students_sheet[$name][$course] += $arr[2];
    } catch (ErrorException) {
        $students_sheet[$name][$course] = $arr[2];
    }
    if (!in_array($course, $courses, TRUE)) {
        array_push($courses, $course);
    }
}
restore_error_handler();

sort($courses);
ksort($students_sheet);
?>

<table>
    <?foreach($courses as $course): ?>
        <th><?=$course?></th>
    <? endforeach ?>
    <? foreach($students_sheet as $key=>$value) :?>
        <tr>
        <td><?=$key ?></td>
        <td><?= isset($value[$courses[1]]) ? $value[$courses[1]] : ''?></td>
        <td><?= isset($value[$courses[2]]) ? $value[$courses[2]] : ''?></td>
        <td><?= isset($value[$courses[3]]) ? $value[$courses[3]] : ''?></td>
        </tr>
    <? endforeach ?> 
</table>

<?
require_once("blocks\\footer.php");