<?php

declare(strict_types=1);

namespace loophp\collection\Contract\Transformation;

/**
 * @template TKey
 * @psalm-template TKey of array-key
 * @template T
 */
interface FoldLeftable
{
    /**
     * Fold the collection from the left to the right.
     *
     * @param mixed $initial
     * @psalm-param T|null $initial
     *
     * @return mixed
     * @psalm-return T|null
     */
    public function foldLeft(callable $callback, $initial = null);
}
