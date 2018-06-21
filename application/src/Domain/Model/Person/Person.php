<?php

namespace Domain\Model\Person;

use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class representing the Person model.
 *
 * @package Domain\Model\Person
 */
class Person 
{
    /**
     * @var int
     * @SerializedName("personid")
     * @Assert\Type("int")
     * @Type("int")
     */
    protected $personid;

    /**
     * @var string
     * @SerializedName("personname")
     * @Assert\Type("string")
     * @Type("string")
     */
    protected $personname;

    /**
     * @var int[]
     * @SerializedName("phones")
     * @Assert\All({
     *   @Assert\Type("int")
     * })
     * @Type("array<int>")
     */
    protected $phones;

    /**
     * Person constructor.
     * @param int $personid
     * @param string $personname
     * @param int[] $phones
     */
    public function __construct(int $personid, string $personname, array $phones)
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
    public function setPersonid(int $personid): void
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
    public function setPersonname(string $personname): void
    {
        $this->personname = $personname;
    }

    /**
     * @return int[]
     */
    public function getPhones(): array
    {
        return $this->phones;
    }

    /**
     * @param int[] $phones
     */
    public function setPhones(array $phones): void
    {
        $this->phones = $phones;
    }

}


