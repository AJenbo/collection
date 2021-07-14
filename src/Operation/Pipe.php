<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\collection\Operation;

use Closure;
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
final class Pipe extends AbstractOperation
{
    /**
     * @pure
     *
     * @return Closure(callable(iterable<TKey, T>): iterable<TKey, T> ...): Closure(iterable<TKey, T>): iterable<TKey, T>
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(iterable<TKey, T>): iterable<TKey, T> ...$operations
             *
             * @return Closure(iterable<TKey, T>): iterable<TKey, T>
             */
            static fn (callable ...$operations): Closure =>
                /**
                 * @param iterable<TKey, T> $iterator
                 *
                 * @return iterable<TKey, T>
                 */
                static fn (Iterator $iterator): Iterator => array_reduce($operations, FPT::flip()('call_user_func'), $iterator);
    }
}
