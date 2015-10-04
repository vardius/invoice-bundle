<?php
/**
 * This file is part of the vcard package.
 *
 * (c) Rafał Lorenz <vardius@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vardius\Bundle\InvoiceBundle\Manager;

use Doctrine\ORM\EntityManager;


/**
 * Class ClassManager
 * @package Vardius\Bundle\InvoiceBundle\Manager
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class ClassManager
{
    /** @var EntityManager */
    protected $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param $entityName
     * @return string
     */
    public function getEntityClass($entityName)
    {
        $repository = $this->entityManager->getRepository($entityName);

        return $repository->getClassName();
    }

}
