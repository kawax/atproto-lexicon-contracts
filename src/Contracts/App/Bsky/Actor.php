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
use Revolution\AtProto\Lexicon\Attributes\Output;
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

    public const getPreferencesResponse = ['preferences' => 'array'];
    public const getProfileResponse = ['did' => 'string', 'handle' => 'string', 'displayName' => 'string', 'description' => 'string', 'avatar' => 'string', 'banner' => 'string', 'followersCount' => 'int', 'followsCount' => 'int', 'postsCount' => 'int', 'associated' => 'mixed', 'joinedViaStarterPack' => ['uri' => 'string', 'cid' => 'string', 'record' => 'mixed', 'creator' => 'array', 'listItemCount' => 'int', 'joinedWeekCount' => 'int', 'joinedAllTimeCount' => 'int', 'labels' => 'array', 'indexedAt' => 'string'], 'indexedAt' => 'string', 'createdAt' => 'string', 'viewer' => 'mixed', 'labels' => [['ver' => 'int', 'src' => 'string', 'uri' => 'string', 'cid' => 'string', 'val' => 'string', 'neg' => 'bool', 'cts' => 'string', 'exp' => 'string', 'sig' => 'mixed']], 'pinnedPost' => ['uri' => 'string', 'cid' => 'string']];
    public const getProfilesResponse = ['profiles' => [['did' => 'string', 'handle' => 'string', 'displayName' => 'string', 'description' => 'string', 'avatar' => 'string', 'banner' => 'string', 'followersCount' => 'int', 'followsCount' => 'int', 'postsCount' => 'int', 'associated' => 'array', 'joinedViaStarterPack' => 'array', 'indexedAt' => 'string', 'createdAt' => 'string', 'viewer' => 'array', 'labels' => 'array', 'pinnedPost' => 'array']]];
    public const getSuggestionsResponse = ['cursor' => 'string', 'actors' => [['did' => 'string', 'handle' => 'string', 'displayName' => 'string', 'description' => 'string', 'avatar' => 'string', 'associated' => 'array', 'indexedAt' => 'string', 'createdAt' => 'string', 'viewer' => 'array', 'labels' => 'array']]];
    public const searchActorsResponse = ['cursor' => 'string', 'actors' => [['did' => 'string', 'handle' => 'string', 'displayName' => 'string', 'description' => 'string', 'avatar' => 'string', 'associated' => 'array', 'indexedAt' => 'string', 'createdAt' => 'string', 'viewer' => 'array', 'labels' => 'array']]];
    public const searchActorsTypeaheadResponse = ['actors' => [['did' => 'string', 'handle' => 'string', 'displayName' => 'string', 'avatar' => 'string', 'associated' => 'array', 'viewer' => 'array', 'labels' => 'array', 'createdAt' => 'string']]];

    /**
     * Get private preferences attached to the current account. Expected use is synchronization between multiple devices, and import/export during account migration. Requires auth.
     *
     * @link https://docs.bsky.app/docs/api/app-bsky-actor-get-preferences
     */
    #[Get, NSID(self::getPreferences)]
    #[Output(self::getPreferencesResponse)]
    public function getPreferences();

    /**
     * Get detailed profile view of an actor. Does not require auth, but contains relevant metadata with auth.
     *
     * @link https://docs.bsky.app/docs/api/app-bsky-actor-get-profile
     */
    #[Get, NSID(self::getProfile)]
    #[Output(self::getProfileResponse)]
    public function getProfile(#[Format('at-identifier')] string $actor);

    /**
     * Get detailed profile views of multiple actors.
     *
     * @link https://docs.bsky.app/docs/api/app-bsky-actor-get-profiles
     */
    #[Get, NSID(self::getProfiles)]
    #[Output(self::getProfilesResponse)]
    public function getProfiles(#[Format('at-identifier')] array $actors);

    /**
     * Get a list of suggested actors. Expected use is discovery of accounts to follow during new account onboarding.
     *
     * @link https://docs.bsky.app/docs/api/app-bsky-actor-get-suggestions
     */
    #[Get, NSID(self::getSuggestions)]
    #[Output(self::getSuggestionsResponse)]
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
    #[Output(self::searchActorsResponse)]
    public function searchActors(#[Deprecated] ?string $term = null, ?string $q = null, ?int $limit = 25, ?string $cursor = null);

    /**
     * Find actor suggestions for a prefix search term. Expected use is for auto-completion during text field entry. Does not require auth.
     *
     * @link https://docs.bsky.app/docs/api/app-bsky-actor-search-actors-typeahead
     */
    #[Get, NSID(self::searchActorsTypeahead)]
    #[Output(self::searchActorsTypeaheadResponse)]
    public function searchActorsTypeahead(#[Deprecated] ?string $term = null, ?string $q = null, ?int $limit = 10);
}
