<?php
/**
 * This file is part of the vcard package.
 *
 * (c) Rafał Lorenz <vardius@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vardius\Bundle\InvoiceBundle\Entity;

/**
 * Interface EntryInterface
 * @package Vardius\Bundle\InvoiceBundle\Entity
 * @author Rafał Lorenz <vardius@gmail.com>
 */
interface EntryInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @param $name
     * @return $this
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getUnit();

    /**
     * @param $unit
     * @return $this
     */
    public function setUnit($unit);

    /**
     * @return string
     */
    public function getQuantity();

    /**
     * @param $quantity
     * @return $this
     */
    public function setQuantity($quantity);

    /**
     * @return mixed
     */
    public function getTaxes();

    /**
     * @param Tax $tax
     * @return $this
     */
    public function addTax($tax);

    /**
     * @param Tax $tax
     * @return $this
     */
    public function removeTax($tax);

}
