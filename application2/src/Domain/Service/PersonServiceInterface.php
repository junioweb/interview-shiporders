<?php

namespace Domain\Service;

use Doctrine\Common\Collections\Collection;

interface PersonServiceInterface
{
    /**
     * @return Collection
     */
    public function list(): Collection;
}