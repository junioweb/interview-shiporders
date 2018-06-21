<?php
/**
 * Item
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Server\Model
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Shiporders
 *
 * This is a sample server Shiporders server. For this sample, you can use the api key `special-key` to test the authorization     filters.
 *
 * OpenAPI spec version: 1.0.0
 * Contact: junio.webmaster@gmail.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Server\Model;

use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class representing the Item model.
 *
 * @package Swagger\Server\Model
 * @author  Swagger Codegen team
 */
class Item 
{
        /**
     * @var string|null
     * @SerializedName("title")
     * @Assert\Type("string")
     * @Type("string")
     */
    protected $title;

    /**
     * @var string|null
     * @SerializedName("note")
     * @Assert\Type("string")
     * @Type("string")
     */
    protected $note;

    /**
     * @var int|null
     * @SerializedName("quantity")
     * @Assert\Type("int")
     * @Type("int")
     */
    protected $quantity;

    /**
     * @var float|null
     * @SerializedName("price")
     * @Assert\Type("float")
     * @Type("float")
     */
    protected $price;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->title = isset($data['title']) ? $data['title'] : null;
        $this->note = isset($data['note']) ? $data['note'] : null;
        $this->quantity = isset($data['quantity']) ? $data['quantity'] : null;
        $this->price = isset($data['price']) ? $data['price'] : null;
    }

    /**
     * Gets title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets title.
     *
     * @param string|null $title
     *
     * @return $this
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets note.
     *
     * @return string|null
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Sets note.
     *
     * @param string|null $note
     *
     * @return $this
     */
    public function setNote($note = null)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Gets quantity.
     *
     * @return int|null
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets quantity.
     *
     * @param int|null $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity = null)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Gets price.
     *
     * @return float|null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets price.
     *
     * @param float|null $price
     *
     * @return $this
     */
    public function setPrice($price = null)
    {
        $this->price = $price;

        return $this;
    }
}


