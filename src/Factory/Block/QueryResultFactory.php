<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\QueryResult;

class QueryResultFactory extends AbstractBlockFactory implements QueryResultFactoryInterface
{
    public function build(array $data): QueryResult
    {
        return new QueryResult(
            $data['Id'],
            $this->getGeometryFactory()->build($data['Geometry']),
            $data['Alias']
        );
    }
}
