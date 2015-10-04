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
 * Class EntryType
 * @package Vardius\Bundle\InvoiceBundle\Form\Type
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class EntryType extends AbstractType
{
    protected $taxClass;
    protected $class;

    /**
     * EntryType constructor.
     * @param ClassManager $classManager
     * @param $class
     * @param $taxClass
     */
    public function __construct(ClassManager $classManager, $class, $taxClass)
    {
        $this->taxClass = $taxClass;
        $this->class = $classManager->getEntityClass($class);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('unit')
            ->add('quantity')
            ->add('price')
            ->add('taxes', 'entity', [
                'class' => $this->taxClass,
                'multiple' => true
            ]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => $this->class,
        ]);
    }

    public function getName()
    {
        return 'vardius_invoice_entry';
    }

}
