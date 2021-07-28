<?php

declare(strict_types=1);

namespace CarrotRakko\EnchantmentCostOptimization\Enchantment;

class SoulSpeed extends Enchantment
{
    /**
     * {@inheritDoc}
     */
    public static function getMaxLevel(): int
    {
        return 3;
    }

    /**
     * @inheritDoc
     */
    public static function getMultiplierFromNonBook(): int
    {
        return 8;
    }

    /**
     * @inheritDoc
     */
    public static function getMultiplierFromBook(): int
    {
        return 4;
    }
}
