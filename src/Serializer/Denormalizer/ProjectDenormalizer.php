<?php

namespace Gdelre\RedmineApiBundle\Serializer\Denormalizer;

use Gdelre\RedmineApiBundle\Entity\Project;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ProjectDenormalizer implements DenormalizerInterface
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
        dump(func_get_args());
        die(__METHOD__);

        /** @var Project $denormalized */
        $denormalized = $this->denormalizer->denormalize($data, $class, $format, $context);

        if ($denormalized instanceof Project) {
            // populate nested
        }

        return $denormalized;
    }

    public function supportsDenormalization($data, $type, $format = null, array $context = [])
    {
        dump(func_get_args());
        return ($type === Project::class);
    }
}
