<?php

namespace Gdelre\RedmineApiBundle\Serializer\Denormalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ResponseDenormalizer implements DenormalizerInterface
{
    /**
     * @var DenormalizerInterface
     */
    protected $denormalizer;

    /**
     * @param DenormalizerInterface $denormalizer
     *
     * @return static
     */
    public function setDenormalizer(DenormalizerInterface $denormalizer)
    {
        $this->denormalizer = $denormalizer;

        return $this;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return $this->denormalizer->denormalize(
            $data[$context['data_key']],
            'array' === $data['@type'] ? $class . '[]' : $class,
            $format,
            $context
        );
    }

    public function supportsDenormalization($data, $type, $format = null, array $context = [])
    {
        return isset($context['data_key'])
            && isset($data['@total_count'])
            && isset($data['@offset'])
            && isset($data['@limit'])
            && isset($data['@type']);
    }
}
