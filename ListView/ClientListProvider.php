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
 * Class ClientListProvider
 * @package Vardius\Bundle\InvoiceBundle\ListView
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class ClientListProvider extends ListViewProvider
{
    /**
     * @inheritDoc
     */
    public function buildListView()
    {
        $listView = $this->listViewFactory->get();

        $listView
            ->addColumn('companyName', 'property', [
                'sort' => true,
            ])
            ->addColumn('companyNumber', 'property', [
                'sort' => true,
            ])
            ->addColumn('companyCity', 'property', [
                'sort' => true,
            ])
            ->addColumn('companyAddress', 'property', [
                'sort' => true,
            ])
            ->addColumn('action', 'action', [
                'actions' => [
                    [
                        'path' => 'vardius_invoice.crud_controller.client.edit',
                        'name' => '',
                        'icon' => 'fa-edit'
                    ],
                    [
                        'path' => 'vardius_invoice.crud_controller.client.delete',
                        'name' => '',
                        'icon' => 'fa-trash'
                    ]
                ]
            ])
            ->addAction('vardius_invoice.crud_controller.client.add', 'action.new', 'fa-plus-square');

        return $listView;
    }

}
