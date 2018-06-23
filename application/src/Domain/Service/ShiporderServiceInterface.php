<?php

namespace Domain\Service;

use Doctrine\Common\Collections\Collection;

/**
 * Interface ShiporderServiceInterface
 * @package Domain\Service
 */
interface ShiporderServiceInterface
{
    /**
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * @param Collection $shiporders
     */
    public function insertByCollection(Collection $shiporders): void;
}