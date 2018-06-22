<?php

namespace Domain\Service;

use Doctrine\Common\Collections\Collection;

interface PersonServiceInterface
{
    public function findAll(): Collection;
}