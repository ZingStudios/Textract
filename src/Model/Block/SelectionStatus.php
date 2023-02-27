<?php

namespace ZingStudios\Textract\Model\Block;

enum SelectionStatus: string
{
    case SELECTED = 'SELECTED';
    case NOT_SELECTED = 'NOT_SELECTED';
}
