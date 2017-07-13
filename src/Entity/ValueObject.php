<?php

namespace Gdelre\RedmineApiBundle\Entity;

class ValueObject
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var mixed
     */
    protected $value;

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
     * @return ValueObject
     */
    public function setId(int $id)
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
     * @return ValueObject
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     *
     * @return ValueObject
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param array $data
     *
     * @return ValueObject
     */
    public static function createFromArray(array $data)
    {
        return (new self())
            ->setId($data['@id'])
            ->setName($data['@name'])
            ->setValue($data['#']);
    }
}
