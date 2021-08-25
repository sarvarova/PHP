<?php
/*
Задание #1

1. Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе (тег <p>)
2. Если в функцию передан второй параметр true, то возвращать (через return) результат в виде 
   одной объединенной строки.
*/

function task1($arr, $flag = true)
{
    if (!$flag) {
        foreach ($arr as $key => $str) {
            echo "<p>$str</p>";
        }
    } else {
        $result = implode(" ,", $arr);
        return $result;
    }
}

/*
Задание #2

1. Функция должна принимать переменное число аргументов.
2. Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие, 
которое необходимо выполнить со всеми передаваемыми аргументами.
3. Остальные аргументы это целые и/или вещественные числа.
Пример вызова: calcEverything(‘+’, 1, 2, 3, 5.2);
Результат: 1 + 2 + 3 + 5.2 = 11.2
*/

function task2(string $action, ...$args)
{
    foreach ($args as $n => $arg) {
        if (!is_int($arg) && !is_float($arg)) {
            trigger_error('argument #' . $n . ' is not integer or float');
            return 'Ошибка: массив состоит не из чисел';
        }
    }
    switch ($action) {
        case '+':
            return array_sum($args); //array_sum() возвращает сумму значений массива
        case '-':
            return array_shift($args) - array_sum($args); //array_shift() извлекает первое значение массива array и возвращает его, сокращая размер array на один элемент. 
        case '/':
            $result = array_shift($args);
            foreach ($args as $n => $arg) {
                if ($arg == 0) {
                    trigger_error('derive by zero on argument #' . ($n + 1));
                    return 'Ошибка: На ноль делить нельзя';
                }
                $result = $result / $arg;
            }
            return $result;
        case '*':
            $result = 1;
            foreach ($args as $arg) {
                $result *= $arg;
            }

            return $result;

        default:
            return 'Ошибка: Неизвестное действие';
    }
}

/*
Задание #3

1. Функция должна принимать два параметра – целые числа.
2. Если в функцию передали 2 целых числа, то функция должна отобразить таблицу умножения 
размером со значения параметров, переданных в функцию. 
(Например если передано 8 и 8, то нарисовать от 1х1 до 8х8). 
Таблица должна быть выполнена с использованием тега <table>
3. В остальных случаях выдавать корректную ошибку.
*/

function task3($a, $b)
{
    if (!is_int($a)) {
        trigger_error('Введите целое число');
        return false;
    }
    if (!is_int($b)) {
        trigger_error('Введите целое число');
        return false;
    }

    if ($a < 0 || $b < 0) {
        trigger_error('Введите два целых числа больше нуля.');
        return false;
    }

    $result = '<table>';
    for ($i = 1; $i <= $a; $i++) {
        $result .= '<tr>';
        for ($j = 1; $j <= $b; $j++) {
            $result .= '<td>';
            $result .= $i * $j;
            $result .= '</td>';
        }
        $result .= '</tr>';
    }
    $result .= '</table>';
    echo $result;
}

/*
Задание #4

1. Выведите информацию о текущей дате в формате 31.12.2016 23:59
2. Выведите unixtime время соответствующее 24.02.2016 00:00:00.
*/

function task4()
{
    echo date('j.n.Y G:i'), '<br>';
    echo strtotime('24-02-2016 00:00:00'), '<br>';
}

/*
Задание #5 

1. Дана строка: “Карл у Клары украл Кораллы”. Удалить из этой строки все заглавные буквы “К”.
2. Дана строка: “Две бутылки лимонада”. Заменить “Две”, на “Три”.
*/

function task5()
{
    echo preg_replace('|К|', '', 'Карл у Клары украл Кораллы'), '<br>';
    echo preg_replace('|Две|', 'Три', 'Две бутылки лимонада'), '<br>';
}

/*
Задание #6

1. Создайте файл test.txt средствами PHP. Поместите в него текст - “Hello again!”
2. Напишите функцию, которая будет принимать имя файла, открывать файл и выводить содержимое на экран.
*/

function task6($fileName, $content)
{
    if (file_exists($fileName)) {
        echo 'Файл с таким именем уже существует!';
        return null;
    }
    
    $fp = fopen($fileName, 'wb');

    if ($fp === false) {
        echo 'Не удалось создать файл ' . $fileName;
        return null;
    }

    echo 'Файл ' . $fileName . ' успешно создан ', '<br>';

    if (!fwrite($fp, $content)) {
        echo "Не могу произвести запись в файл.";
        return null;
    }
    echo 'Запись в файл прошла успешно';
    fclose($fp);
}


