<?php

define('WORD_COUNT', 29);
$text = <<<TXT

<p class="big">

        Год основания:<b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>.

</p>

<p class="float">

        <img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград" width="300" height="200" itemprop="image">

        <span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span>

</p>

<p>

        <i><b>Великая Отечественная война в истории города</b></i></p><p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a> (17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона  Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i>

</p>

TXT;

$text_without_tags = trim(strip_tags($text));
$text_without_tags = array_diff(array_map('trim', explode(' ', $text_without_tags)), [' ', '', '-']);
$text_without_tags = array_values($text_without_tags);
$last_word = $text_without_tags[WORD_COUNT]." ".$text_without_tags[WORD_COUNT + 1];
$displayed_text = mb_substr($text, 0, mb_strpos($text, $last_word));
$ending = '&hellip;' . mb_substr_count($displayed_text, '(') > mb_substr_count($displayed_text, ')') ? ')' : '';
$displayed_text .= $ending;

# Using DOM to close HTML tags 

$dom = new DOMDocument();
$dom->loadHTML(mb_convert_encoding($displayed_text, 'HTML-ENTITIES', 'UTF-8' ));
echo $dom->saveHTML();
