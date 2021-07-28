<?php

declare(strict_types=1);

namespace CarrotRakko\EnchantmentCostOptimization\Item;

use CarrotRakko\EnchantmentCostOptimization\Enchantment\BaneOfArthropods;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\BlastProtection;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\Channeling;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\DepthStrider;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\FireProtection;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\Fortune;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\FrostWalker;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\Infinity;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\Loyalty;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\Mending;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\Multishot;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\Piercing;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\ProjectileProtection;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\Protection;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\Riptide;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\Sharpness;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\SilkTouch;
use CarrotRakko\EnchantmentCostOptimization\Enchantment\Smite;

abstract class Item
{
    /**
     * List of Enchantment instances attached to this Item.
     *
     * @var array
     */
    protected array $attached_enchantments;

    /**
     * Item constructor.
     *
     * @param array $attached_enchantments
     * @throws IncompatibleEnchantmentsException
     */
    public function __construct(array $attached_enchantments)
    {
        static::throwWhenIncompatibleEnchantmentsExists($attached_enchantments);
        $this->attached_enchantments = $attached_enchantments;
    }

    /**
     * Simple getter.
     *
     * @return array
     */
    public function getAttachedEnchantments(): array
    {
        return $this->attached_enchantments;
    }

    /**
     * Throw IncompatibleEnchantmentsException when there are groups of incompatible enchantments.
     *
     * @param array $enchantments
     * @return void
     * @throws IncompatibleEnchantmentsException
     */
    protected static function throwWhenIncompatibleEnchantmentsExists(array $enchantments): void
    {
        $bane_of_arthropods_exists    = false;
        $blast_protection_exists      = false;
        $channeling_exists            = false;
        $depth_strider_exists         = false;
        $fire_protection_exists       = false;
        $fortune_exists               = false;
        $frost_walker_exists          = false;
        $infinity_exists              = false;
        $loyalty_exists               = false;
        $mending_exists               = false;
        $multishot_exists             = false;
        $piercing_exits               = false;
        $projectile_protection_exists = false;
        $protection_exists            = false;
        $riptide_exists               = false;
        $sharpness_exists             = false;
        $silk_touch_exists            = false;
        $smite_exists                 = false;

        foreach ($enchantments as $enchantment) {
            switch (true) {
                case $enchantments instanceof BaneOfArthropods:
                    $bane_of_arthropods_exists = true;
                    break;
                case $enchantments instanceof BlastProtection:
                    $blast_protection_exists = true;
                    break;
                case $enchantments instanceof Channeling:
                    $channeling_exists = true;
                    break;
                case $enchantments instanceof DepthStrider:
                    $depth_strider_exists = true;
                    break;
                case $enchantments instanceof FireProtection:
                    $fire_protection_exists = true;
                    break;
                case $enchantments instanceof Fortune:
                    $fortune_exists = true;
                    break;
                case $enchantments instanceof FrostWalker:
                    $frost_walker_exists = true;
                    break;
                case $enchantments instanceof Infinity:
                    $infinity_exists = true;
                    break;
                case $enchantments instanceof Loyalty:
                    $loyalty_exists = true;
                    break;
                case $enchantments instanceof Mending:
                    $mending_exists = true;
                    break;
                case $enchantments instanceof Multishot:
                    $multishot_exists = true;
                    break;
                case $enchantments instanceof Piercing:
                    $piercing_exits = true;
                    break;
                case $enchantments instanceof ProjectileProtection:
                    $projectile_protection_exists = true;
                    break;
                case $enchantments instanceof Protection:
                    $protection_exists = true;
                    break;
                case $enchantments instanceof Riptide:
                    $riptide_exists = true;
                    break;
                case $enchantments instanceof Sharpness:
                    $sharpness_exists = true;
                    break;
                case $enchantments instanceof SilkTouch:
                    $silk_touch_exists = true;
                    break;
                case $enchantments instanceof Smite:
                    $smite_exists = true;
                    break;
                default:
                    // do nothing
            }
        }

        if (1 < count(array_filter(
            [
                $blast_protection_exists,
                $fire_protection_exists,
                $projectile_protection_exists,
                $protection_exists,
            ],
            function (bool $exist): bool {
                return $exist;
            },
        ))) {
            throw new IncompatibleEnchantmentsException();
        }

        if (1 < count(array_filter(
            [
                $depth_strider_exists,
                $frost_walker_exists,
            ],
            function (bool $exist): bool {
                return $exist;
            },
        ))) {
            throw new IncompatibleEnchantmentsException();
        }

        if (1 < count(array_filter(
            [
                $bane_of_arthropods_exists,
                $sharpness_exists,
                $smite_exists,
            ],
            function (bool $exist): bool {
                return $exist;
            },
        ))) {
            throw new IncompatibleEnchantmentsException();
        }

        if (1 < count(array_filter(
            [
                $fortune_exists,
                $silk_touch_exists,
            ],
            function (bool $exist): bool {
                return $exist;
            },
        ))) {
            throw new IncompatibleEnchantmentsException();
        }

        if (1 < count(array_filter(
            [
                $infinity_exists,
                $mending_exists,
            ],
            function (bool $exist): bool {
                return $exist;
            },
        ))) {
            throw new IncompatibleEnchantmentsException();
        }

        if (1 < count(array_filter(
            [
                $channeling_exists,
                $riptide_exists,
            ],
            function (bool $exist): bool {
                return $exist;
            },
        ))) {
            throw new IncompatibleEnchantmentsException();
        }

        if (1 < count(array_filter(
            [
                $loyalty_exists,
                $riptide_exists,
            ],
            function (bool $exist): bool {
                return $exist;
            },
        ))) {
            throw new IncompatibleEnchantmentsException();
        }

        if (1 < count(array_filter(
            [
                $multishot_exists,
                $piercing_exits,
            ],
            function (bool $exist): bool {
                return $exist;
            },
        ))) {
            throw new IncompatibleEnchantmentsException();
        }
    }
}
