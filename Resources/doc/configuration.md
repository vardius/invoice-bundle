Vardius - Invoice Bundle
======================================

Configuration
----------------
1. Add fields to seller/buyer
2. Override client form

### 1. Add fields to seller/buyer
Create seller entity and extend client


``` php
// src/Acme/InvoiceBundle/Entity/Seller.php

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vardius\Bundle\InvoiceBundle\Entity\Client;

/**
 * @ORM\Table(name="invoice_seller")
 * @ORM\Entity()
 */
class Seller extends Client
{
    /**
     * @var string
     *
     * @ORM\Column(name="account_number", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     */
    protected $accountNumber;

    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }
}
```

Update seller declaration in your invoice entity

``` php
// src/Acme/InvoiceBundle/Entity/Invoice.php
    <?php
    
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
         * @ORM\ManyToOne(targetEntity="Acme\InvoiceBundle\Entity\Seller")
         * @ORM\JoinColumn(name="seller_id", referencedColumnName="id")
         * @Assert\NotBlank()
         **/
        protected $seller;
    
        // ...
    }
```

Add seller/buyer class to config
config.yml:

``` yaml
//provide entities names (required)
    vardius_invoice:
        seller: LorenzInvoiceBundle:Seller
        buyer: LorenzInvoiceBundle:Buyer
```

### 2. Override client form
Extend VardiusInvoiceBundle

``` php
class AcmeInvoiceBundle extends Bundle
{
    public function getParent()
    {
        return 'VardiusInvoiceBundle';
    }
}
```

Create ClientType class and override client class parameter.
Best way is to copy ClientType from bundle and add custom logic

``` xml
     <parameters>
        <parameter key="vardius_invoice.form.type.client.class">Acme\InvoiceBundle\Form\Type\ClientType</parameter>
     </parameters>
```

Example:

``` php
// src/Acme/InvoiceBundle/Form/Type/ClientType.php

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('company_name')
            ->add('company_address')
            ->add('company_city')
            ->add('company_zip_code')
            ->add('company_country')
            ->add('company_number')
            ->add('company_email')
            ->add('accountNumber') //<----- ADDED THIS FIELD
            ->add('submit', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Acme\InvoiceBundle\Entity\Client', // <---- CHANGED DATA CLASS
        ]);
    }

    public function getName()
    {
        return 'vardius_invoice_client';
    }

}
```
