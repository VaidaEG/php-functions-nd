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
    return "<h$tagNumber>$text</h$tagNumber>";
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
                // echo $i . '<br>';
            }
        }
        return $dividers;
    // }
}
echo countDividers(15);
?>
<h1>---------------------------------5.---------------------------------</h1>
<p>Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 33 iki 77. Išrūšiuokite masyvą pagal daliklių be liekanos kiekį mažėjimo tvarka, panaudodami ketvirto uždavinio funkciją.
</p>
<?php
$array = [];
foreach (range(1,10) as $_) {
    $array [] = rand(33, 77);
}
echo '<pre>';
print_r($array);
echo '</pre>';
usort($array, function($a, $b) {
    return countDividers($b) <=> countDividers($a);
});
echo '<pre>';
print_r($array);
echo '</pre>';
?>
<h1>---------------------------------6.---------------------------------</h1>
<p>Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 333 iki 777. Naudodami 4 uždavinio funkciją iš masyvo ištrinkite pirminius skaičius.</p>
<?php
$array2 = [];
foreach (range(1, 100) as $_) {
    $array2 [] = rand(333, 777);
}
echo '<pre>';
print_r($array2);
echo '</pre>';
$array2Length = count($array2);
for ($i = 0; $i < $array2Length; $i++) {
    if(countDividers($array2[$i]) === 0) {
        unset($array2[$i]); //delete number;
    }
}
echo '<pre>';
print_r($array2);
echo '</pre>';
?>
<h1>---------------------------------7.---------------------------------</h1>
<p>Sugeneruokite atsitiktinio (nuo 10 iki 20) ilgio masyvą, kurio visi, išskyrus
paskutinį, elementai yra atsitiktiniai skaičiai nuo 0 iki 10, o paskutinis
masyvas, kuris generuojamas pagal tokią pat salygą kaip ir pirmasis
masyvas. Viską pakartokite atsitiktinį nuo 10 iki 30 kiekį kartų.
Paskutinio masyvo paskutinis elementas yra lygus 0;</p>
<?php
$rand = rand(10, 30); 
function generateArray($rand) {
    $num = rand(10, 20);
    for ($i = 0; $i < $num; $i++) {
        if ($i < $num - 1) {
            $array2[$i] = rand(10, 20);
        } else {
            if ($rand > 0) {
                $array2[$i] = generateArray($rand - 1);
            } else {
                $array2[$i] = 0;
            }
        }
    }
    return $array2;
}
echo '<pre>';
print_r(generateArray($rand));
echo '</pre>';
?>
<h1>---------------------------------8.---------------------------------</h1>
<p>Suskaičiuokite septinto uždavinio elementų, kurie nėra masyvai, sumą</p>
<?php
function countRecursiveArrayValues($array) {
    $sum = 0;
    foreach ($array as $element) {
        if (is_numeric($element)) {
            $sum += $element;
        } else if (is_array($element)) {
            $sum += countRecursiveArrayValues($element);
        }
    }
    return $sum;
}
echo 'All array values sum is: ' . countRecursiveArrayValues($array2);
?>
<h1>---------------------------------9.---------------------------------</h1>
<p>Sugeneruokite masyvą iš trijų elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 33. Jeigu tarp trijų paskutinių elementų yra nors vienas ne pirminis skaičius, prie masyvo pridėkite dar vieną elementą- atsitiktinį skaičių nuo 1 iki 33. Vėl patikrinkite pradinę sąlygą ir jeigu reikia pridėkite dar vieną elementą. Kartokite, kol sąlyga nereikalaus pridėti elemento.
</p>
<?php
function isPrime($number) {
    if (0 == $number || 1 == $number) return false;
    if (2 == $number) return true;
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) return false;
    }
    return true;
}
for ($i = 0; $i < 3; $i++) {
    $array3[$i] = rand(1, 33);
}
echo '<pre>';
print_r($array3);
echo '</pre>';
while (isPrime($array3[count($array3) - 1]) || isPrime($array3[count($array3) - 2]) || isPrime($array3[count($array3) - 3])) {
    $array3[] = rand(1, 33);
}
echo '<pre>';
print_r($array3);
echo '</pre>';
?>
<h1>---------------------------------10.---------------------------------</h1>
<p> Sugeneruokite masyvą iš 10 elementų, kurie yra masyvai iš 10 elementų,
kurie yra atsitiktiniai skaičiai nuo 1 iki 100. Jeigu tokio masyvo pirminių
skaičių vidurkis mažesnis už 70, suraskite masyve mažiausią skaičių
(nebūtinai pirminį) ir prie jo pridėkite 3. Vėl paskaičiuokite masyvo
pirminių skaičių vidurkį ir jeigu mažesnis nei 70 viską kartokite<p>
<?php
// $array10 = [];
// foreach (range(1, 10) as $_) {
//     $array10Inner = [];
//     foreach(range(1, 10) as $value) {
//         $array10Inner[] = rand(1, 100);
//     }
// }
// while (countPrimes($array10Inner) < 70) {
//     min($array10Inner) + 3;      
// }
// function countPrimes($array) {
//     $sum = 0;
//     $count = 0;
//     foreach($array as $value) {
//         if (is_numeric($value)) {
//             if (isPrime($value)) {
//                 $sum += $value;
//                 $count++;
//             }
//         } else {
//             $sum += countPrimes($value)['sum'];
//             $count += countPrimes($value)['count'];
//         }
//     }
//     0 < $count ? ($average = $sum / $count) : ($average = $sum);
//     return $average;
// }

function countPrimes($array) {
    $sum = 0;
    $count = 0;
    foreach($array as $value) {
        if (is_numeric($value)) {
            if (isPrime($value)) {
                $sum += $value;
                $count++;
            }
        } else {
            $sum += countPrimes($value)['sum'];
            $count += countPrimes($value)['count'];
        }
    }
    0 < $count ? ($average = $sum / $count) : ($average = $sum);
    return ['sum' => $sum, 'count' => $count, 'average' => $average];
}

function &findSmallest(&$array) {
    $smallest = INF;
    foreach($array as &$value) {
        if (is_array($value)) {
            if ($smallest > findSmallest($value)) $smallest = &findSmallest($value);
        } else {
            if ($smallest > $value) $smallest = &$value;
        }
    }
    return $smallest;
}


foreach (range(1, 10) as $_) {
    $temp = [];
    foreach (range(1, 10) as $_) {
        $temp[] = rand(1, 100);
    }
    $array[] = $temp;
    unset($temp);
}
echo '<pre>';
print_r($array);
echo '<br><br>';

echo '<pre>';
print_r(countPrimes($array));
echo '<br><br>';

while (countPrimes($array)['average'] < 70) {
    $temp = &findSmallest($array);
    $temp += 3;
}
unset($temp);

echo 'Po pakeitimu: <br><br>';
echo '<pre>';
print_r($array);
echo '<br><br>Primes info: ';
echo '<pre>';
print_r(countPrimes($array));
echo '</pre>';
?>