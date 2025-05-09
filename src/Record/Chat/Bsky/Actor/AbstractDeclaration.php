<?php

/**
 * GENERATED CODE.
 */

declare(strict_types=1);

namespace Revolution\AtProto\Lexicon\Record\Chat\Bsky\Actor;

use Revolution\AtProto\Lexicon\Attributes\KnownValues;
use Revolution\AtProto\Lexicon\Attributes\Required;

/**
 * A declaration of a Bluesky chat account.
 */
#[Required(['allowIncoming'])]
abstract class AbstractDeclaration
{
    public const NSID = 'chat.bsky.actor.declaration';

    #[KnownValues(['all', 'none', 'following'])]
    protected string $allowIncoming;
}
