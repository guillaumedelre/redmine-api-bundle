<?php

namespace Gdelre\RedmineApiBundle\Service;

use Gdelre\RedmineApiBundle\Exception\EntrypointException;
use Gdelre\RedmineApiBundle\Exception\EntrypointRequestException;
use Gdelre\RedmineApiBundle\Exception\EntrypointSerializationException;
use Gdelre\RedmineApiBundle\Interfaces\RedmineClientAwareInterface;
use Gdelre\RedmineApiBundle\Traits\RedmineClientAwareTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
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

    const DEFAULT_FORMAT = 'xml';

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
     * @var string
     */
    private $defaultFormat;

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
        $this->defaultFormat = $definition['format'] ?? self::DEFAULT_FORMAT;
        $this->path = "$definition[path]." . $this->defaultFormat;
    }

    /**
     * @param array $options
     *
     * @return object
     * @throws EntrypointRequestException
     */
    public function head(array $options = [])
    {
        $this->validateResource();

        // todo handle parameters

        try {
            /** @var ResponseInterface $response */
            $response = $this->redmineClient->head($this->path, $options);
        } catch (RequestException $e) {
            $this->logger->error($e->getMessage());
            throw new EntrypointRequestException();
        }

        return $this->deserialize($response);
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
     * @param ResponseInterface $response
     * @param string            $format
     *
     * @return object
     * @throws EntrypointSerializationException
     */
    private function deserialize(ResponseInterface $response, string $format = self::DEFAULT_FORMAT)
    {
        try {
            $object = $this->serializer->deserialize(
                $response->getBody()->getContents(),
                $this->resourceClass,
                $format,
                ['data_key' => $this->name]
            );
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            throw new EntrypointSerializationException();
        }

        return $object;
    }

    /**
     * @param string $uri
     * @param array  $options
     * @param string $format
     *
     * @return object
     * @throws EntrypointRequestException
     */
    public function get(string $uri = '', array $options = [], string $format = self::DEFAULT_FORMAT)
    {
        $this->validateResource();

        // todo handle parameters

        try {
            /** @var ResponseInterface $response */
            $response = $this->redmineClient->get($this->path . $uri, $options);
        } catch (RequestException $e) {
            throw new EntrypointRequestException('Redmine request error', 0, $e);
        }

        return $this->deserialize($response, $format);
    }

    /**
     * @param array $options
     *
     * @return object
     * @throws EntrypointRequestException
     */
    public function post(array $options = [])
    {
        $this->validateResource();

        // todo handle parameters

        try {
            /** @var ResponseInterface $response */
            $response = $this->redmineClient->post($this->path, $options);
        } catch (RequestException $e) {
            $this->logger->error($e->getMessage());
            throw new EntrypointRequestException();
        }

        return $this->deserialize($response);
    }

    /**
     * @param array $options
     *
     * @return object
     * @throws EntrypointRequestException
     */
    public function put(array $options = [])
    {
        $this->validateResource();

        // todo handle parameters

        try {
            /** @var ResponseInterface $response */
            $response = $this->redmineClient->put($this->path, $options);
        } catch (RequestException $e) {
            $this->logger->error($e->getMessage());
            throw new EntrypointRequestException();
        }

        return $this->deserialize($response);
    }

    /**
     * @param array $options
     *
     * @return object
     * @throws EntrypointRequestException
     */
    public function patch(array $options = [])
    {
        $this->validateResource();

        // todo handle parameters

        try {
            /** @var ResponseInterface $response */
            $response = $this->redmineClient->patch($this->path, $options);
        } catch (RequestException $e) {
            $this->logger->error($e->getMessage());
            throw new EntrypointRequestException();
        }

        return $this->deserialize($response);
    }

    /**
     * @param array $options
     *
     * @return object
     * @throws EntrypointRequestException
     */
    public function delete(array $options = [])
    {
        $this->validateResource();

        // todo handle parameters

        try {
            /** @var ResponseInterface $response */
            $response = $this->redmineClient->delete($this->path, $options);
        } catch (RequestException $e) {
            $this->logger->error($e->getMessage());
            throw new EntrypointRequestException();
        }

        return $this->deserialize($response);
    }
}
