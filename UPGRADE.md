# Upgrading from v2.9 to v3.0

## Breaking Changes

* Minimum PHP version raised from `^8.1` to `^8.3`.
* Minimum Symfony version raised: support for `5.4` and `7.0`-`7.3` has been dropped. Symfony `6.4`, `7.4` and `8.0` are now required.
* The deprecated `Vich\UploaderBundle\Mapping\Annotation` namespace has been removed. Use `Vich\UploaderBundle\Mapping\Attribute` instead.
* The deprecated `AnnotationInterface` has been removed. Use `AttributeInterface` instead.
* Support for annotations has been removed entirely). Use PHP attributes instead.
* `AttributeReader` deprecated methods have been removed: use `getClassAttribute()` instead of `getClassAnnotation()`, `getPropertyAttribute()` instead of `getPropertyAnnotation()`.
* `NamerInterface::name()` and `DirectoryNamerInterface::directoryName()` parameter type widened from `object` to `object|array`. Custom namers that type-hint the parameter as `object` must update their signature to match.
* `PropertyMappingResolverInterface::resolve()` (and the `PropertyMappingResolver` implementation) now returns `PropertyMappingInterface` instead of the concrete `PropertyMapping` class. Code that type-hints against `PropertyMapping` directly should switch to `PropertyMappingInterface`.
* Several internal classes are now `final` and are only meant to be extended through interfaces: `PropertyMapping`, `PropertyMappingFactory`, `MetadataReader` and `AttributeReader`. New interfaces are provided as extension points: `PropertyMappingInterface`, `PropertyMappingFactoryInterface`, `MetadataReaderInterface` and `UploadHandlerInterface`. Code that extended or mocked these concrete classes should depend on the corresponding interface instead.

# Upgrading from v2.8 to v2.9

## Deprecations

* The `Vich\UploaderBundle\Mapping\Annotation` namespace is deprecated. Replace it with `Vich\UploaderBundle\Mapping\Attribute`;
  The old namespace will be removed in version 3.0.
* `AttributeReader` methods: replace `*Annotation()` with `*Attribute()` (e.g., `getClassAnnotation()` → `getClassAttribute()`).

## New Features

* New `namer_keep_extension` configuration option to force namers to preserve original file extension.
* Custom namers using `namer_keep_extension: true` must implement `ConfigurableInterface`.

# Upgrading from v2.7 to v2.8

* Namers are not public anymore. If you uses a custom namer, you can now make it private.

# Upgrading from v2.6 to v2.7

* Now the original extension '.xlsb' is retained even if the mime type is guessed as 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'.
  
# Upgrading from v2.4 to v2.5

* To address the question raised in the previous version, now the original extension '.csv' is retained
  even if the mime type is guessed as 'text/plain'.

# Upgrading from v2.3 to v2.4

* To address a security question, the original extension of the uploaded file is not preserved anymore.
  Instead, it is replaced by the extension of the matching mime type. This could cause a different
  behaviour only if you use some non-standard extension, otherwise it should not change anything.

# Upgrading from v2.1 to v2.2

* The signature of `StorageInterface::resolveStream` method was changed. The $fieldName parameter is now nullable. 
* the `AdapterInterface` no longer requires `getObjectFromArgs` method.
* the `AdapterInterface::recomputeChangeSet()` accepts `Doctrine\Persistence\Event\LifecycleEventArgs` as argument.

# Upgrading from v2.0 to v2.1

* the internal class `FilenameUtils` has been removed.

# Upgrading from v1 to v2.0

* every class marked as `@final` is now final
* all properties are now fully type-hinted
* all methods arguments are now fully type-hinted
* all methods have now return types
* all constructors now use property promotion
* all deprecated features were removed
* the new default type for mapping is "attribute". You can still use annotations, but you need an explicit definition (set "annotation" as value for "vich_uploader.metadata.type" config key)
* the service "vich_uploader.current_date_time_helper" has been removed. The `DateTimeHelper` interface has been
  removed as well.
