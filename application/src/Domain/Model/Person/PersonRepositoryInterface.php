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

    /**
     * @param int $id
     * @return null|object
     */
    public function getById(int $id);

    /**
     * @param Collection $people
     */
    public function saveByCollection(Collection $people): void;
}