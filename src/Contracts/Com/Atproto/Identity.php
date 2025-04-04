<?php

/**
 * GENERATED CODE.
 */

declare(strict_types=1);

namespace Revolution\AtProto\Lexicon\Contracts\Com\Atproto;

use Revolution\AtProto\Lexicon\Attributes\Format;
use Revolution\AtProto\Lexicon\Attributes\Get;
use Revolution\AtProto\Lexicon\Attributes\NSID;
use Revolution\AtProto\Lexicon\Attributes\Output;
use Revolution\AtProto\Lexicon\Attributes\Post;

interface Identity
{
    public const getRecommendedDidCredentials = 'com.atproto.identity.getRecommendedDidCredentials';
    public const refreshIdentity = 'com.atproto.identity.refreshIdentity';
    public const requestPlcOperationSignature = 'com.atproto.identity.requestPlcOperationSignature';
    public const resolveDid = 'com.atproto.identity.resolveDid';
    public const resolveHandle = 'com.atproto.identity.resolveHandle';
    public const resolveIdentity = 'com.atproto.identity.resolveIdentity';
    public const signPlcOperation = 'com.atproto.identity.signPlcOperation';
    public const submitPlcOperation = 'com.atproto.identity.submitPlcOperation';
    public const updateHandle = 'com.atproto.identity.updateHandle';

    public const getRecommendedDidCredentialsResponse = ['rotationKeys' => 'array', 'alsoKnownAs' => 'array', 'verificationMethods' => 'mixed', 'services' => 'mixed'];
    public const refreshIdentityResponse = ['did' => 'string', 'handle' => 'string', 'didDoc' => 'mixed'];
    public const resolveDidResponse = ['didDoc' => 'mixed'];
    public const resolveHandleResponse = ['did' => 'string'];
    public const resolveIdentityResponse = ['did' => 'string', 'handle' => 'string', 'didDoc' => 'mixed'];
    public const signPlcOperationResponse = ['operation' => 'mixed'];

    /**
     * Describe the credentials that should be included in the DID doc of an account that is migrating to this service.
     *
     * @link https://docs.bsky.app/docs/api/com-atproto-identity-get-recommended-did-credentials
     */
    #[Get, NSID(self::getRecommendedDidCredentials)]
    #[Output(self::getRecommendedDidCredentialsResponse)]
    public function getRecommendedDidCredentials();

    /**
     * Request that the server re-resolve an identity (DID and handle). The server may ignore this request, or require authentication, depending on the role, implementation, and policy of the server.
     *
     * @link https://docs.bsky.app/docs/api/com-atproto-identity-refresh-identity
     */
    #[Post, NSID(self::refreshIdentity)]
    #[Output(self::refreshIdentityResponse)]
    public function refreshIdentity(#[Format('at-identifier')] string $identifier);

    /**
     * Request an email with a code to in order to request a signed PLC operation. Requires Auth.
     *
     * @link https://docs.bsky.app/docs/api/com-atproto-identity-request-plc-operation-signature
     */
    #[Post, NSID(self::requestPlcOperationSignature)]
    public function requestPlcOperationSignature();

    /**
     * Resolves DID to DID document. Does not bi-directionally verify handle.
     *
     * @link https://docs.bsky.app/docs/api/com-atproto-identity-resolve-did
     */
    #[Get, NSID(self::resolveDid)]
    #[Output(self::resolveDidResponse)]
    public function resolveDid(#[Format('did')] string $did);

    /**
     * Resolves an atproto handle (hostname) to a DID. Does not necessarily bi-directionally verify against the the DID document.
     *
     * @link https://docs.bsky.app/docs/api/com-atproto-identity-resolve-handle
     */
    #[Get, NSID(self::resolveHandle)]
    #[Output(self::resolveHandleResponse)]
    public function resolveHandle(#[Format('handle')] string $handle);

    /**
     * Resolves an identity (DID or Handle) to a full identity (DID document and verified handle).
     *
     * @link https://docs.bsky.app/docs/api/com-atproto-identity-resolve-identity
     */
    #[Get, NSID(self::resolveIdentity)]
    #[Output(self::resolveIdentityResponse)]
    public function resolveIdentity(#[Format('at-identifier')] string $identifier);

    /**
     * Signs a PLC operation to update some value(s) in the requesting DID's document.
     *
     * @link https://docs.bsky.app/docs/api/com-atproto-identity-sign-plc-operation
     */
    #[Post, NSID(self::signPlcOperation)]
    #[Output(self::signPlcOperationResponse)]
    public function signPlcOperation(?string $token = null, ?array $rotationKeys = null, ?array $alsoKnownAs = null, mixed $verificationMethods = null, mixed $services = null);

    /**
     * Validates a PLC operation to ensure that it doesn't violate a service's constraints or get the identity into a bad state, then submits it to the PLC registry.
     *
     * @link https://docs.bsky.app/docs/api/com-atproto-identity-submit-plc-operation
     */
    #[Post, NSID(self::submitPlcOperation)]
    public function submitPlcOperation(mixed $operation);

    /**
     * Updates the current account's handle. Verifies handle validity, and updates did:plc document if necessary. Implemented by PDS, and requires auth.
     *
     * @link https://docs.bsky.app/docs/api/com-atproto-identity-update-handle
     */
    #[Post, NSID(self::updateHandle)]
    public function updateHandle(#[Format('handle')] string $handle);
}
