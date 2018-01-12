<?php

/**
 * (c) FSi sp. z o.o. <info@fsi.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\FSi\Bundle\DoctrineExtensionsBundle\DataGrid\ColumnType;

use FSi\Component\DataGrid\Column\CellViewInterface;
use FSi\Component\DataGrid\Column\ColumnInterface;
use PhpSpec\ObjectBehavior;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Exception\MissingOptionsException;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FSiImageSpec extends ObjectBehavior
{
    function it_initializes_width_option(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setRequired(['width'])->shouldBeCalled()->willReturn($optionsResolver);
        $optionsResolver->setAllowedTypes('width', 'integer')->shouldBeCalled();

        $this->initOptions($optionsResolver);
    }

    function it_passes_width_as_view_attribute(ColumnInterface $column, CellViewInterface $cellView)
    {
        $column->getOption('width')->willReturn(100);

        $cellView->setAttribute('width', 100)->shouldBeCalled();

        $this->buildCellView($column, $cellView);
    }
}
