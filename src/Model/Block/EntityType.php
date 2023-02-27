<?php

namespace ZingStudios\Textract\Model\Block;

enum EntityType: string
{
    case KEY = 'KEY';
    case VALUE = 'VALUE';
    case COLUMN_HEADER = 'COLUMN_HEADER';
}
