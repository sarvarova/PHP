<?php
const NAMES = [
    'Sveta', 'Masha', 'Katja', 'Anna', 'Kolja'
];

// создаем пользователей
function createUser()
{
    return [
        'name' => NAMES[array_rand(NAMES)],
        'age' => mt_rand(18, 45)
    ];
}