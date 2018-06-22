<?php

namespace AppBundle\Service;

use Doctrine\Common\Collections\Collection;
use Domain\Model\Person\PersonRepositoryInterface;
use Domain\Service\PersonServiceInterface;

class PersonService implements PersonServiceInterface
{
    /**
     * @var PersonRepositoryInterface
     */
    private $personRepository;

    /**
     * PersonService constructor.
     * @param PersonRepositoryInterface $personRepository
     */
    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function findAll(): Collection
    {
        return $this->personRepository->list();
    }
}