<?php

namespace Domain\Model\Shiporder;

use Doctrine\Common\Collections\Collection;

/**
 * Interface ShiporderRepositoryInterface
 * @package Domain\Model\Shiporder
 */
interface ShiporderRepositoryInterface
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
     * @param Collection $shiporders
     */
    public function saveByCollection(Collection $shiporders): void;
}