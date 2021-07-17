<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\collection\Contract\Operation;

use Iterator;
use loophp\collection\Contract\Collection;

/**
 * @template TKey
 * @template T
 */
interface ScanLeftable
{
    /**
     * @template V
     * @template W
     *
     * @param callable(W, T, TKey, Iterator<TKey, T>): V $callback
     * @param W $initial
     *
     * @return Collection<int|TKey, V|W>
     */
    public function scanLeft(callable $callback, $initial = null): Collection;
}
