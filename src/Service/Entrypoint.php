<?php

namespace Gdelre\RedmineApiBundle\Service;

use Gdelre\RedmineApiBundle\Exception\EntrypointConnectException;
use Gdelre\RedmineApiBundle\Exception\EntrypointException;
use Gdelre\RedmineApiBundle\Exception\EntrypointRequestException;
use Gdelre\RedmineApiBundle\Interfaces\RedmineClientAwareInterface;
use Gdelre\RedmineApiBundle\Traits\RedmineClientAwareTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;
use Symfony\Component\Serializer\SerializerInterface;

final class Entrypoint implements LoggerAwareInterface, SerializerAwareInterface, RedmineClientAwareInterface
{
    use LoggerAwareTrait,
        SerializerAwareTrait,
        RedmineClientAwareTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $resourceClass;

    /**
     * @var string
     */
    private $path;

    /**
     * Entrypoint constructor.
     *
     * @param LoggerInterface     $logger
     * @param SerializerInterface $serializer
     * @param Client              $redmineClient
     * @param array               $definition
     */
    public function __construct(
        LoggerInterface $logger,
        SerializerInterface $serializer,
        Client $redmineClient,
        array $definition
    ) {
        $this->logger = $logger;
        $this->serializer = $serializer;
        $this->redmineClient = $redmineClient;
        $this->name = $definition['name'];
        $this->resourceClass = $definition['resource_class'];
        $this->path = $definition['path'];
    }

    /**
     * @param array $options
     *
     * @return null|object
     */
    public function head(array $options = [])
    {
        $this->validateResource();
        // todo handle parameters
        try {
            /** @var ResponseInterface $response */
            dump($this->path, $options, $this->redmineClient->getConfig());
            $response = $this->redmineClient->head($this->path, $options);
            $object = $this->serializer->deserialize(
                $response->getBody()->getContents(),
                $this->resourceClass,
                RequestOptions::JSON
            );

            return $object;
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }
    }

    /**
     * @throws EntrypointException
     */
    private function validateResource()
    {
        if (null === $this->resourceClass && class_exists($this->resourceClass)) {
            $this->logger->error(
                "Resource for {entrypoint} undefined.",
                [
                    'entrypoint' => $this->name,
                ]
            );

            throw new EntrypointException("Resource undefined.");
        }
    }

    /**
     * @param array $options
     *
     * @return null|object
     * @throws EntrypointConnectException
     * @throws EntrypointRequestException
     */
    public function get(array $options = [])
    {
        $this->validateResource();

        // todo handle parameters

        try {
            /** @var ResponseInterface $response */
            $response = $this->redmineClient->get($this->path, $options);
        } catch (ConnectException $e) {
            throw new EntrypointConnectException();
        } catch (RequestException $e) {
            throw new EntrypointRequestException();
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());

            return null;
        }

        try {
            $object = $this->serializer->deserialize(
                $response->getBody()->getContents(),
                $this->resourceClass,
                RequestOptions::JSON
            );

            return $object;
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());

            return null;
        }
    }

    /**
     * @param array $options
     *
     * @return null|object
     */
    public function post(array $options = [])
    {
        $this->validateResource();
        // todo handle parameters
        try {
            /** @var ResponseInterface $response */
            $response = $this->redmineClient->post($this->path, $options);
            $object = $this->serializer->deserialize(
                $response->getBody()->getContents(),
                $this->resourceClass,
                RequestOptions::JSON
            );

            return $object;
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return null;
    }

    /**
     * @param array $options
     *
     * @return null|object
     */
    public function put(array $options = [])
    {
        $this->validateResource();
        // todo handle parameters
        try {
            /** @var ResponseInterface $response */
            $response = $this->redmineClient->put($this->path, $options);
            $object = $this->serializer->deserialize(
                $response->getBody()->getContents(),
                $this->resourceClass,
                RequestOptions::JSON
            );

            return $object;
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return null;
    }

    /**
     * @param array $options
     *
     * @return null|object
     */
    public function patch(array $options = [])
    {
        $this->validateResource();
        // todo handle parameters
        try {
            /** @var ResponseInterface $response */
            $response = $this->redmineClient->patch($this->path, $options);
            $object = $this->serializer->deserialize(
                $response->getBody()->getContents(),
                $this->resourceClass,
                RequestOptions::JSON
            );

            return $object;
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return null;
    }

    /**
     * @param array $options
     *
     * @return null|object
     */
    public function delete(array $options = [])
    {
        $this->validateResource();
        // todo handle parameters
        try {
            /** @var ResponseInterface $response */
            $response = $this->redmineClient->delete($this->path, $options);
            $object = $this->serializer->deserialize(
                $response->getBody()->getContents(),
                $this->resourceClass,
                RequestOptions::JSON
            );

            return $object;
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return null;
    }
}
