<?php

declare(strict_types=1);

namespace loophp\collection\Contract\Operation;

use loophp\collection\Contract\Collection;

/**
 * @template TKey
 * @psalm-template TKey of array-key
 * @template T
 */
interface Splitable
{
    /**
     * Split a collection using a callback.
     *
     * @param callable ...$callbacks
     *
     * @return \loophp\collection\Contract\Collection<TKey, T>
     */
    public function split(callable ...$callbacks): Collection;
}
