<h1>---------------------------------1.---------------------------------</h1>
<p>Parašykite funkciją, kurios argumentas būtų tekstas, kuris yra
įterpiamas į h1 tagą;</p>
<?php
function text($text) {
    return "<h1>$text</h1>";
};
$text1 = 'Labas rytas, Lietuva!';
echo text($text1);
?>
<h1>---------------------------------2.---------------------------------</h1>
<p>Parašykite funkciją su dviem argumentais, pirmas argumentas tekstas, įterpiamas į h tagą, o antrasis tago numeris (1-6). Rašydami šią funkciją remkitės pirmame uždavinyje parašytą funkciją;</p>
<?php
function text2($text, $tagNumber) {
    return "<h$tagNumber>$text</h1>";
};
$text2 = 'Labas rytas, Lietuva!';
$randomTag = rand(1, 6);
echo text2($text1, $randomTag);
?>
<h1>---------------------------------3.---------------------------------</h1>
<p>Generuokite atsitiktinį stringą, pasinaudodami kodu md5(time()). Visus skaitmenis stringe įdėkite į h1 tagą. Jegu iš eilės eina keli skaitmenys, juos į tagą reikią dėti kartu (h1 atsidaro prieš pirmą ir užsidaro po paskutinio) Keitimui naudokite pirmo uždavinio funkciją ir preg_replace_callback()</p>
<?php
function textToH1($text10) {
    return "<h1>$text10</h1>";
};
echo textToH1('Labas!');

$randomString = md5(time());
echo $randomString;
function numbersToH1($text) {
    $stringNumbers = preg_replace_callback('/[0-9]+/', function($matches) {return textToH1($matches[0]);}, $text);
    return $stringNumbers;
}
echo numbersToH1($randomString);
?>
<h1>---------------------------------4.---------------------------------</h1>
<p>Parašykite funkciją, kuri skaičiuotų, iš kiek sveikų skaičių jos argumentas dalijasi be liekanos (išskyrus vienetą ir patį save) Argumentą užrašykite taip, kad būtų galima įvesti tik sveiką skaičių;
</p>
<?php
function countDividers(int $number) {
    $dividers = 0;
    // if (!is_int($number)) {
    //     echo 'Enter only integer!';
    // } else {
        for ($i = 2; $i < $number; $i++) {
            if ($number % $i === 0) {
                $dividers++;
            }
        }
        return $dividers;
    // }
}
echo countDividers(110);
?>