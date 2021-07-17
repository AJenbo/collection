<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

include __DIR__ . '/../../vendor/autoload.php';

use loophp\collection\Collection;
use loophp\collection\Contract\Collection as CollectionInterface;

$sum = static fn (int $carry, int $value): int => $carry + $value;
$concat = static fn (?string $carry, string $string): string => sprintf('%s%s', (string) $carry, $string);

/**
 * @param CollectionInterface<int, int> $collection
 */
function scanRight_checkListInt(CollectionInterface $collection): void
{
}

/**
 * @param CollectionInterface<int, string> $collection
 */
function scanRight_checkListString(CollectionInterface $collection): void
{
}

/**
 * @param CollectionInterface<int, string|null> $collection
 */
function scanRight_checkListStringWithNull(CollectionInterface $collection): void
{
}

scanRight_checkListInt(Collection::fromIterable([1, 2, 3])->scanRight($sum, 5));
scanRight_checkListString(Collection::fromIterable(range('a', 'c'))->scanRight($concat, ''));
scanRight_checkListStringWithNull(Collection::fromIterable(range('a', 'c'))->scanRight($concat));
