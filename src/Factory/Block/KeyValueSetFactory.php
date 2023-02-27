<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\EntityType;
use ZingStudios\Textract\Model\Block\KeyValueSet;

class KeyValueSetFactory extends AbstractBlockFactory implements KeyValueSetFactoryInterface
{
    public function build(array $data): KeyValueSet
    {
        return new KeyValueSet(
            $data['Id'],
            $this->getGeometryFactory()->build($data['Geometry']),
            (float)$data['Confidence'],
            EntityType::from($data['EntityTypes'][0])
        );
    }
}
