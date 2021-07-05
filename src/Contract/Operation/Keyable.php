<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\collection\Contract\Operation;

/**
 * @template TKey
 * @template T
 */
interface Keyable
{
    /**
     * @param mixed|null $default
     *
     * @return TKey|null
     */
    public function key(int $index = 0, $default = null);
}
