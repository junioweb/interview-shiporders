<?php

namespace Domain\Model\Person;
use Doctrine\Common\Collections\Collection;

/**
 * Interface PersonRepositoryInterface
 * @package Domain\Model\Person
 */
interface PersonRepositoryInterface
{
    /**
     * @return Collection
     */
    public function list(): Collection;
}