<?php

declare(strict_types=1);

namespace CarrotRakko\EnchantmentCostOptimization\Enchantment;

class SweepingEdge extends Enchantment
{
    /**
     * {@inheritDoc}
     */
    public static function getMaxLevel(): int
    {
        return 3;
    }
}
