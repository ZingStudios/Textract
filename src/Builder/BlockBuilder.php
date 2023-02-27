<?php

namespace ZingStudios\Textract\Builder;

use ZingStudios\Textract\Factory\Block\AbstractBlockFactory;
use ZingStudios\Textract\Factory\Block\BlockFactoryInterface;
use ZingStudios\Textract\Factory\Block\CellFactory;
use ZingStudios\Textract\Factory\Block\KeyValueSetFactory;
use ZingStudios\Textract\Factory\Block\LineFactory;
use ZingStudios\Textract\Factory\Block\MergedCellFactory;
use ZingStudios\Textract\Factory\Block\PageFactory;
use ZingStudios\Textract\Factory\Block\QueryFactory;
use ZingStudios\Textract\Factory\Block\QueryResultFactory;
use ZingStudios\Textract\Factory\Block\SelectionElementFactory;
use ZingStudios\Textract\Factory\Block\SignatureFactory;
use ZingStudios\Textract\Factory\Block\TableFactory;
use ZingStudios\Textract\Factory\Block\WordFactory;
use ZingStudios\Textract\Factory\Geometry\GeometryFactory;
use ZingStudios\Textract\Factory\Geometry\GeometryFactoryInterface;
use ZingStudios\Textract\Model\Block\BlockInterface;
use ZingStudios\Textract\Model\Block\BlockType;

class BlockBuilder implements BlockBuilderInterface
{
    private GeometryFactoryInterface $geometryFactory;

    private array $blockFactories = [];

    public function __construct(
        GeometryFactoryInterface $geometryFactory = null
    ) {
        if (is_null($geometryFactory)) {
            $geometryFactory = new GeometryFactory();
        }

        $this->geometryFactory = $geometryFactory;
    }

    public function build(array $data): BlockInterface
    {
        $blockType = BlockType::from($data['BlockType']);
        return $this->getBlockFactory($blockType)->build($data);
    }

    public function setBlockFactory(BlockFactoryInterface $blockFactory, BlockType $blockType): void
    {
        $this->blockFactories[$blockType->value] = $blockFactory;
    }

    private function getBlockFactory(BlockType $blockType): BlockFactoryInterface
    {
        if (!isset($this->blockFactories[$blockType->value])) {
            $this->setBlockFactory($this->createBlockFactory($blockType), $blockType);
        }

        return $this->blockFactories[$blockType->value];
    }

    private function createBlockFactory(BlockType $blockType): BlockFactoryInterface
    {
        switch ($blockType) {
            case BlockType::PAGE:
                return new PageFactory($this->geometryFactory);
            case BlockType::LINE:
                return new LineFactory($this->geometryFactory);
            case BlockType::WORD:
                return new WordFactory($this->geometryFactory);
            case BlockType::TABLE:
                return new TableFactory($this->geometryFactory);
            case BlockType::CELL:
                return new CellFactory($this->geometryFactory);
            case BlockType::KEY_VALUE_SET:
                return new KeyValueSetFactory($this->geometryFactory);
            case BlockType::MERGED_CELL:
                return new MergedCellFactory($this->geometryFactory);
            case BlockType::SELECTION_ELEMENT:
                return new SelectionElementFactory($this->geometryFactory);
            case BlockType::SIGNATURE:
                return new SignatureFactory($this->geometryFactory);
            case BlockType::QUERY:
                return new QueryFactory($this->geometryFactory);
            case BlockType::QUERY_RESULT:
                return new QueryResultFactory($this->geometryFactory);
        }

        throw new \RuntimeException('Unknown block type: ' . $blockType->value);
    }
}
