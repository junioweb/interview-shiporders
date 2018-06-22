<?php

namespace Domain\Model\Person;

use Doctrine\Common\Collections\Collection;

interface PersonRepositoryInterface
{
    public function list(): Collection;
}