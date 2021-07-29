<?php

declare(strict_types=1);

namespace CarrotRakko\EnchantmentCostOptimization;

use CarrotRakko\EnchantmentCostOptimization\Item\Book\Book;

class Anvil
{
    public static function combineBookWithBook(Book $leftBook, Book $rightBook): array
    {
        // 不可能なら例外をthrow
        // 可能かどうかの判定をしたい
        //
        // 仮説
        // 1. 競合するエンチャントの組を左右の本から消していくと考える
        // 2. 右にエンチャントが残れば合成可能となる
        // 3. そうでなければ合成不可能となる
        //
        // NGなものたち
        // - Silk Touch, Fortune III => NG
        // - Silk Touch + Sharpness V, Fortune III + Smite V => NG
        // - Silk Touch + Sharpness V + Depth Strider III, Fortune III + Smite V + Frost Walker II => NG
        //
        // NGなものたち
        // - Silk Touch + Sharpness V, Fortune III => NG
        // - Silk Touch + Sharpness V + Depth Strider III, Fortune III + Smite V => NG
        //
        // OKなものたち
        // - Fortune III, Silk Touch + Sharpness V => OK
        // - Fortune III + Smite V, Silk Touch + Sharpness V + Depth Strider III => OK

        // 成果物を返す
        // - 左側のエンチャントは全て残る
        // - 右側のエンチャントのうち、左側と競合しないものは残る

        // コストを返す
        // - 左側のペナルティ
        // - 右側のペナルティ
        // - 右側のエンチャントのうち、左側と競合するものの個数
        // - 右側のエンチャントのうち、左側と競合しないもののコスト
    }
}
