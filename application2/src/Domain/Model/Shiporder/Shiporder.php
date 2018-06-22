<?php

namespace Domain\Model\Shiporder;

use Doctrine\Common\Collections\Collection;
use Domain\Model\Person\Person;
use Domain\Model\Shipto\Shipto;

/**
 * Class representing the Shiporder model.
 *
 * @package Domain\Model\Shiporder
 */
class Shiporder 
{
    /**
     * @var int
     */
    protected $orderid;

    /**
     * @var Person
     */
    protected $orderperson;

    /**
     * @var Shipto
     */
    protected $shipto;

    /**
     * @var Collection
     */
    protected $items;

    /**
     * Shiporder constructor.
     * @param int $orderid
     * @param Person $orderperson
     * @param Shipto $shipto
     * @param Collection $items
     */
    public function __construct(int $orderid, Person $orderperson, Shipto $shipto, Collection $items)
    {
        $this->orderid = $orderid;
        $this->orderperson = $orderperson;
        $this->shipto = $shipto;
        $this->items = $items;
    }

    /**
     * @return int
     */
    public function getOrderid(): int
    {
        return $this->orderid;
    }

    /**
     * @param int $orderid
     */
    public function setOrderid(int $orderid)
    {
        $this->orderid = $orderid;
    }

    /**
     * @return Person
     */
    public function getOrderperson(): Person
    {
        return $this->orderperson;
    }

    /**
     * @param Person $orderperson
     */
    public function setOrderperson(Person $orderperson)
    {
        $this->orderperson = $orderperson;
    }

    /**
     * @return Shipto
     */
    public function getShipto(): Shipto
    {
        return $this->shipto;
    }

    /**
     * @param Shipto $shipto
     */
    public function setShipto(Shipto $shipto)
    {
        $this->shipto = $shipto;
    }

    /**
     * @return Collection
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    /**
     * @param Collection $items
     */
    public function setItems(Collection $items)
    {
        $this->items = $items;
    }

}


