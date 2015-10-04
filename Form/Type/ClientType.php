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
 * Class ClientType
 * @package Vardius\Bundle\InvoiceBundle\Form\Type
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class ClientType extends AbstractType
{
    protected $class;

    /**
     * ClientType constructor.
     * @param ClassManager $classManager
     * @param $class
     */
    public function __construct(ClassManager $classManager, $class)
    {
        $this->class = $classManager->getEntityClass($class);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('company_name')
            ->add('company_address')
            ->add('company_city')
            ->add('company_zip_code')
            ->add('company_country', 'country')
            ->add('company_number')
            ->add('company_email', 'email')
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
        return 'vardius_invoice_client';
    }

}
