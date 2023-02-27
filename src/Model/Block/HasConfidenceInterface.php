<?php

namespace ZingStudios\Textract\Model\Block;

interface HasConfidenceInterface
{
    public function getConfidence(): float;
}
