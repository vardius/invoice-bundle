<?php
/**
 * This file is part of the vcard package.
 *
 * (c) Rafał Lorenz <vardius@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vardius\Bundle\InvoiceBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class DatePickerType.
 * @package Vardius\Bundle\InvoiceBundle\Form\Type
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class DatePickerType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'widget' => 'single_text',
            'format' => 'dd-MM-yyyy',
            'attr' => [
                'class' => 'datepicker',
                'data-provide' => 'datepicker',
                'data-date-format' => 'dd-mm-yyyy',
                'data-date-today-highlight' => true,
            ],
        ]);
    }

    public function getParent()
    {
        return 'date';
    }

    public function getName()
    {
        return 'vardius_Invoice_date_picker';
    }
}
