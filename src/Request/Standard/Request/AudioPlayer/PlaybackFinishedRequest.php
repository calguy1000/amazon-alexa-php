<?php

namespace MaxBeckers\AmazonAlexa\Request\Standard\Request\AudioPlayer;

use MaxBeckers\AmazonAlexa\Request\Standard\Request\AbstractRequest;

/**
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
class PlaybackFinishedRequest extends AudioPlayerRequest
{
    const TYPE = 'AudioPlayer.PlaybackFinished';

    /**
     * @var int|null
     */
    public $offsetInMilliseconds;

    /**
     * {@inheritdoc}
     */
    public static function fromAmazonRequest(array $amazonRequest): AbstractRequest
    {
        $request = new self();

        $request->type                 = self::TYPE;
        $request->offsetInMilliseconds = isset($amazonRequest['offsetInMilliseconds']) ? $amazonRequest['offsetInMilliseconds'] : null;
        $request->setRequestData($amazonRequest);

        return $request;
    }
}
