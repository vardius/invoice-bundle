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

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Client
 * @package Vardius\Bundle\InvoiceBundle\Entity
 * @author Rafał Lorenz <vardius@gmail.com>
 */
abstract class Client
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
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="company_name", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $companyName;

    /**
     * @var string
     *
     * @ORM\Column(name="company_email", type="string", length=255, nullable=true)
     * @Assert\Email()
     */
    protected $companyEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="company_number", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $companyNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="company_address", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $companyAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="company_city", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $companyCity;

    /**
     * @var string
     *
     * @ORM\Column(name="company_zip_code", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $companyZipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="company_country", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Country()
     */
    protected $companyCountry;

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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Client
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Client
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     * @return Client
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyEmail()
    {
        return $this->companyEmail;
    }

    /**
     * @param string $companyEmail
     * @return Client
     */
    public function setCompanyEmail($companyEmail)
    {
        $this->companyEmail = $companyEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyNumber()
    {
        return $this->companyNumber;
    }

    /**
     * @param string $companyNumber
     * @return Client
     */
    public function setCompanyNumber($companyNumber)
    {
        $this->companyNumber = $companyNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }

    /**
     * @param string $companyAddress
     * @return Client
     */
    public function setCompanyAddress($companyAddress)
    {
        $this->companyAddress = $companyAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyCity()
    {
        return $this->companyCity;
    }

    /**
     * @param string $companyCity
     * @return Client
     */
    public function setCompanyCity($companyCity)
    {
        $this->companyCity = $companyCity;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyZipCode()
    {
        return $this->companyZipCode;
    }

    /**
     * @param string $companyZipCode
     * @return Client
     */
    public function setCompanyZipCode($companyZipCode)
    {
        $this->companyZipCode = $companyZipCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyCountry()
    {
        return $this->companyCountry;
    }

    /**
     * @param string $companyCountry
     * @return Client
     */
    public function setCompanyCountry($companyCountry)
    {
        $this->companyCountry = $companyCountry;

        return $this;
    }

    /**
     * @inheritDoc
     */
    function __toString()
    {
        return $this->getCompanyName();
    }

}
