<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\Query;

class QueryFactory extends AbstractBlockFactory implements QueryFactoryInterface
{
    public function build(array $data): Query
    {
        return new Query(
            $data['Id'],
            $this->getGeometryFactory()->build($data['Geometry']),
            $data['Alias'],
            $data['Text']
        );
    }
}
