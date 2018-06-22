<?php

namespace Infrastructure\Persistence\Doctrine;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityRepository;
use Domain\Model\Person\PersonRepositoryInterface;

class PersonRepository extends EntityRepository implements PersonRepositoryInterface
{
    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return new ArrayCollection($this->findAll());
    }
}