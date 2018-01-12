<?php

/**
 * (c) FSi sp. z o.o. <info@fsi.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FSi\Bundle\DoctrineExtensionsBundle\DataGrid\ColumnType;

use FSi\Component\DataGrid\Column\CellViewInterface;
use FSi\Component\DataGrid\Column\ColumnAbstractType;
use FSi\Component\DataGrid\Column\ColumnInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FSiImage extends ColumnAbstractType
{
    public function getId(): string
    {
        return 'fsi_image';
    }

    public function filterValue(ColumnInterface $column, $value)
    {
        return $value;
    }

    public function buildCellView(ColumnInterface $column, CellViewInterface $view): void
    {
        $view->setAttribute('width', $column->getOption('width'));
    }

    public function initOptions(OptionsResolver $optionsResolver): void
    {
        $optionsResolver
            ->setRequired(['width'])
            ->setAllowedTypes('width', 'integer');
    }
}
