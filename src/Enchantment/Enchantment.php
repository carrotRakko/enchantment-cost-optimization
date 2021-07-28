<?php

declare(strict_types=1);

namespace CarrotRakko\EnchantmentCostOptimization\Enchantment;

/**
 * Parent class of all concrete enchantment classes.
 */
abstract class Enchantment
{
    /**
     * The specific level of the instance of this enchantment, >= 1 and <= static::getMaxLevel().
     *
     * @var int
     */
    protected int $level;

    /**
     * Enchantment constructor.
     *
     * @param int $level
     */
    public function __construct(int $level)
    {
        if (!(1 <= $level && $level <= static::getMaxLevel())) {
            throw new LevelOutOfRangeException();
        }
        $this->level = $level;
    }

    /**
     * Simple getter.
     *
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * Returns the max possible level of this enchantment, >= 1.
     *
     * @return int
     */
    abstract public static function getMaxLevel(): int;
}
