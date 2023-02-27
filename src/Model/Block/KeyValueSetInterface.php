<?php

namespace ZingStudios\Textract\Model\Block;

/**
 *
 */
interface KeyValueSetInterface
{
    /**
     * @return mixed
     */
    public function getKey();

    /**
     * @return array<Word>
     */
    public function getWordValues();

    /**
     * @return array<Line>
     */
    public function getLineValues();

}