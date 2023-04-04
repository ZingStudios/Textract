<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\TableTitle;

class TableTitleFactory extends AbstractBlockFactory implements TableTitleFactoryInterface
{

    public function build(array $data): TableTitle
    {
        return new TableTitle($data['Id'], $this->getGeometryFactory()->build($data['Geometry']),);
    }
}