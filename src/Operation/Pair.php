<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\collection\Operation;

use Closure;
use Generator;
use Iterator;

/**
 * @immutable
 *
 * @template TKey
 * @template T
 */
final class Pair extends AbstractOperation
{
    /**
     * @pure
     *
     * @return Closure(Iterator<TKey, T>): Generator<T|TKey, T>
     */
    public function __invoke(): Closure
    {
        $callbackForKeys =
            /**
             * @param T $initial
             * @param TKey $key
             * @param array{0: TKey, 1: T} $value
             *
             * @return T|TKey|null
             */
            static fn ($initial, $key, array $value) => $value[0] ?? null;

        $callbackForValues =
            /**
             * @param T $initial
             * @param TKey $key
             * @param array{0: TKey, 1: T} $value
             *
             * @return T|TKey|null
             */
            static fn ($initial, $key, array $value) => $value[1] ?? null;

        /** @var Closure(Iterator<TKey, T>): Generator<T|TKey, T> $pipe */
        $pipe = Pipe::of()(
            Chunk::of()(2),
            Map::of()(
                static fn (array $value): array => array_values($value)
            ),
            Associate::of()($callbackForKeys)($callbackForValues)
        );

        // Point free style.
        return $pipe;
    }
}
