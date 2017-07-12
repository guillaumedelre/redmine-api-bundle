<?php

namespace Gdelre\RedmineApiBundle\Entity;

class Issue
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $project;

    /**
     * @var int
     */
    protected $tracker;

    /**
     * @var int
     */
    protected $status;

    /**
     * @var int
     */
    protected $priority;

    /**
     * @var int
     */
    protected $author;

    /**
     * @var int
     */
    protected $category;

    /**
     * @var string
     */
    protected $subject = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @var \DateTime
     */
    protected $dueDate;

    /**
     * @var int
     */
    protected $doneRatio = 0;

    /**
     * @var int
     */
    protected $estimatedHours;

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
    public function setId(int $id): Issue
{
    $this->id = $id;

    return $this;
}

    /**
     * @return int
     */
    public function getProject(): int
{
    return $this->project;
}

    /**
     * @param int $project
     *
     * @return Issue
     */
    public function setProject(int $project): Issue
{
    $this->project = $project;

    return $this;
}

    /**
     * @return int
     */
    public function getTracker(): int
{
    return $this->tracker;
}

    /**
     * @param int $tracker
     *
     * @return Issue
     */
    public function setTracker(int $tracker): Issue
{
    $this->tracker = $tracker;

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
     * @return Issue
     */
    public function setStatus(int $status): Issue
{
    $this->status = $status;

    return $this;
}

    /**
     * @return int
     */
    public function getPriority(): int
{
    return $this->priority;
}

    /**
     * @param int $priority
     *
     * @return Issue
     */
    public function setPriority(int $priority): Issue
{
    $this->priority = $priority;

    return $this;
}

    /**
     * @return int
     */
    public function getAuthor(): int
{
    return $this->author;
}

    /**
     * @param int $author
     *
     * @return Issue
     */
    public function setAuthor(int $author): Issue
{
    $this->author = $author;

    return $this;
}

    /**
     * @return int
     */
    public function getCategory(): int
{
    return $this->category;
}

    /**
     * @param int $category
     *
     * @return Issue
     */
    public function setCategory(int $category): Issue
{
    $this->category = $category;

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
    public function setSubject(string $subject): Issue
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
    public function setDescription(string $description): Issue
{
    $this->description = $description;

    return $this;
}

    /**
     * @return \DateTime
     */
    public function getStartDate(): \DateTime
{
    return $this->startDate;
}

    /**
     * @param \DateTime $startDate
     *
     * @return Issue
     */
    public function setStartDate(\DateTime $startDate): Issue
{
    $this->startDate = $startDate;

    return $this;
}

    /**
     * @return \DateTime
     */
    public function getDueDate(): \DateTime
{
    return $this->dueDate;
}

    /**
     * @param \DateTime $dueDate
     *
     * @return Issue
     */
    public function setDueDate(\DateTime $dueDate): Issue
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
    public function setDoneRatio(int $doneRatio): Issue
{
    $this->doneRatio = $doneRatio;

    return $this;
}

    /**
     * @return int
     */
    public function getEstimatedHours(): int
{
    return $this->estimatedHours;
}

    /**
     * @param int $estimatedHours
     *
     * @return Issue
     */
    public function setEstimatedHours(int $estimatedHours): Issue
{
    $this->estimatedHours = $estimatedHours;

    return $this;
}

    /**
     * @return array
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
    public function setCustomFields(array $customFields): Issue
{
    $this->customFields = $customFields;

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
    public function setUpdatedOn(\DateTime $updatedOn): Issue
{
    $this->updatedOn = $updatedOn;

    return $this;
}
}