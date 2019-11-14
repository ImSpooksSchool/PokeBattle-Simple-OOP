<?php
/**
 * Created by Nick on 01 nov. 2019.
 * Copyright © ImSpooks
 */

class Attack {
    private $name;
    private $power;
    private $type;

    public function __construct(string $name, int $power, array $type) {
        $this->name = $name;
        $this->power = $power;
        $this->type = $type;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPower(): int {
        return $this->power;
    }

    public function getType(): array {
        return $this->type;
    }
}