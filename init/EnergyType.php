<?php
/**
 * Created by Nick on 01 nov. 2019.
 * Copyright © ImSpooks
 */

class EnergyType {

    public static $NORMAL = ["ID" => 1, "NAME" => "Normal"];
    public static $FIRE = ["ID" => 2, "NAME" => "Fire"];
    public static $WATER = ["ID" => 3, "NAME" => "Water"];
    public static $GRASS = ["ID" => 4, "NAME" => "Grass"];
    public static $ELECTRIC = ["ID" => 5, "NAME" => "Electric"];
    public static $ICE = ["ID" => 6, "NAME" => "Ice"];
    public static $FIGHTING = ["ID" => 7, "NAME" => "Fighting"];
    public static $POISON = ["ID" => 8, "NAME" => "Poison"];
    public static $GROUND = ["ID" => 9, "NAME" => "Ground"];
    public static $FLYING = ["ID" => 10, "NAME" => "Flying"];
    public static $PSYCHIC = ["ID" => 11, "NAME" => "Psychic"];
    public static $BUG = ["ID" => 12, "NAME" => "Bug"];
    public static $ROCK = ["ID" => 13, "NAME" => "Rock"];
    public static $GHOST = ["ID" => 14, "NAME" => "Ghost"];
    public static $DRAGON = ["ID" => 15, "NAME" => "Dragon"];
    public static $DARK = ["ID" => 16, "NAME" => "Dark"];
    public static $STEEL = ["ID" => 17, "NAME" => "Steel"];
    public static $FAIRY = ["ID" => 18, "NAME" => "Fairy"];

    public static $CACHE;
    
    public static function initialize() {
        self::$NORMAL["WEAKNESS"] = [self::$FIGHTING["ID"]];
        self::$NORMAL["IMMUNE"] = [self::$GHOST["ID"]];

        self::$FIRE["WEAKNESS"] = [self::$WATER["ID"], self::$GROUND["ID"], self::$ROCK["ID"]];
        self::$FIRE["RESISTANCE"] = [self::$FIRE["ID"], self::$GRASS["ID"], self::$ICE["ID"], self::$STEEL["ID"], self::$FAIRY["ID"]];

        self::$WATER["WEAKNESS"] = [self::$ELECTRIC["ID"], self::$GRASS["ID"]];
        self::$WATER["RESISTANCE"] = [self::$FIRE["ID"], self::$WATER["ID"], self::$ICE, self::$STEEL["ID"]];

        self::$ELECTRIC["WEAKNESS"] = [self::$GROUND["ID"]];
        self::$ELECTRIC["RESISTANCE"] = [self::$ELECTRIC["ID"], self::$FLYING["ID"], self::$STEEL["ID"]];

        self::$GRASS["WEAKNESS"] = [self::$FIRE["ID"], self::$ICE["ID"], self::$POISON["ID"], self::$FLYING["ID"], self::$BUG["ID"]];
        self::$GRASS["RESISTANCE"] = [self::$WATER["ID"], self::$ELECTRIC["ID"], self::$GRASS["ID"], self::$GRASS["ID"]];

        self::$ICE["WEAKNESS"] = [self::$FIRE["ID"], self::$FIGHTING["ID"], self::$ROCK["ID"], self::$STEEL["ID"]];
        self::$ICE["RESISTANCE"] = [self::$ICE["ID"]];

        self::$FIGHTING["WEAKNESS"] = [self::$FLYING["ID"], self::$PSYCHIC["ID"], self::$FAIRY["ID"]];
        self::$FIGHTING["RESISTANCE"] = [self::$BUG["ID"], self::$ROCK["ID"], self::$DARK["ID"]];

        self::$POISON["WEAKNESS"] = [self::$GROUND["ID"], self::$PSYCHIC["ID"]];
        self::$POISON["RESISTANCE"] = [self::$GRASS["ID"], self::$FIGHTING["ID"], self::$POISON["ID"], self::$BUG["ID"]];

        self::$GROUND["WEAKNESS"] = [self::$WATER["ID"], self::$GRASS["ID"], self::$ICE["ID"]];
        self::$GROUND["RESISTANCE"] = [self::$POISON["ID"], self::$ROCK["ID"]];
        self::$NORMAL["IMMUNE"] = [self::$ELECTRIC["ID"]];

        self::$FLYING["WEAKNESS"] = [self::$ELECTRIC["ID"], self::$ICE["ID"], self::$ROCK["ID"]];
        self::$FLYING["RESISTANCE"] = [self::$GRASS["ID"], self::$FIGHTING["ID"], self::$BUG["ID"]];
        self::$NORMAL["IMMUNE"] = [self::$GROUND["ID"]];

        self::$PSYCHIC["WEAKNESS"] = [self::$BUG["ID"], self::$GHOST["ID"], self::$DARK["ID"]];
        self::$PSYCHIC["RESISTANCE"] = [self::$FIGHTING["ID"], self::$PSYCHIC["ID"]];

        self::$BUG["WEAKNESS"] = [self::$FIRE["ID"], self::$FLYING["ID"], self::$ROCK["ID"]];
        self::$BUG["RESISTANCE"] = [self::$GRASS["ID"], self::$FIGHTING["ID"], self::$GROUND["ID"]];

        self::$ROCK["WEAKNESS"] = [self::$WATER["ID"], self::$GROUND["ID"], self::$FIGHTING["ID"], self::$GROUND["ID"], self::$STEEL["ID"]];
        self::$ROCK["RESISTANCE"] = [self::$NORMAL["ID"], self::$FIRE["ID"], self::$POISON["ID"], self::$FLYING["ID"]];

        self::$GHOST["WEAKNESS"] = [self::$GHOST["ID"], self::$DARK["ID"]];
        self::$GHOST["RESISTANCE"] = [self::$POISON["ID"], self::$BUG["ID"]];
        self::$NORMAL["IMMUNE"] = [self::$NORMAL["ID"], self::$FIGHTING["ID"]];

        self::$DRAGON["WEAKNESS"] = [self::$ICE["ID"], self::$DRAGON["ID"], self::$FAIRY["ID"]];
        self::$DRAGON["RESISTANCE"] = [self::$FIRE["ID"], self::$WATER["ID"], self::$ELECTRIC["ID"], self::$GRASS["ID"]];

        self::$DARK["WEAKNESS"] = [self::$FIGHTING["ID"], self::$BUG["ID"], self::$FAIRY["ID"]];
        self::$DARK["RESISTANCE"] = [self::$GHOST["ID"], self::$DARK["ID"]];
        self::$NORMAL["IMMUNE"] = [self::$PSYCHIC["ID"]];

        self::$STEEL["WEAKNESS"] = [self::$FIRE["ID"], self::$FIGHTING["ID"], self::$GROUND["ID"]];
        self::$STEEL["RESISTANCE"] = [self::$NORMAL["ID"], self::$GRASS["ID"], self::$ICE["ID"], self::$FLYING["ID"], self::$PSYCHIC["ID"], self::$BUG["ID"], self::$ROCK["ID"], self::$DRAGON["ID"], self::$STEEL["ID"], self::$FAIRY["ID"]];
        self::$NORMAL["IMMUNE"] = [self::$POISON["ID"]];

        self::$FAIRY["WEAKNESS"] = [self::$POISON["ID"], self::$STEEL["ID"]];
        self::$FAIRY["RESISTANCE"] = [self::$FIGHTING["ID"], self::$BUG["ID"], self::$DARK["ID"]];
        self::$NORMAL["IMMUNE"] = [self::$DRAGON["ID"]];

        self::$CACHE = [
            self::$NORMAL,
            self::$FIRE,
            self::$WATER,
            self::$ELECTRIC,
            self::$GRASS,
            self::$ICE,
            self::$FIGHTING,
            self::$POISON,
            self::$GROUND,
            self::$FLYING,
            self::$PSYCHIC,
            self::$BUG,
            self::$ROCK,
            self::$GHOST,
            self::$DRAGON,
            self::$DARK,
            self::$STEEL,
            self::$FAIRY
        ];

        foreach (self::$CACHE as $type) {
            if (!array_key_exists("WEAKNESS", $type))
                $type["WEAKNESS"] = [];
            if (!array_key_exists("WEAKNESS", $type))
                $type["RESISTANCE"] = [];
            if (!array_key_exists("IMMUNE", $type))
                $type["IMMUNE"] = [];
        }
    }

    public static function isWeakTo(array $source, array $other): bool {
        return in_array($source["WEAKNESS"], $other);
    }

    public static function isResistentTo(array $source, array $other): bool {
        return in_array($source["RESISTANCE"], $other);
    }

    public static function isImmuneTo(array $source, array $other): bool {
        return in_array($source["IMMUNE"], $other);
    }

    public static function getFromId(int $id): array {
        foreach (self::$CACHE as $type) {
            if ($type["ID"] == $id)
                return $type;
        }
        return ["ID" => -1, "NAME" => "null", "WEAKNESS" => [], "RESISTANCE" => [], "IMMUNE" => []];
    }

    public static function getFromName(string $name, bool $ignoreCase = true): array {
        foreach (self::$CACHE as $type) {
            if (($ignoreCase && strtolower($type["NAME"]) == strtolower($name)) || (!$ignoreCase && $type["NAME"] == $name))
                return $type;
        }
        return ["ID" => -1, "NAME" => "null"];
    }
}