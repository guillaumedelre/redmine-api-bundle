<?php

namespace Gdelre\RedmineApiBundle\Serializer\Denormalizer;

use Gdelre\RedmineApiBundle\Entity\Issue;
use Gdelre\RedmineApiBundle\Entity\ValueObject;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class IssueDenormalizer implements DenormalizerInterface
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
        return (new Issue())
            ->setId($data['id'])
            ->setProject(
                isset($data['project'])
                    ? ValueObject::createFromArray($data['project']) : null)
            ->setTracker(
                isset($data['tracker'])
                    ? ValueObject::createFromArray($data['tracker']) : null)
            ->setStatus(
                isset($data['status'])
                    ? ValueObject::createFromArray($data['status']) : null)
            ->setPriority(
                isset($data['priority'])
                    ? ValueObject::createFromArray($data['priority']) : null)
            ->setAuthor(
                isset($data['author'])
                    ? ValueObject::createFromArray($data['author']) : null)
            ->setAssignedTo(
                isset($data['assigned_to'])
                    ? ValueObject::createFromArray($data['assigned_to']) : null
            )
            ->setSubject($data['subject'])
            ->setDescription($data['description'])
            ->setDoneRatio($data['done_ratio'] ?? 0)
            ->setIsPrivate("true" === $data['is_private'])
            ->setEstimatedHours(
                isset($data['estimated_hours'])
                    ? floatval($data['estimated_hours']) : 0)
            ->setCustomFields($data['custom_fields']['custom_field'] ?? [])
            ->setCreatedOn(
                isset($data['created_on'])
                    ? \DateTime::createFromFormat(DATE_ISO8601, $data['created_on']) : null)
            ->setUpdatedOn(
                isset($data['updated_on'])
                    ? \DateTime::createFromFormat(DATE_ISO8601, $data['updated_on']) : null)
            ->setClosedOn(
                isset($data['closed_on']) && !empty($data['closed_on'])
                    ? \DateTime::createFromFormat(DATE_ISO8601, $data['closed_on']) : null);
    }

    public function supportsDenormalization($data, $type, $format = null, array $context = [])
    {
        return $type === Issue::class;
    }
}
