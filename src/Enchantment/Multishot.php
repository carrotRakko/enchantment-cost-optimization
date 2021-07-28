<?php

declare(strict_types=1);

namespace CarrotRakko\EnchantmentCostOptimization\Enchantment;

class Multishot extends Enchantment
{
    /**
     * {@inheritDoc}
     */
    public static function getMaxLevel(): int
    {
        return 1;
    }
}
