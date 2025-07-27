#!/bin/bash

# Script to shorten file names in vendor directory to resolve CarbonDoctrineType path issues

cd laravel-blog/vendor

echo "Shortening PHPUnit configuration files..."
# PHPUnit migration files
if [ -f "phpunit/phpunit/src/TextUI/Configuration/Xml/Migration/Migrations/RemoveBeStrictAboutResourceUsageDuringSmallTestsAttribute.php" ]; then
    mv "phpunit/phpunit/src/TextUI/Configuration/Xml/Migration/Migrations/RemoveBeStrictAboutResourceUsageDuringSmallTestsAttribute.php" \
       "phpunit/phpunit/src/TextUI/Configuration/Xml/Migration/Migrations/RemoveBeStrictResourceUsageAttribute.php"
fi

if [ -f "phpunit/phpunit/src/TextUI/Configuration/Xml/Migration/Migrations/RemoveCoverageElementProcessUncoveredFilesAttribute.php" ]; then
    mv "phpunit/phpunit/src/TextUI/Configuration/Xml/Migration/Migrations/RemoveCoverageElementProcessUncoveredFilesAttribute.php" \
       "phpunit/phpunit/src/TextUI/Configuration/Xml/Migration/Migrations/RemoveCoverageProcessAttribute.php"
fi

if [ -f "phpunit/phpunit/src/TextUI/Configuration/Xml/Migration/Migrations/RemoveBeStrictAboutTodoAnnotatedTestsAttribute.php" ]; then
    mv "phpunit/phpunit/src/TextUI/Configuration/Xml/Migration/Migrations/RemoveBeStrictAboutTodoAnnotatedTestsAttribute.php" \
       "phpunit/phpunit/src/TextUI/Configuration/Xml/Migration/Migrations/RemoveTodoTestsAttribute.php"
fi

if [ -f "phpunit/phpunit/src/TextUI/Configuration/Xml/Migration/Migrations/RenameBeStrictAboutCoversAnnotationAttribute.php" ]; then
    mv "phpunit/phpunit/src/TextUI/Configuration/Xml/Migration/Migrations/RenameBeStrictAboutCoversAnnotationAttribute.php" \
       "phpunit/phpunit/src/TextUI/Configuration/Xml/Migration/Migrations/RenameCoversAttribute.php"
fi

if [ -f "phpunit/phpunit/src/TextUI/Configuration/Xml/Migration/Migrations/RemoveCoverageElementCacheDirectoryAttribute.php" ]; then
    mv "phpunit/phpunit/src/TextUI/Configuration/Xml/Migration/Migrations/RemoveCoverageElementCacheDirectoryAttribute.php" \
       "phpunit/phpunit/src/TextUI/Configuration/Xml/Migration/Migrations/RemoveCacheDirAttribute.php"
fi

echo "Shortening Spatie error solution files..."
# Spatie error solution files
if [ -f "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/IncorrectValetDbCredentialsSolutionProvider.php" ]; then
    mv "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/IncorrectValetDbCredentialsSolutionProvider.php" \
       "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/ValetDbCredentialsProvider.php"
fi

if [ -f "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/UndefinedLivewirePropertySolutionProvider.php" ]; then
    mv "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/UndefinedLivewirePropertySolutionProvider.php" \
       "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/LivewirePropertyProvider.php"
fi

if [ -f "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/MissingLivewireComponentSolutionProvider.php" ]; then
    mv "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/MissingLivewireComponentSolutionProvider.php" \
       "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/LivewireComponentProvider.php"
fi

if [ -f "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/UnknownMariadbCollationSolutionProvider.php" ]; then
    mv "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/UnknownMariadbCollationSolutionProvider.php" \
       "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/MariadbCollationProvider.php"
fi

if [ -f "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/UndefinedLivewireMethodSolutionProvider.php" ]; then
    mv "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/UndefinedLivewireMethodSolutionProvider.php" \
       "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/LivewireMethodProvider.php"
fi

if [ -f "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/GenericLaravelExceptionSolutionProvider.php" ]; then
    mv "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/GenericLaravelExceptionSolutionProvider.php" \
       "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/LaravelExceptionProvider.php"
fi

if [ -f "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/UnknownMysql8CollationSolutionProvider.php" ]; then
    mv "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/UnknownMysql8CollationSolutionProvider.php" \
       "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/Mysql8CollationProvider.php"
fi

if [ -f "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/RunningLaravelDuskInProductionProvider.php" ]; then
    mv "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/RunningLaravelDuskInProductionProvider.php" \
       "spatie/error-solutions/legacy/laravel-ignition/Solutions/SolutionProviders/DuskProductionProvider.php"
fi

echo "Shortening Mockery files..."
# Mockery files
if [ -f "mockery/mockery/library/Mockery/Generator/StringManipulation/Pass/RemoveUnserializeForInternalSerializableClassesPass.php" ]; then
    mv "mockery/mockery/library/Mockery/Generator/StringManipulation/Pass/RemoveUnserializeForInternalSerializableClassesPass.php" \
       "mockery/mockery/library/Mockery/Generator/StringManipulation/Pass/RemoveUnserializePass.php"
fi

echo "Shortening other long vendor files..."
# Other long files
if [ -f "phpunit/phpunit/src/Framework/Exception/ObjectEquals/ComparisonMethodDoesNotDeclareExactlyOneParameterException.php" ]; then
    mv "phpunit/phpunit/src/Framework/Exception/ObjectEquals/ComparisonMethodDoesNotDeclareExactlyOneParameterException.php" \
       "phpunit/phpunit/src/Framework/Exception/ObjectEquals/ComparisonMethodParameterException.php"
fi

if [ -f "phpunit/phpunit/src/TextUI/Output/Default/ProgressPrinter/Subscriber/TestTriggeredPhpunitDeprecationSubscriber.php" ]; then
    mv "phpunit/phpunit/src/TextUI/Output/Default/ProgressPrinter/Subscriber/TestTriggeredPhpunitDeprecationSubscriber.php" \
       "phpunit/phpunit/src/TextUI/Output/Default/ProgressPrinter/Subscriber/PhpunitDeprecationSubscriber.php"
fi

echo "Shortening Carbon-related long files..."
# Carbon message formatter files
if [ -f "nesbot/carbon/lazy/Carbon/MessageFormatter/MessageFormatterMapperStrongType.php" ]; then
    mv "nesbot/carbon/lazy/Carbon/MessageFormatter/MessageFormatterMapperStrongType.php" \
       "nesbot/carbon/lazy/Carbon/MessageFormatter/FormatterMapperStrong.php"
fi

if [ -f "nesbot/carbon/lazy/Carbon/MessageFormatter/MessageFormatterMapperWeakType.php" ]; then
    mv "nesbot/carbon/lazy/Carbon/MessageFormatter/MessageFormatterMapperWeakType.php" \
       "nesbot/carbon/lazy/Carbon/MessageFormatter/FormatterMapperWeak.php"
fi

# Carbon doctrine types
if [ -f "carbonphp/carbon-doctrine-types/src/Carbon/Doctrine/DateTimeDefaultPrecision.php" ]; then
    mv "carbonphp/carbon-doctrine-types/src/Carbon/Doctrine/DateTimeDefaultPrecision.php" \
       "carbonphp/carbon-doctrine-types/src/Carbon/Doctrine/DateTimePrecision.php"
fi

if [ -f "carbonphp/carbon-doctrine-types/src/Carbon/Doctrine/DateTimeImmutableType.php" ]; then
    mv "carbonphp/carbon-doctrine-types/src/Carbon/Doctrine/DateTimeImmutableType.php" \
       "carbonphp/carbon-doctrine-types/src/Carbon/Doctrine/DateTimeImmutable.php"
fi

if [ -f "carbonphp/carbon-doctrine-types/src/Carbon/Doctrine/CarbonTypeConverter.php" ]; then
    mv "carbonphp/carbon-doctrine-types/src/Carbon/Doctrine/CarbonTypeConverter.php" \
       "carbonphp/carbon-doctrine-types/src/Carbon/Doctrine/TypeConverter.php"
fi

if [ -f "carbonphp/carbon-doctrine-types/src/Carbon/Doctrine/CarbonImmutableType.php" ]; then
    mv "carbonphp/carbon-doctrine-types/src/Carbon/Doctrine/CarbonImmutableType.php" \
       "carbonphp/carbon-doctrine-types/src/Carbon/Doctrine/CarbonImmutable.php"
fi

echo "File renaming completed!"
echo "Please run 'composer dump-autoload' in the laravel-blog directory to update the autoloader."