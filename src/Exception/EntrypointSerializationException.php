<?php

namespace Gdelre\RedmineApiBundle\Exception;

class EntrypointConnectException extends EntrypointException
{
    protected $message = 'Redmine connection error.';
}