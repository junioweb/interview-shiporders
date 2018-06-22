<?php

namespace Domain\Model\People;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class representing the People model.
 *
 * @package Domain\Model\People
 */
class People 
{
    /**
     * @var Collection
     */
    private $person;

    /**
     * People constructor.
     * @param Collection|null $person
     */
    public function __construct(Collection $person = null)
    {
        $this->person = $person ?? new ArrayCollection();
    }
}


