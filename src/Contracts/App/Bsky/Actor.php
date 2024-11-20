<?php
/**
 * GENERATED CODE.
 */

declare(strict_types=1);

namespace Revolution\AtProto\Lexicon\Contracts\App\Bsky;

use Revolution\AtProto\Lexicon\Attributes\Deprecated;
use Revolution\AtProto\Lexicon\Attributes\Format;
use Revolution\AtProto\Lexicon\Attributes\Get;
use Revolution\AtProto\Lexicon\Attributes\NSID;
use Revolution\AtProto\Lexicon\Attributes\Post;
use Revolution\AtProto\Lexicon\Attributes\Ref;

interface Actor
{
    public const getPreferences = 'app.bsky.actor.getPreferences';
    public const getProfile = 'app.bsky.actor.getProfile';
    public const getProfiles = 'app.bsky.actor.getProfiles';
    public const getSuggestions = 'app.bsky.actor.getSuggestions';
    public const putPreferences = 'app.bsky.actor.putPreferences';
    public const searchActors = 'app.bsky.actor.searchActors';
    public const searchActorsTypeahead = 'app.bsky.actor.searchActorsTypeahead';

    /**
     * Get private preferences attached to the current account. Expected use is synchronization between multiple devices, and import/export during account migration. Requires auth.
     *
     * @link https://docs.bsky.app/docs/api/app-bsky-actor-get-preferences
     */
    #[Get, NSID(self::getPreferences)]
    public function getPreferences();

    /**
     * Get detailed profile view of an actor. Does not require auth, but contains relevant metadata with auth.
     *
     * @link https://docs.bsky.app/docs/api/app-bsky-actor-get-profile
     */
    #[Get, NSID(self::getProfile)]
    public function getProfile(#[Format('at-identifier')] string $actor);

    /**
     * Get detailed profile views of multiple actors.
     *
     * @link https://docs.bsky.app/docs/api/app-bsky-actor-get-profiles
     */
    #[Get, NSID(self::getProfiles)]
    public function getProfiles(#[Format('at-identifier')] array $actors);

    /**
     * Get a list of suggested actors. Expected use is discovery of accounts to follow during new account onboarding.
     *
     * @link https://docs.bsky.app/docs/api/app-bsky-actor-get-suggestions
     */
    #[Get, NSID(self::getSuggestions)]
    public function getSuggestions(?int $limit = 50, ?string $cursor = null);

    /**
     * Set the private preferences attached to the account.
     *
     * @link https://docs.bsky.app/docs/api/app-bsky-actor-put-preferences
     */
    #[Post, NSID(self::putPreferences)]
    public function putPreferences(#[Ref('app.bsky.actor.defs#preferences')] array $preferences);

    /**
     * Find actors (profiles) matching search criteria. Does not require auth.
     *
     * @link https://docs.bsky.app/docs/api/app-bsky-actor-search-actors
     */
    #[Get, NSID(self::searchActors)]
    public function searchActors(#[Deprecated] ?string $term = null, ?string $q = null, ?int $limit = 25, ?string $cursor = null);

    /**
     * Find actor suggestions for a prefix search term. Expected use is for auto-completion during text field entry. Does not require auth.
     *
     * @link https://docs.bsky.app/docs/api/app-bsky-actor-search-actors-typeahead
     */
    #[Get, NSID(self::searchActorsTypeahead)]
    public function searchActorsTypeahead(#[Deprecated] ?string $term = null, ?string $q = null, ?int $limit = 10);
}
