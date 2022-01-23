<?php
const NAMES = ['Sofia', 'Arina', 'Vanessa', 'Marina', 'Diana'];
const USERS_COUNT = 50;

function createUsers($count)
{
    $array = [];
    for ($i = 0; $i < $count; $i++) {
        $array[$i] = [
            'id' => $i,
            'name' => NAMES[array_rand(NAMES)],
            'age' => mt_rand(18,45)
        ];
    }
    return $array;
}


$users = createUsers(USERS_COUNT);

file_put_contents('users.json', json_encode($users));

$jsonData = file_get_contents('users.json');
$decodedUsers = json_decode($jsonData, true);

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
$averageAge = intval($sumAge / USERS_COUNT);

foreach ($names as $key => $value) {
    echo "Number of name $key = $value";
    echo "<br>";
}

echo "<br>";
echo "Average age = $averageAge";
