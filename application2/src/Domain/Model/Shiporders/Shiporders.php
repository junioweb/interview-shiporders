<?php

namespace Domain\Model\Shiporders;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class representing the Shiporders model.
 *
 * @package Domain\Model\Shiporders
 */
class Shiporders 
{
    /**
     * @var Collection
     */
    private $shiporder;

    /**
     * Shiporders constructor.
     * @param Collection|null $shiporder
     */
    public function __construct(Collection $shiporder = null)
    {
        $this->shiporder = $shiporder ?? new ArrayCollection();
    }
}


