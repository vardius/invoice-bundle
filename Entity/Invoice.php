<?php
/**
 * This file is part of the vcard package.
 *
 * (c) Rafa� Lorenz <vardius@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vardius\Bundle\InvoiceBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Invoice
 * @package Vardius\Bundle\InvoiceBundle\Entity
 * @author Rafał Lorenz <vardius@gmail.com>
 */
abstract class Invoice implements InvoiceInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $number;

    /**
     * @var \DateTime
     * @ORM\Column(name="issued_date", type="datetime")
     * @Assert\NotBlank()
     * @Assert\DateTime()
     */
    protected $issuedDate;

    /**
     * @var \DateTime
     * @ORM\Column(name="payment_date", type="datetime")
     * @Assert\NotBlank()
     * @Assert\DateTime()
     */
    protected $paymentDate;

    public function __construct()
    {
        $this->entries = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getIssuedDate()
    {
        return $this->issuedDate;
    }

    /**
     * @param $issuedDate
     * @return $this
     */
    public function setIssuedDate($issuedDate)
    {
        $this->issuedDate = $issuedDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param $paymentDate
     * @return $this
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

}
