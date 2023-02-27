<?php

namespace ZingStudios\Textract\Model\Block;

enum RelationshipType: string
{
    case VALUE = 'VALUE';
    case CHILD = 'CHILD';
    case COMPLEX_FEATURES = 'COMPLEX_FEATURES';
    case MERGED_CELL = 'MERGED_CELL';
    case TITLE = 'TITLE';
    case ANSWER = 'ANSWER';
}
