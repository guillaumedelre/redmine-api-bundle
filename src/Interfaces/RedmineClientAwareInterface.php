<?php

namespace Gdelre\RedmineApiBundle\Interfaces;

use GuzzleHttp\Client;

interface RedmineClientAwareInterface
{
    /**
     * @param Client $redmineClient
     *
     * @return self
     */
    public function setRedmineClient(Client $redmineClient);
}