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

namespace Asdoria\SyliusBulkEditPlugin\Traits;

use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

trait ProductAttributeRepositoryTrait
{
    protected EntityRepository $productAttributeRepository;

    public function getProductAttributeRepository(): EntityRepository
    {
        return $this->productAttributeRepository;
    }

    public function setProductAttributeRepository(EntityRepository $productAttributeRepository): void
    {
        $this->productAttributeRepository = $productAttributeRepository;
    }
}
