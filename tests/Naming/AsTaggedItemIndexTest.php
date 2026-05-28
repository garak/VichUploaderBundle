<?php

declare(strict_types=1);

namespace Vich\UploaderBundle\Tests\Naming;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\Attribute\AsTaggedItem;
use Vich\UploaderBundle\Naming\Base64Namer;
use Vich\UploaderBundle\Naming\ChainDirectoryNamer;
use Vich\UploaderBundle\Naming\ConfigurableDirectoryNamer;
use Vich\UploaderBundle\Naming\CurrentDateTimeDirectoryNamer;
use Vich\UploaderBundle\Naming\HashNamer;
use Vich\UploaderBundle\Naming\OrignameNamer;
use Vich\UploaderBundle\Naming\PropertyDirectoryNamer;
use Vich\UploaderBundle\Naming\PropertyNamer;
use Vich\UploaderBundle\Naming\SmartUniqueNamer;
use Vich\UploaderBundle\Naming\SubdirDirectoryNamer;
use Vich\UploaderBundle\Naming\UniqidNamer;

final class AsTaggedItemIndexTest extends TestCase
{
    #[DataProvider('namerClassProvider')]
    public function testBuiltInNamersExposeTaggedIteratorIndex(string $className, string $expectedIndex): void
    {
        $attributes = (new \ReflectionClass($className))->getAttributes(AsTaggedItem::class);

        self::assertCount(1, $attributes, \sprintf('%s should declare exactly one AsTaggedItem attribute.', $className));
        self::assertSame($expectedIndex, $attributes[0]->newInstance()->index);
    }

    public static function namerClassProvider(): array
    {
        return [
            [UniqidNamer::class, 'vich_uploader.namer_uniqid'],
            [PropertyNamer::class, 'vich_uploader.namer_property'],
            [OrignameNamer::class, 'vich_uploader.namer_origname'],
            [HashNamer::class, 'vich_uploader.namer_hash'],
            [Base64Namer::class, 'vich_uploader.namer_base64'],
            [SmartUniqueNamer::class, 'vich_uploader.namer_smart_unique'],
            [SubdirDirectoryNamer::class, 'vich_uploader.directory_namer_subdir'],
            [PropertyDirectoryNamer::class, 'vich_uploader.namer_directory_property'],
            [CurrentDateTimeDirectoryNamer::class, 'vich_uploader.namer_directory_current_date_time'],
            [ConfigurableDirectoryNamer::class, 'vich_uploader.namer_directory_configurable'],
            [ChainDirectoryNamer::class, 'vich_uploader.namer_directory_chain'],
        ];
    }
}

