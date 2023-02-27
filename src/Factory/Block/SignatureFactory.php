<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\SelectionElement;
use ZingStudios\Textract\Model\Block\Signature;

class SignatureFactory extends AbstractBlockFactory implements SignatureFactoryInterface
{
    public function build(array $data): Signature
    {
        return new Signature(
            $data['Id'],
            $this->getGeometryFactory()->build($data['Geometry'])
        );
    }
}
