<?php

declare(strict_types=1);

namespace Revolution\AtProto\Lexicon\Record\App\Bsky\Feed;

use Revolution\AtProto\Lexicon\Attributes\Ref;

/**
 * Record containing a Bluesky post.
 */
abstract class AbstractPost
{
    public const NSID ='app.bsky.feed.post';

   /**
    * The primary post content. May be an empty string, if there are embeds.
    */
    protected string $text;

   /**
    * DEPRECATED: replaced by app.bsky.richtext.facet.
    */
    protected ?array $entities = null;

   /**
    * Annotations of text (mentions, URLs, hashtags, etc)
    */
    protected ?array $facets = null;

    #[Ref('app.bsky.feed.post#replyRef')]
    protected ?array $reply = null;

    protected ?array $embed = null;

   /**
    * Indicates human language of post primary text content.
    */
    protected ?array $langs = null;

   /**
    * Self-label values for this post. Effectively content warnings.
    */
    protected ?array $labels = null;

   /**
    * Additional hashtags, in addition to any included in post text and facets.
    */
    protected ?array $tags = null;

   /**
    * Client-declared timestamp when this post was originally created.
    */
    protected string $createdAt;
}