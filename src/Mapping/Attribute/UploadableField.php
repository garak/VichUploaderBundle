<?php

namespace Vich\UploaderBundle\Mapping\Attribute;

use Vich\UploaderBundle\Mapping\AttributeInterface;

<<<<<<<< HEAD:src/Mapping/Attribute/UploadableField.php
========
/**
 * UploadableField.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 * @NamedArgumentConstructor
 *
 * @deprecated since 2.9, use Vich\UploaderBundle\Mapping\Attribute\UploadableField instead
 *
 * @author Dustin Dobervich <ddobervich@gmail.com>
 */
>>>>>>>> 1adff27 (Add deprecation layer for Annotation to Attribute migration):src/Mapping/Annotation/UploadableField.php
#[\Attribute(\Attribute::TARGET_PROPERTY)]
final readonly class UploadableField implements AttributeInterface
{
    public function __construct(
        private readonly string $mapping,
        private readonly ?string $fileNameProperty = null,
        private readonly ?string $size = null,
        private readonly ?string $mimeType = null,
        private readonly ?string $originalName = null,
        private readonly ?string $dimensions = null
    ) {
        trigger_deprecation('vich/uploader-bundle', '2.9', 'The "Vich\UploaderBundle\Mapping\Annotation\UploadableField" class is deprecated, use "Vich\UploaderBundle\Mapping\Attribute\UploadableField" instead.');
    }

    /**
     * Gets the mapping name.
     *
     * @return string The mapping name
     */
    public function getMapping(): string
    {
        return $this->mapping;
    }

    /**
     * Gets the file name property.
     *
     * @return string|null The file name property
     */
    public function getFileNameProperty(): ?string
    {
        return $this->fileNameProperty;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    public function getOriginalName(): ?string
    {
        return $this->originalName;
    }

    public function getDimensions(): ?string
    {
        return $this->dimensions;
    }
}
