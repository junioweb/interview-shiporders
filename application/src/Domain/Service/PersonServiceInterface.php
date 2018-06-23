<?php

namespace Domain\Service;

use Doctrine\Common\Collections\Collection;

/**
 * Interface PersonServiceInterface
 * @package Domain\Service
 */
interface PersonServiceInterface
{
    /**
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * @param Collection $people
     */
    public function insertByCollection(Collection $people): void;
}