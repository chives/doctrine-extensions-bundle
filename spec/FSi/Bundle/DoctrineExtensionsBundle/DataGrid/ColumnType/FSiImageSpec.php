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
use PhpSpec\ObjectBehavior;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Exception\MissingOptionsException;

class FSiImageSpec extends ObjectBehavior
{
    function it_initializes_width_option()
    {
        $this->initOptions();
        $this->setOptions(['width' => 100]);

        $this->getOption('width')->shouldReturn(100);
    }

    function it_accepts_only_integer_width()
    {
        $this->initOptions();
        $this->shouldThrow(InvalidOptionsException::class)->duringSetOptions(['width' => 'a']);
    }

    function it_requires_width_option()
    {
        $this->initOptions();
        $this->shouldThrow(MissingOptionsException::class)->duringSetOptions([]);
    }

    function it_passes_width_as_view_attribute(CellViewInterface $cellView)
    {
        $this->initOptions();
        $this->setOptions(['width' => 100]);

        $cellView->setAttribute('width', 100)->shouldBeCalled();

        $this->buildCellView($cellView);
    }
}
