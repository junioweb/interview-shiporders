<?php

namespace Domain\Model\Person;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Phone
 * @package Domain\Model\Person
 * @ORM\Table("phones")
 * @ORM\Entity
 */
class Phone
{
    /**
     * @var Person
     *
     * @Serializer\Type("Person")
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumn(name="personid", referencedColumnName="personid")
     */
    protected $person;

    /**
     * @var integer
     *
     * @Serializer\Type("integer")
     * @ORM\Column(name="phone", type="integer")
     */
    protected $phone;

    /**
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param int $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

}