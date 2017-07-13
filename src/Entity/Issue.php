<?php

namespace Gdelre\RedmineApiBundle\Entity;

class Issue
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var ValueObject|null
     */
    protected $project;

    /**
     * @var ValueObject|null
     */
    protected $tracker;

    /**
     * @var ValueObject|null
     */
    protected $status;

    /**
     * @var ValueObject|null
     */
    protected $priority;

    /**
     * @var ValueObject|null
     */
    protected $author;

    /**
     * @var ValueObject|null
     */
    protected $assignedTo;

    /**
     * @var string
     */
    protected $subject = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var \DateTime|null
     */
    protected $startDate;

    /**
     * @var \DateTime|null
     */
    protected $dueDate;

    /**
     * @var int
     */
    protected $doneRatio = 0;

    /**
     * @var bool
     */
    protected $isPrivate = false;

    /**
     * @var float
     */
    protected $estimatedHours = 0;

    /**
     * @var array
     */
    protected $customFields = [];

    /**
     * @var \DateTime
     */
    protected $createdOn;

    /**
     * @var \DateTime
     */
    protected $updatedOn;

    /**
     * @var \DateTime|null
     */
    protected $closedOn;

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
     * @return Issue
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return ValueObject|null
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param ValueObject|null $project
     *
     * @return Issue
     */
    public function setProject(ValueObject $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * @return ValueObject|null
     */
    public function getTracker()
    {
        return $this->tracker;
    }

    /**
     * @param ValueObject $tracker
     *
     * @return Issue|null
     */
    public function setTracker(ValueObject $tracker = null)
    {
        $this->tracker = $tracker;

        return $this;
    }

    /**
     * @return ValueObject|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param ValueObject|null $status
     *
     * @return Issue
     */
    public function setStatus(ValueObject $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return ValueObject|null
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param ValueObject|null $priority
     *
     * @return Issue
     */
    public function setPriority(ValueObject $priority = null)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return ValueObject|null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param ValueObject|null $author
     *
     * @return Issue
     */
    public function setAuthor(ValueObject $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return ValueObject|null
     */
    public function getAssignedTo()
    {
        return $this->assignedTo;
    }

    /**
     * @param ValueObject|null $assignedTo
     *
     * @return Issue
     */
    public function setAssignedTo(ValueObject $assignedTo = null)
    {
        $this->assignedTo = $assignedTo;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     *
     * @return Issue
     */
    public function setSubject(string $subject)
    {
        $this->subject = $subject;

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
     * @return Issue
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime|null $startDate
     *
     * @return Issue
     */
    public function setStartDate(\DateTime $startDate = null)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param \DateTime|null $dueDate
     *
     * @return Issue
     */
    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getDoneRatio(): int
    {
        return $this->doneRatio;
    }

    /**
     * @param int $doneRatio
     *
     * @return Issue
     */
    public function setDoneRatio(int $doneRatio)
    {
        $this->doneRatio = $doneRatio;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPrivate(): bool
    {
        return $this->isPrivate;
    }

    /**
     * @param bool $isPrivate
     *
     * @return Issue
     */
    public function setIsPrivate(bool $isPrivate)
    {
        $this->isPrivate = $isPrivate;

        return $this;
    }

    /**
     * @return float
     */
    public function getEstimatedHours(): float
    {
        return $this->estimatedHours;
    }

    /**
     * @param float $estimatedHours
     *
     * @return Issue
     */
    public function setEstimatedHours(float $estimatedHours)
    {
        $this->estimatedHours = $estimatedHours;

        return $this;
    }

    /**
     * @return ValueObject[]
     */
    public function getCustomFields(): array
    {
        return $this->customFields;
    }

    /**
     * @param array $customFields
     *
     * @return Issue
     */
    public function setCustomFields(array $customFields)
    {
        $this->customFields = [];

        foreach ($customFields as $customField) {
            $this->customFields[] = (new ValueObject())
                ->setId($customField['@id'])
                ->setName($customField['@name'])
                ->setValue($customField['value']);
        }

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
     * @return Issue
     */
    public function setCreatedOn(\DateTime $createdOn)
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
     * @return Issue
     */
    public function setUpdatedOn(\DateTime $updatedOn)
    {
        $this->updatedOn = $updatedOn;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getClosedOn()
    {
        return $this->closedOn;
    }

    /**
     * @param \DateTime|null $closedOn
     *
     * @return Issue
     */
    public function setClosedOn(\DateTime $closedOn = null)
    {
        $this->closedOn = $closedOn;

        return $this;
    }
}
