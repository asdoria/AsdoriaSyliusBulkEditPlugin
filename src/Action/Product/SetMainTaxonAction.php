<?php

declare(strict_types=1);

/*
 * This file is part of the Asdoria Package.
 *
 * (c) Asdoria .
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Asdoria\SyliusBulkEditPlugin\Action\Product;

use Asdoria\SyliusBulkEditPlugin\Action\ResourceActionInterface;
use Asdoria\SyliusBulkEditPlugin\Form\Type\Configuration\TaxonConfigurationType;
use Asdoria\SyliusBulkEditPlugin\Message\BulkEditNotificationInterface;
use Asdoria\SyliusBulkEditPlugin\Traits\TaxonRepositoryTrait;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Taxonomy\Model\TaxonInterface;

/**
 * Class SetMainTaxonAction
 * @package Asdoria\SyliusBulkEditPlugin\Action\Product
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
final class SetMainTaxonAction implements ResourceActionInterface
{
    const SET_MAIN_TAXON = 'set_main_taxon';
    use TaxonRepositoryTrait;

    /**
     * @param ResourceInterface             $resource
     * @param BulkEditNotificationInterface $message
     *
     * @return void
     */
    public function handle(ResourceInterface $resource, BulkEditNotificationInterface $message): void
    {
        if (!$resource instanceof ProductInterface) return;

        $configuration = $message->getConfiguration();

        if (empty($configuration)) return;

        $taxonCode = $configuration[TaxonConfigurationType::_TAXON_FIELD] ?? null;

        if (empty($taxonCode)) return;

        $taxon     = $this->getTaxonRepository()->findOneByCode($taxonCode);

        if(!$taxon instanceof TaxonInterface) return;

        $resource->setMainTaxon($taxon);
    }
}
