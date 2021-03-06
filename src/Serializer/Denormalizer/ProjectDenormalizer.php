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
        return (new Project())
            ->setId($data['id'])
            ->setName($data['name'])
            ->setIdentifier($data['identifier'])
            ->setDescription($data['description'])
            ->setStatus($data['status'])
            ->setIsPublic($data['is_public'])
            ->setCreatedOn(\DateTime::createFromFormat(DATE_ISO8601, $data['created_on']))
            ->setUpdatedOn(\DateTime::createFromFormat(DATE_ISO8601, $data['updated_on']));
    }

    public function supportsDenormalization($data, $type, $format = null, array $context = [])
    {
        return $type === Project::class;
    }
}
