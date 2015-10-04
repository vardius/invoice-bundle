<?php

namespace Vardius\Bundle\InvoiceBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class VardiusInvoiceExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('vardius_invoice.invoice', $config['invoice']);
        $container->setParameter('vardius_invoice.client', $config['client']);
        $container->setParameter('vardius_invoice.entry', $config['entry']);
        $container->setParameter('vardius_invoice.tax', $config['tax']);

        $seller = $config['seller'];
        $buyer = $config['buyer'];

        if (empty($seller)) {
            $container->setParameter('vardius_invoice.seller', $config['client']);
        } else {
            $container->setParameter('vardius_invoice.seller', $config['seller']);
        }

        if (empty($buyer)) {
            $container->setParameter('vardius_invoice.buyer', $config['client']);
        } else {
            $container->setParameter('vardius_invoice.buyer', $config['buyer']);
        }


        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
    }
}

