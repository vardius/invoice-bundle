Vardius - Invoice Bundle
======================================

Installation
----------------
1. Download using composer
2. Enable the VardiusInvoiceBundle
3. Create entity class
4. Edit services

### 1. Download using composer

Install the package through composer:

``` bash
    $ php composer.phar require vardius/invoice-bundle:*
```

### 2. Enable the VardiusInvoiceBundle
Enable the bundle in the kernel:

``` php
    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Vardius\Bundle\InvoiceBundle\VardiusInvoiceBundle(),
        );
            
        // ...
    }
```

Add to config.yml:

``` yaml
//provide entities names (required)
    vardius_invoice:
        invoice: LorenzInvoiceBundle:Invoice
        client: LorenzInvoiceBundle:Client
        tax: LorenzInvoiceBundle:Tax
        entry: LorenzInvoiceBundle:Entry
```

### 3. Create entity classes
Create invoice class and extends Vardius\Bundle\InvoiceBundle\Entity\Invoice as a BaseInvoice

``` php
// src/Acme/InvoiceBundle/Entity/Invoice.php
    <?php
    
    namespace Acme\InvoiceBundle\Entity;

    use Vardius\Bundle\InvoiceBundle\Entity\Invoice as BaseInvoice;
    use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;
    
    /**
     * @ORM\Table(name="acme_invoice")
     * @ORM\Entity()
     */
    class Invoice extends BaseInvoice
    {
        /**
         * @ORM\ManyToOne(targetEntity="Acme\InvoiceBundle\Entity\Client")
         * @ORM\JoinColumn(name="seller_id", referencedColumnName="id")
         * @Assert\NotBlank()
         **/
        protected $seller;
    
        /**
         * @ORM\ManyToOne(targetEntity="Acme\InvoiceBundle\Entity\Client")
         * @ORM\JoinColumn(name="buyer_id", referencedColumnName="id")
         * @Assert\NotBlank()
         **/
        protected $buyer;

        /**
         * @var ArrayCollection|Entry[]
         * @ORM\ManyToMany(targetEntity="Acme\InvoiceBundle\Entity\Entry", cascade={"persist", "remove"})
         * @ORM\JoinTable(name="vardius_invoice_entries",
         *      joinColumns={@ORM\JoinColumn(name="invoice_id", referencedColumnName="id")},
         *      inverseJoinColumns={@ORM\JoinColumn(name="entry_id", referencedColumnName="id", unique=true)}
         *      )
         **/
        protected $entries;
    
        //Add getters and setters
        // ...
    }
```

Do the following with entry, tax and client class

``` php
// src/Acme/InvoiceBundle/Entity/Client.php
    <?php
    
    namespace Acme\InvoiceBundle\Entity;

    use Vardius\Bundle\InvoiceBundle\Entity\Client as BaseClient;
    use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;
    
    /**
     * @ORM\Table(name="acme_client")
     * @ORM\Entity()
     */
    class Client extends BaseClient
    {
        // ...
    }
```

``` php
// src/Acme/InvoiceBundle/Entity/Tax.php
    <?php
    
    namespace Acme\InvoiceBundle\Entity;

    use Vardius\Bundle\InvoiceBundle\Entity\Tax as BaseTax;
    use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;
    
    /**
     * @ORM\Table(name="acme_tax")
     * @ORM\Entity()
     */
    class Tax extends BaseTax
    {
        // ...
    }
```

``` php
// src/Acme/InvoiceBundle/Entity/Entry.php
    <?php
    
    namespace Acme\InvoiceBundle\Entity;

    use Vardius\Bundle\InvoiceBundle\Entity\Entry as BaseEntry;
    use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;
    
    /**
     * @ORM\Table(name="acme_entry")
     * @ORM\Entity()
     */
    class Entry extends BaseEntry
    {
        /**
         * @var ArrayCollection|Tax[]
         * @ORM\ManyToMany(targetEntity="Acme\InvoiceBundle\Entity\Tax", cascade={"persist", "remove"})
         * @ORM\JoinTable(name="vardius_entry_taxes",
         *      joinColumns={@ORM\JoinColumn(name="entry_id", referencedColumnName="id")},
         *      inverseJoinColumns={@ORM\JoinColumn(name="tax_id", referencedColumnName="id", unique=true)}
         *      )
         **/
        protected $taxes;
        
        //Add getters and setters
        // ...
    }
```

### 4. Edit services
Set controller factory for invoice bundle
for example admin if you want invoices to be under /admin firewall

``` xml
    #services.xml
    
    <service id="vardius_invoice.controller.factory" parent="vardius_admin.controller.factory"/>
```
