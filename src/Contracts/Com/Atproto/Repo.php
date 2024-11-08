<?php

declare(strict_types=1);

namespace Revolution\AtProto\Lexicon\Contracts\Com\Atproto;

use Revolution\AtProto\Lexicon\Attributes\Get;
use Revolution\AtProto\Lexicon\Attributes\NSID;
use Revolution\AtProto\Lexicon\Attributes\Post;
use Revolution\AtProto\Lexicon\Attributes\Ref;
use Revolution\AtProto\Lexicon\Attributes\Union;

interface Repo
{
    public const applyWrites = 'com.atproto.repo.applyWrites';
    public const createRecord = 'com.atproto.repo.createRecord';
    public const deleteRecord = 'com.atproto.repo.deleteRecord';
    public const describeRepo = 'com.atproto.repo.describeRepo';
    public const getRecord = 'com.atproto.repo.getRecord';
    public const importRepo = 'com.atproto.repo.importRepo';
    public const listMissingBlobs = 'com.atproto.repo.listMissingBlobs';
    public const listRecords = 'com.atproto.repo.listRecords';
    public const putRecord = 'com.atproto.repo.putRecord';
    public const uploadBlob = 'com.atproto.repo.uploadBlob';

    /**
     * Apply a batch transaction of repository creates, updates, and deletes. Requires auth, implemented by PDS.
     *
     * @see https://docs.bsky.app/docs/api/com-atproto-repo-apply-writes
     */
    #[Post, NSID(self::applyWrites)]
    public function applyWrites(string $repo, array $writes, ?bool $validate = null, ?string $swapCommit = null);

    /**
     * Create a single new repository record. Requires auth, implemented by PDS.
     *
     * @see https://docs.bsky.app/docs/api/com-atproto-repo-create-record
     */
    #[Post, NSID(self::createRecord)]
    public function createRecord(string $repo, string $collection, mixed $record, ?string $rkey = null, ?bool $validate = null, ?string $swapCommit = null);

    /**
     * Delete a repository record, or ensure it doesn't exist. Requires auth, implemented by PDS.
     *
     * @see https://docs.bsky.app/docs/api/com-atproto-repo-delete-record
     */
    #[Post, NSID(self::deleteRecord)]
    public function deleteRecord(string $repo, string $collection, string $rkey, ?string $swapRecord = null, ?string $swapCommit = null);

    /**
     * Get information about an account and repository, including the list of collections. Does not require auth.
     *
     * @see https://docs.bsky.app/docs/api/com-atproto-repo-describe-repo
     */
    #[Get, NSID(self::describeRepo)]
    public function describeRepo(string $repo);

    /**
     * Get a single record from a repository. Does not require auth.
     *
     * @see https://docs.bsky.app/docs/api/com-atproto-repo-get-record
     */
    #[Get, NSID(self::getRecord)]
    public function getRecord(string $repo, string $collection, string $rkey, ?string $cid = null);

    /**
     * Import a repo in the form of a CAR file. Requires Content-Length HTTP header to be set.
     *
     * @see https://docs.bsky.app/docs/api/com-atproto-repo-import-repo
     */
    #[Post, NSID(self::importRepo)]
    public function importRepo();

    /**
     * Returns a list of missing blobs for the requesting account. Intended to be used in the account migration flow.
     *
     * @see https://docs.bsky.app/docs/api/com-atproto-repo-list-missing-blobs
     */
    #[Get, NSID(self::listMissingBlobs)]
    public function listMissingBlobs(?int $limit = 500, ?string $cursor = null);

    /**
     * List a range of records in a repository, matching a specific collection. Does not require auth.
     *
     * @see https://docs.bsky.app/docs/api/com-atproto-repo-list-records
     */
    #[Get, NSID(self::listRecords)]
    public function listRecords(string $repo, string $collection, ?int $limit = 50, ?string $cursor = null, ?string $rkeyStart = null, ?string $rkeyEnd = null, ?bool $reverse = null);

    /**
     * Write a repository record, creating or updating it as needed. Requires auth, implemented by PDS.
     *
     * @see https://docs.bsky.app/docs/api/com-atproto-repo-put-record
     */
    #[Post, NSID(self::putRecord)]
    public function putRecord(string $repo, string $collection, string $rkey, mixed $record, ?bool $validate = null, ?string $swapRecord = null, ?string $swapCommit = null);

    /**
     * Upload a new blob, to be referenced from a repository record. The blob will be deleted if it is not referenced within a time window (eg, minutes). Blob restrictions (mimetype, size, etc) are enforced when the reference is created. Requires auth, implemented by PDS.
     *
     * @see https://docs.bsky.app/docs/api/com-atproto-repo-upload-blob
     */
    #[Post, NSID(self::uploadBlob)]
    public function uploadBlob();
}
