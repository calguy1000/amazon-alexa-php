<?php

namespace MaxBeckers\AmazonAlexa\Request\Custom\Request\Standard;

use MaxBeckers\AmazonAlexa\Request\Custom\Request\AbstractRequest;
use MaxBeckers\AmazonAlexa\Request\Custom\Request\Error;

/**
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
class SessionEndedRequest extends StandardRequest
{
    const TYPE = 'SessionEndedRequest';

    /**
     * @var string
     */
    public $reason;

    /**
     * @var Error|null
     */
    public $error;

    /**
     * {@inheritdoc}
     */
    public static function fromAmazonRequest(array $amazonRequest): AbstractRequest
    {
        $request = new self();

        $request->type   = self::TYPE;
        $request->reason = isset($amazonRequest['reason']) ? $amazonRequest['reason'] : null;
        $request->error  = isset($amazonRequest['error']) ? Error::fromAmazonRequest($amazonRequest['error']) : null;
        $request->setRequestData($amazonRequest);

        return $request;
    }
}
