<?php

namespace Gdelre\RedmineApiBundle\Entity;

class TimeEntry
{
    /**
     * @var int
     */
    protected $issueId;

    /**
     * @var int
     */
    protected $projectId;

    /**
     * @var \DateTime
     */
    protected $spentOn;

    /**
     * @var int
     */
    protected $hours;

    /**
     * @var int
     */
    protected $activityId;

    /**
     * @var string
     */
    protected $comments;

    /**
     * @return int
     */
    public function getIssueId(): int
    {
        return $this->issueId;
    }

    /**
     * @param int $issueId
     *
     * @return TimeEntry
     */
    public function setIssueId(int $issueId)
    {
        $this->issueId = $issueId;

        return $this;
    }

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     *
     * @return TimeEntry
     */
    public function setProjectId(int $projectId)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getSpentOn(): \DateTime
    {
        return $this->spentOn;
    }

    /**
     * @param \DateTime $spentOn
     *
     * @return TimeEntry
     */
    public function setSpentOn(\DateTime $spentOn)
    {
        $this->spentOn = $spentOn;

        return $this;
    }

    /**
     * @return int
     */
    public function getHours(): int
    {
        return $this->hours;
    }

    /**
     * @param int $hours
     *
     * @return TimeEntry
     */
    public function setHours(int $hours)
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * @return int
     */
    public function getActivityId(): int
    {
        return $this->activityId;
    }

    /**
     * @param int $activityId
     *
     * @return TimeEntry
     */
    public function setActivityId(int $activityId)
    {
        $this->activityId = $activityId;

        return $this;
    }

    /**
     * @return string
     */
    public function getComments(): string
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     *
     * @return TimeEntry
     */
    public function setComments(string $comments)
    {
        $this->comments = $comments;

        return $this;
    }
}