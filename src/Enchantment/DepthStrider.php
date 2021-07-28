<?php

declare(strict_types=1);

namespace CarrotRakko\EnchantmentCostOptimization\Enchantment;

class DepthStrider extends Enchantment
{
    /**
     * {@inheritDoc}
     */
    public static function getMaxLevel(): int
    {
        return 3;
    }
}
