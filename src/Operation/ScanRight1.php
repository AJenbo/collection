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
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class ScanRight1 extends AbstractOperation
{
    /**
     * @pure
     *
     * @return Closure(callable(T, T, TKey, Iterator<TKey, T>): T): Closure(Iterator<TKey, T>): Generator<int|TKey, T>
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(T, T, TKey, Iterator<TKey, T>): T $callback
             *
             * @return Closure(Iterator<TKey, T>): Generator<int|TKey, T>
             */
            static function (callable $callback): Closure {
                /** @var Closure(Iterator<TKey, T>): Generator<TKey, T> $pipe */
                $pipe = Pipe::of()(
                    Reverse::of(),
                    ScanLeft1::of()($callback),
                    Reverse::of()
                );

                // Point free style.
                return $pipe;
            };
    }
}
