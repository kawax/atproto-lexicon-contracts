<?php

/**
 * GENERATED CODE.
 */

declare(strict_types=1);

namespace Revolution\AtProto\Lexicon\Record\App\Bsky\Actor;

use Revolution\AtProto\Lexicon\Attributes\Blob;
use Revolution\AtProto\Lexicon\Attributes\Format;
use Revolution\AtProto\Lexicon\Attributes\Ref;
use Revolution\AtProto\Lexicon\Attributes\Required;
use Revolution\AtProto\Lexicon\Attributes\Union;

/**
 * A declaration of a Bluesky account profile.
 */
#[Required([])]
abstract class AbstractProfile
{
    public const NSID = 'app.bsky.actor.profile';

    protected ?string $displayName = null;

    /**
     * Free-form profile description text.
     */
    protected ?string $description = null;

    /**
     * Small image to be displayed next to posts from account. AKA, 'profile picture'.
     */
    #[Blob(accept: ['image/png', 'image/jpeg'], maxSize: 1000000)]
    protected ?array $avatar = null;

    /**
     * Larger horizontal image to display behind profile view.
     */
    #[Blob(accept: ['image/png', 'image/jpeg'], maxSize: 1000000)]
    protected ?array $banner = null;

    /**
     * Self-label values, specific to the Bluesky application, on the overall account.
     */
    #[Union(['com.atproto.label.defs#selfLabels'])]
    protected ?array $labels = null;

    #[Ref('com.atproto.repo.strongRef')]
    protected ?array $joinedViaStarterPack = null;

    #[Ref('com.atproto.repo.strongRef')]
    protected ?array $pinnedPost = null;

    #[Format('datetime')]
    protected ?string $createdAt = null;
}
