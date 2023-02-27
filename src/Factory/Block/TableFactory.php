<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\Table;

class TableFactory extends AbstractBlockFactory implements TableFactoryInterface
{
    public function build(array $data): Table
    {
        return new Table(
            $data['Id'],
            $this->getGeometryFactory()->build($data['Geometry'])
        );
    }
}
