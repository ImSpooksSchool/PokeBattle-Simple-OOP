<?php

use MongoDB\Driver\Query;

/**
 * Created by Nick on 05 nov. 2019.
 * Copyright © ImSpooks
 */

class Nature {
    const ADAMANT = ["ID" => 0, "NAME" => "Adamant", "STRONG" => StatType::ATTACK, "WEAK" => StatType::SPECIAL_ATTACK];
    const BASHFUL = ["ID" => 1, "NAME" => "Bashful", "STRONG" => StatType::SPECIAL_ATTACK, "WEAK" => StatType::SPECIAL_ATTACK];
    const BOLD = ["ID" => 2, "NAME" => "Bold", "STRONG" => StatType::DEFENCE, "WEAK" => StatType::ATTACK];
    const BRAVE = ["ID" => 3, "NAME" => "Brave", "STRONG" => StatType::ATTACK, "WEAK" => StatType::SPEED];
    const CALM = ["ID" => 4, "NAME" => "Calm", "STRONG" => StatType::SPECIAL_DEFENCE, "WEAK" => StatType::ATTACK];
    const CAREFUL = ["ID" => 5, "NAME" => "Careful", "STRONG" => StatType::SPECIAL_DEFENCE, "WEAK" => StatType::SPECIAL_ATTACK];
    const DOCILE = ["ID" => 6, "NAME" => "Docile", "STRONG" => StatType::DEFENCE, "WEAK" => StatType::DEFENCE];
    const GENTLE = ["ID" => 7, "NAME" => "Gentle", "STRONG" => StatType::SPECIAL_DEFENCE, "WEAK" => StatType::DEFENCE];
    const HARDY = ["ID" => 8, "NAME" => "Hardy", "STRONG" => StatType::ATTACK, "WEAK" => StatType::ATTACK];
    const HASTY = ["ID" => 9, "NAME" => "Hasty", "STRONG" => StatType::SPEED, "WEAK" => StatType::DEFENCE];
    const IMPISH = ["ID" => 10, "NAME" => "Impish", "STRONG" => StatType::DEFENCE, "WEAK" => StatType::SPECIAL_ATTACK];
    const JOLLY = ["ID" => 11, "NAME" => "Jolly", "STRONG" => StatType::SPEED, "WEAK" => StatType::SPECIAL_ATTACK];
    const LAX = ["ID" => 12, "NAME" => "Lax", "STRONG" => StatType::DEFENCE, "WEAK" => StatType::SPECIAL_DEFENCE];
    const LONELY = ["ID" => 13, "NAME" => "Lonely", "STRONG" => StatType::ATTACK, "WEAK" => StatType::DEFENCE];
    const MILD = ["ID" => 14, "NAME" => "Mold", "STRONG" => StatType::SPECIAL_ATTACK, "WEAK" => StatType::DEFENCE];
    const NAIVE = ["ID" => 15, "NAME" => "Naive", "STRONG" => StatType::SPECIAL_ATTACK, "WEAK" => StatType::ATTACK];
    const NAUGHTY = ["ID" => 16, "NAME" => "Naughty", "STRONG" => StatType::ATTACK, "WEAK" => StatType::SPECIAL_DEFENCE];
    const QUIET = ["ID" => 16, "NAME" => "Quiet", "STRONG" => StatType::SPECIAL_ATTACK, "WEAK" => StatType::SPEED];
    const QUIRKY = ["ID" => 17, "NAME" => "Quirky", "STRONG" => StatType::SPECIAL_DEFENCE, "WEAK" => StatType::SPECIAL_DEFENCE];
    const RASH = ["ID" => 18, "NAME" => "Rash", "STRONG" => StatType::SPECIAL_ATTACK, "WEAK" => StatType::SPECIAL_DEFENCE];
    const RELAXED = ["ID" => 19, "NAME" => "Relaxed", "STRONG" => StatType::DEFENCE, "WEAK" => StatType::SPEED];
    const SASSY = ["ID" => 20, "NAME" => "Sassy", "STRONG" => StatType::SPECIAL_DEFENCE, "WEAK" => StatType::SPEED];
    const SERIOUS = ["ID" => 21, "NAME" => "Serious", "STRONG" => StatType::SPEED, "WEAK" => StatType::SPEED];
    const TIMID = ["ID" => 22, "NAME" => "Timid", "STRONG" => StatType::SPEED, "WEAK" => StatType::ATTACK];

    const CACHE = [self::ADAMANT, self::BASHFUL, self::BOLD, self::BRAVE, self::CALM, self::CAREFUL, self::DOCILE, self::GENTLE, self::HARDY, self::HASTY, self::IMPISH, self::JOLLY,
        self::LAX, self::LONELY, self::MILD, self::NAIVE, self::NAUGHTY, self::QUIET, self::QUIRKY, self::RASH, self::RELAXED, self::SASSY, self::SERIOUS, self::TIMID];
}