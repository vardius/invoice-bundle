<?php
/**
 * This file is part of the vcard package.
 *
 * (c) Rafa� Lorenz <vardius@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vardius\Bundle\InvoiceBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Vardius\Bundle\InvoiceBundle\Manager\ClassManager;

/**
 * Class InvoiceType
 * @package Vardius\Bundle\InvoiceBundle\Form\Type
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class InvoiceType extends AbstractType
{
    protected $class;
    protected $buyer;
    protected $seller;

    /**
     * InvoiceType constructor.
     * @param ClassManager $classManager
     * @param $class
     */
    public function __construct(ClassManager $classManager, $class, $seller, $buyer)
    {
        $this->class = $classManager->getEntityClass($class);
        $this->seller = $seller;
        $this->buyer = $buyer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number')
            ->add('issuedDate', 'vardius_Invoice_date_picker')
            ->add('paymentDate', 'vardius_Invoice_date_picker')
            ->add('seller', 'entity', [
                'class' => $this->seller
            ])
            ->add('buyer', 'entity', [
                'class' => $this->buyer
            ])
            ->add('entries', 'collection', [
                'type' => 'vardius_invoice_entry',
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => false,
            ])
            ->add('submit', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => $this->class,
        ]);
    }

    public function getName()
    {
        return 'vardius_invoice';
    }

}
