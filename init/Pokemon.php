<?php
/**
 * Created by Nick on 01 nov. 2019.
 * Copyright © ImSpooks
 */

class Pokemon {
    private $name;
    private $level;
    private $types;

    private $basestats;
    private $IVs;
    private $nature;

    private $attacks;

    private $stats;
    private $health;

    public function __construct(string $name, int $level, array $types, array $basestats, array $IVs, array $nature, array $attacks) {
        $this->name = $name;
        $this->level = $level;
        $this->types = $types;
        $this->basestats = $basestats;
        $this->IVs = $IVs;
        $this->nature = $nature;
        $this->attacks = $attacks;

        $this->initialize();
    }

    private function initialize() {
        $this->stats = [
            StatType::HITPONTS => $this->statFormula(StatType::HITPONTS, $this->IVs[0], true),
            StatType::ATTACK => $this->statFormula(StatType::ATTACK, $this->IVs[1]),
            StatType::DEFENCE => $this->statFormula(StatType::DEFENCE, $this->IVs[2]),
            StatType::SPECIAL_ATTACK => $this->statFormula(StatType::SPECIAL_ATTACK, $this->IVs[3]),
            StatType::SPECIAL_DEFENCE => $this->statFormula(StatType::SPECIAL_DEFENCE, $this->IVs[4]),
            StatType::SPEED => $this->statFormula(StatType::SPEED, $this->IVs[5]),
        ];

        $this->health = $this->getStat(StatType::HITPONTS);
    }


    public function attack(Pokemon $pokemon, Attack $attack) {
        $pokemon->handleAttack($this, $attack);
    }

    public function handleAttack(Pokemon $attacker, Attack $attack) {
        $power = $attack->getPower();

        foreach ($this->types as $subtype) {
            if (EnergyType::isWeakTo($subtype, $attack->getType()))
                $power *= 2;
            if (EnergyType::isResistentTo($subtype, $attack->getType()))
                $power /= 2;
            if (EnergyType::isResistentTo($subtype, $attack->getType()))
                $power = 0;

            if ($power <= 0) {
                return;
            }
        }

        echo sprintf("%s attacked %s for %s damage with move %s! (%s hp -> %s hp)", $attacker->getName(), $this->getName(), $power, $attack->getName(), $this->health, $this->health - $power) . "\n";
        $this->setHealth($this->health - $power);
    }

    public function getName(): string {
        return $this->name;
    }

    public function getTypes(): array {
        return $this->types;
    }

    public function getStat(string $type): int {
        return $this->stats[$type];
    }

    public function getBaseStat(string $type): int {
        return $this->basestats[$type];
    }

    public function getHealth(): int {
        return $this->health;
    }

    public function setHealth(int $health): void {
        $this->health = $health;
    }

    public function getStats(): array {
        return $this->stats;
    }

    public function getAttacks(): array {
        return $this->attacks;
    }

    private function statFormula(string $basestat, int $iv, bool $health = false): int {
        $nature = 1;
        if ($nature["STRONG"] != $nature["WEAK"]) {
            if ($nature["STRONG"] == $basestat)
                $nature *= 1.1;
            if ($nature["WEAK"] == $basestat)
                $nature *= 0.9;
        }

        $stat = $this->getBaseStat($basestat);
        $ev = 0;
        if ($health) {
            return floor(
                (2 * $stat + $iv + floor(sqrt($ev) / 4)) * $this->level / 100
                ) + $this->level + 10;
        }
        return floor(
            (
                floor((2 * $stat + $iv + floor(sqrt($ev) / 4)) * $this->level / 100) + 5
            ) * $nature);
    }
}