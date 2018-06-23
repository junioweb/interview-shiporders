<?php

namespace Infrastructure\Persistence\Doctrine;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityRepository;
use Domain\Model\Shiporder\Item;
use Domain\Model\Shiporder\Shiporder;
use Domain\Model\Shiporder\ShiporderRepositoryInterface;

class ShiporderRepository extends EntityRepository implements ShiporderRepositoryInterface
{

    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return new ArrayCollection($this->findAll());
    }

    /**
     * @param Collection $shiporders
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function saveByCollection(Collection $shiporders): void
    {
        $em = $this->getEntityManager();

        $shiporders->map(function (Shiporder $shiporder) use ($em) {
            $shiporder->getItems()->map(function (Item $item) use ($em, $shiporder) {
                $item->setShiporder($shiporder);
                $em->persist($item);
            });
            $em->persist($shiporder);
        });

        $em->flush();
    }
}