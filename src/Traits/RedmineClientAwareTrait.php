<?php

namespace Gdelre\RedmineApiBundle\Traits;

use GuzzleHttp\Client;

trait RedmineClientAwareTrait
{
    /**
     * @var Client
     */
    protected $redmineClient;

    /**
     * @return Client
     */
    public function getRedmineClient(): Client
    {
        return $this->redmineClient;
    }

    /**
     * @param Client $redmineClient
     *
     * @return self
     */
    public function setRedmineClient(Client $redmineClient)
    {
        $this->redmineClient = $redmineClient;

        return $this;
    }
}