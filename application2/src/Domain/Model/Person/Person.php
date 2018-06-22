<?php

namespace Domain\Model\Person;

use Doctrine\Common\Collections\Collection;

/**
 * Class representing the Person model.
 *
 * @package Domain\Model\Person
 */
class Person 
{
    /**
     * @var int
     */
    protected $personid;

    /**
     * @var string
     */
    protected $personname;

    /**
     * @var Collection
     */
    protected $phones;

    /**
     * Person constructor.
     * @param int $personid
     * @param string $personname
     * @param Collection $phones
     */
    public function __construct(int $personid, string $personname, Collection $phones)
    {
        $this->personid = $personid;
        $this->personname = $personname;
        $this->phones = $phones;
    }

    /**
     * @return int
     */
    public function getPersonid(): int
    {
        return $this->personid;
    }

    /**
     * @param int $personid
     */
    public function setPersonid(int $personid)
    {
        $this->personid = $personid;
    }

    /**
     * @return string
     */
    public function getPersonname(): string
    {
        return $this->personname;
    }

    /**
     * @param string $personname
     */
    public function setPersonname(string $personname)
    {
        $this->personname = $personname;
    }

    /**
     * @return Collection
     */
    public function getPhones(): Collection
    {
        return $this->phones;
    }

    /**
     * @param Collection $phones
     */
    public function setPhones(Collection $phones)
    {
        $this->phones = $phones;
    }

}


