<?php
/*
1. Программно создайте массив из 50 пользователей, у каждого пользователя есть поля id, name и age:
id - уникальный идентификатор, равен номеру эл-та в массиве
name - случайное имя из 5ти возможных (сами придумайте каких)
age - случайное число от 18 до 45
2. Преобразуйте массив в json и сохраните в файл users.json
3. Откройте файл users.json и преобразуйте данные из него обратно ассоциативный массив РНР.
4. Посчитайте количество пользователей с каждым именем в массиве
5. Посчитайте средний возраст пользователей
 */

include "./src/functions.php";

for($i = 0; $i < 50; $i++) {
    $users[] = createUser();
}

//Преобразуйте массив в json и сохраните в файл users.json
file_put_contents('users.json', json_encode($users));

//var_dump($users);

$data = file_get_contents('users.json');
$decodedUsers = json_decode($data, true);

//var_dump($decodedUsers);

$names = [];
$sumAge = 0;
foreach ($decodedUsers as $user) {
    if (isset($names[$user['name']])) {
        $names[$user['name']]++;
    } else {
        $names[$user['name']] = 1;
    }
    $sumAge += $user['age'];
}

var_dump($names);
echo "Средний возраст: " . ($sumAge / sizeof($decodedUsers));