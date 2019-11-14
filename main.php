<?php
/**
 * Created by Nick on 01 nov. 2019.
 * Copyright © ImSpooks
 */

spl_autoload_register(function ($class) {
    require_once "init/{$class}.php";
});
EnergyType::initialize();

/*if (true) {
    $min = 0;
    $max = 1;

    $lowest = $max;
    $highest = $min;

    for ($i = 0; $i < 100; $i++) {
        $val = rand($min, $max);
        echo "value: " . $val . "\n";
        $lowest = min($lowest, $val);
        $highest = max($highest, $val);
    }

    echo "lowets: " . $lowest . "\n";
    echo "highest: " . $highest . "\n";

    return;
}*/

$pikachu = new Pokemon("Pikachu", 20, [EnergyType::$ELECTRIC],
    [
        StatType::HITPONTS => 35,
        StatType::ATTACK => 55,
        StatType::DEFENCE => 40,
        StatType::SPECIAL_ATTACK => 50,
        StatType::SPECIAL_DEFENCE => 50,
        StatType::SPEED => 90
    ],
    [rand(0, 31), rand(0, 31), rand(0, 31), rand(0, 31), rand(0, 31), rand(0, 31)], // IVs
    Nature::CACHE[rand(0, count(Nature::CACHE) - 1)],
    [
        new Attack("Electric Ring", 50, EnergyType::$ELECTRIC),
        new Attack("Pika Punch", 20, EnergyType::$ELECTRIC)
    ]
);

$charmeleon = new Pokemon("Charmeleon", 20, [EnergyType::$FIRE],
    [
        StatType::HITPONTS => 58,
        StatType::ATTACK => 64,
        StatType::DEFENCE => 58,
        StatType::SPECIAL_ATTACK => 80,
        StatType::SPECIAL_DEFENCE => 65,
        StatType::SPEED => 80
    ],
    [rand(0, 31), rand(0, 31), rand(0, 31), rand(0, 31), rand(0, 31), rand(0, 31)],
    Nature::CACHE[rand(0, count(Nature::CACHE) - 1)],
    [
        new Attack("Head Butt", 10, EnergyType::$NORMAL),
        new Attack("Flare", 30, EnergyType::$FIRE)
    ]
);

while (true) {
    if ($pikachu->getHealth() <= 0) {
        echo "Pikachu died.";
        break;
    }

    if ($charmeleon->getHealth() <= 0) {
        echo "Charmeleon died.";
        break;
    }

    $first = null;
    $second = null;

    if ($pikachu->getStat(StatType::SPEED) == $charmeleon->getStat(StatType::SPEED)) { // same speed
        if (rand(0, 1) == 0) {
            $first = $pikachu;
            $second = $charmeleon;
        } else {
            $first = $charmeleon;
            $second = $pikachu;
        }
    }
    else if ($pikachu->getStat(StatType::SPEED) > $charmeleon->getStat(StatType::SPEED)) { // pikachu faster than charmeleon
        $first = $pikachu;
        $second = $charmeleon;
    }
    else if ($pikachu->getStat(StatType::SPEED) < $charmeleon->getStat(StatType::SPEED)) { // charmeleon faster than pikachu
        $first = $charmeleon;
        $second = $pikachu;
    }

    if ($first == null || $second == null) {
        echo "Nullpointer";
        return;
    }

    $first->attack($second, $first->getAttacks()[rand(0, count($first->getAttacks()) - 1)]);
    $second->attack($first, $second->getAttacks()[rand(0, count($second->getAttacks()) - 1)]);

    echo "\n";
}