<?php

namespace Infrastructure\Persistence\Doctrine;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityRepository;
use Domain\Model\Person\Person;
use Domain\Model\Person\PersonRepositoryInterface;
use Domain\Model\Person\Phone;

/**
 * Class PersonRepository
 * @package Infrastructure\Persistence\Doctrine
 */
class PersonRepository extends EntityRepository implements PersonRepositoryInterface
{
    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return new ArrayCollection($this->findAll());
    }

    /**
     * @param int $id
     * @return null|object
     */
    public function getById(int $id)
    {
        return $this->find($id);
    }

    /**
     * @param Collection $people
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function saveByCollection(Collection $people): void
    {
        $em = $this->getEntityManager();

        $people->map(function (Person $person) use ($em) {
            $person->getPhones()->map(function (Phone $phone) use ($em, $person) {
                $phone->setPerson($person);
                $em->persist($phone);
            });
            $em->persist($person);
        });

        $em->flush();
    }
}