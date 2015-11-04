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
 * Interface InvoiceInterface
 * @package Vardius\Bundle\InvoiceBundle\Entity
 * @author Rafał Lorenz <vardius@gmail.com>
 */
interface InvoiceInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getNumber();

    /**
     * @param $number
     * @return $this
     */
    public function setNumber($number);

    /**
     * @return \DateTime
     */
    public function getIssuedDate();

    /**
     * @param $issuedDate
     * @return $this
     */
    public function setIssuedDate($issuedDate);

    /**
     * @return \DateTime
     */
    public function getPaymentDate();

    /**
     * @param $paymentDate
     * @return $this
     */
    public function setPaymentDate($paymentDate);

    /**
     * @return mixed
     */
    public function getEntries();

    /**
     * @param Entry $entry
     * @return $this
     */
    public function addEntry($entry);

    /**
     * @param Entry $entry
     * @return $this
     */
    public function removeEntry($entry);

    /**
     * @return Client
     */
    public function getSeller();

    /**
     * @param Client $seller
     * @return Invoice
     */
    public function setSeller($seller);

    /**
     * @return Client
     */
    public function getBuyer();

    /**
     * @param Client $buyer
     * @return Invoice
     */
    public function setBuyer($buyer);

}
