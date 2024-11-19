<?php
/**
 * GENERATED CODE.
 */

declare(strict_types=1);

namespace Revolution\AtProto\Lexicon\Union\App\Bsky\Embed;

use Revolution\AtProto\Lexicon\Attributes\Ref;
use Revolution\AtProto\Lexicon\Attributes\Required;
use Revolution\AtProto\Lexicon\Attributes\Union;


#[Required(['record', 'media'])]
abstract class AbstractRecordWithMedia
{
    protected string $type = 'app.bsky.embed.recordWithMedia';

    #[Ref('app.bsky.embed.record')]
    protected array $record;

    #[Union(['app.bsky.embed.images', 'app.bsky.embed.video', 'app.bsky.embed.external'])]
    protected array $media;
}