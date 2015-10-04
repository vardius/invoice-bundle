<?php
/**
 * This file is part of the vcard package.
 *
 * (c) Rafa� Lorenz <vardius@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vardius\Bundle\InvoiceBundle\ListView;

use Vardius\Bundle\ListBundle\ListView\Provider\ListViewProvider;

/**
 * Class InvoiceListProvider
 * @package Vardius\Bundle\InvoiceBundle\ListView
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class InvoiceListProvider extends ListViewProvider
{
    /**
     * @inheritDoc
     */
    public function buildListView()
    {
        $listView = $this->listViewFactory->get();

        $listView
            ->addColumn('number', 'property', [
                'sort' => true,
            ])
            ->addColumn('seller', 'property', [
                'sort' => true,
            ])
            ->addColumn('buyer', 'property', [
                'sort' => true,
            ])
            ->addColumn('issuedDate', 'date', [
                'sort' => true,
            ])
            ->addColumn('paymentDate', 'date', [
                'sort' => true,
            ])
            ->addColumn('action', 'action', [
                'actions' => [
                    [
                        'path' => 'vardius_invoice.crud_controller.invoice.show',
                        'name' => '',
                        'icon' => 'fa-external-link'
                    ],
                    [
                        'path' => 'vardius_invoice.crud_controller.invoice.edit',
                        'name' => '',
                        'icon' => 'fa-edit'
                    ],
                    [
                        'path' => 'vardius_invoice.crud_controller.invoice.delete',
                        'name' => '',
                        'icon' => 'fa-trash'
                    ]
                ]
            ])
            ->addAction('vardius_invoice.crud_controller.invoice.export', 'action.export.pdf', 'fa-file-pdf-o', [
                'type' => 'pdf',
            ])
            ->addAction('vardius_invoice.crud_controller.invoice.add', 'action.new', 'fa-plus-square');

        return $listView;
    }

}
