<?php

namespace Gdelre\RedmineApiBundle\Entity;

class Project
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $identifier = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var int
     */
    protected $status;

    /**
     * @var \DateTime
     */
    protected $createdOn;

    /**
     * @var \DateTime
     */
    protected $updatedOn;

    /**
     * @var bool
     */
    protected $isPublic = false;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Project
     */
    public function setId(int $id): Project
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Project
     */
    public function setName(string $name): Project
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     *
     * @return Project
     */
    public function setIdentifier(string $identifier): Project
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Project
     */
    public function setDescription(string $description): Project
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     *
     * @return Project
     */
    public function setStatus(int $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedOn(): \DateTime
    {
        return $this->createdOn;
    }

    /**
     * @param \DateTime $createdOn
     *
     * @return Project
     */
    public function setCreatedOn(\DateTime $createdOn): Project
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedOn(): \DateTime
    {
        return $this->updatedOn;
    }

    /**
     * @param \DateTime $updatedOn
     *
     * @return Project
     */
    public function setUpdatedOn(\DateTime $updatedOn): Project
    {
        $this->updatedOn = $updatedOn;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPublic(): bool
    {
        return $this->isPublic;
    }

    /**
     * @param bool $isPublic
     *
     * @return Project
     */
    public function setIsPublic(bool $isPublic): Project
    {
        $this->isPublic = $isPublic;

        return $this;
    }
}
