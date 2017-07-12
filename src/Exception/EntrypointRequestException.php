<?php

namespace Gdelre\RedmineApiBundle\Exception;

class EntrypointRequestException extends EntrypointException
{
    protected $message = 'Redmine request error';
}