<?php

declare(strict_types=1);

namespace CarrotRakko\EnchantmentCostOptimization\Enchantment;

class FireProtection extends Enchantment
{
    /**
     * {@inheritDoc}
     */
    public static function getMaxLevel(): int
    {
        return 4;
    }

    /**
     * @inheritDoc
     */
    public static function getMultiplierFromNonBook(): int
    {
        return 2;
    }

    /**
     * @inheritDoc
     */
    public static function getMultiplierFromBook(): int
    {
        return 1;
    }
}
