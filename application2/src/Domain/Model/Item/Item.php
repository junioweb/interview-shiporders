<?php

namespace Domain\Model\Item;

/**
 * Class representing the Item model.
 *
 * @package Domain\Model\Item
 */
class Item 
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $note;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var float
     */
    protected $price;

    /**
     * Item constructor.
     * @param string $title
     * @param string $note
     * @param int $quantity
     * @param float $price
     */
    public function __construct(string $title, string $note, int $quantity, float $price)
    {
        $this->title = $title;
        $this->note = $note;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note)
    {
        $this->note = $note;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

}


