<?php

declare(strict_types=1);

namespace Revolution\AtProto\Lexicon\Contracts\Com\Atproto;

interface Moderation
{
    public const createReport = 'com.atproto.moderation.createReport';

    /**
     * Submit a moderation report regarding an atproto account or record. Implemented by moderation services (with PDS proxying), and requires auth.
     *
     * method: post
     */
    public function createReport(string $reasonType, array $subject, ?string $reason = null);
}
