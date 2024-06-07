<?php


$data = [

    ['Иванов', 'Математика', 5],

    ['Иванов', 'Математика', 4],

    ['Иванов', 'Математика', 5],

    ['Петров', 'Математика', 5],

    ['Сидоров', 'Физика', 4],

    ['Иванов', 'Физика', 4],

    ['Петров', 'ОБЖ', 4],

];

$dict = [];
$courses = [' ',];
foreach($data as $arr) {
    $name = $arr[0];
    $course = $arr[1];
    $dict[$name][$course] += $arr[2];
    if (!in_array($course, $courses, TRUE)) {
        array_push($courses, $course);
    }
}
sort($courses);
ksort($dict);


?>

<table>
    <?foreach($courses as $course): ?>
        <th><?=$course?></th>
    <? endforeach ?>
    <? foreach($dict as $key=>$value) :?>
        <tr>
        <td><?=$key ?></td>
        <td><?= isset($value['Математика']) ? $value['Математика'] : ''?></td>
        <td><?= isset($value['ОБЖ']) ? $value['ОБЖ'] : ''?></td>
        <td><?= isset($value['Физика']) ? $value['Физика'] : ''?></td>
        </tr>
    <? endforeach ?> 
</table>

