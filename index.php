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