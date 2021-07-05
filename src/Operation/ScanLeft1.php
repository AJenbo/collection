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
use loophp\fpt\FPT;

/**
 * @immutable
 *
 * @template TKey
 * @template T
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class ScanLeft1 extends AbstractOperation
{
    /**
     * @pure
     *
     * @return Closure(callable((T|null), T, TKey, Iterator<TKey, T>): (T|null)):Closure (Iterator<TKey, T>): Generator<int|TKey, T|null>
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(T|null, T, TKey, Iterator<TKey, T>):(T|null) $callback
             *
             * @return Closure(Iterator<TKey, T>): Generator<int|TKey, T|null>
             */
            static fn (callable $callback): Closure =>
                /**
                 * @param Iterator<TKey, T> $iterator
                 *
                 * @return Generator<int|TKey, T|null>
                 */
                static function (Iterator $iterator) use ($callback): Iterator {
                    $initial = $iterator->current();

                    /** @var Closure(Iterator<TKey, T>):(Generator<int|TKey, T|null>) $pipe */
                    $pipe = Pipe::of()(
                        Tail::of(),
                        FPT::reduction()($callback)($initial),
                        Prepend::of()($initial)
                    );

                    return $pipe($iterator);
                };
    }
}
