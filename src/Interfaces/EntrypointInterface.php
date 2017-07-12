<?php

namespace Gdelre\RedmineApiBundle\Interfaces;

use Gdelre\RedmineApiBundle\Entity\Group;
use Gdelre\RedmineApiBundle\Entity\Issue;
use Gdelre\RedmineApiBundle\Entity\IssuePriority;
use Gdelre\RedmineApiBundle\Entity\IssueStatus;
use Gdelre\RedmineApiBundle\Entity\News;
use Gdelre\RedmineApiBundle\Entity\Project;
use Gdelre\RedmineApiBundle\Entity\Query;
use Gdelre\RedmineApiBundle\Entity\Role;
use Gdelre\RedmineApiBundle\Entity\TimeEntry;
use Gdelre\RedmineApiBundle\Entity\TimeEntryActivity;
use Gdelre\RedmineApiBundle\Entity\Tracker;
use Gdelre\RedmineApiBundle\Entity\User;

interface EntrypointInterface
{
    const ENTRYPOINTS = [
        [
            'name'           => 'attachment',
            'path'           => '/attachments/{id}',
            'resource_class' => null,
        ],
        [
            'name'           => 'custom_field',
            'path'           => '/custom_fields',
            'resource_class' => null,
        ],
        [
            'name'           => 'group',
            'path'           => '/groups',
            'resource_class' => Group::class,
        ],
        [
            'name'           => 'issue',
            'path'           => '/issues',
            'resource_class' => Issue::class,
        ],
        [
            'name'           => 'issue_status',
            'path'           => '/issue_statuses',
            'resource_class' => IssueStatus::class,
        ],
        [
            'name'           => 'issue_relation',
            'path'           => '/issues/{id}/relations',
            'resource_class' => null,
        ],
        [
            'name'           => 'issue_priority',
            'path'           => '/enumerations/issue_priorities',
            'resource_class' => IssuePriority::class,
        ],
        [
            'name'           => 'news',
            'path'           => '/news',
            'resource_class' => News::class,
        ],
        [
            'name'           => 'project',
            'path'           => '/projects',
            'resource_class' => Project::class,
        ],
        [
            'name'           => 'project_news',
            'path'           => '/projects/{id}/news',
            'resource_class' => News::class,
        ],
        [
            'name'           => 'project_version',
            'path'           => '/projects/{id}/versions',
            'resource_class' => null,
        ],
        [
            'name'           => 'project_wiki',
            'path'           => '/projects/{id}/wiki/index',
            'resource_class' => null,
        ],
        [
            'name'           => 'project_membership',
            'path'           => '/projects/{id}/memberships',
            'resource_class' => null,
        ],
        [
            'name'           => 'project_issue_category',
            'path'           => '/projects/{id}/issue_categories',
            'resource_class' => null,
        ],
        [
            'name'           => 'query',
            'path'           => '/queries',
            'resource_class' => Query::class,
        ],
        [
            'name'           => 'role',
            'path'           => '/roles',
            'resource_class' => Role::class,
        ],
        [
            'name'           => 'time_entry',
            'path'           => '/time_entries',
            'resource_class' => TimeEntry::class,
        ],
        [
            'name'           => 'time_entry_activity',
            'path'           => '/enumerations/time_entry_activities',
            'resource_class' => TimeEntryActivity::class,
        ],
        [
            'name'           => 'tracker',
            'path'           => '/trackers',
            'resource_class' => Tracker::class,
        ],
        [
            'name'           => 'user',
            'path'           => '/users',
            'resource_class' => User::class,
        ],
    ];
}