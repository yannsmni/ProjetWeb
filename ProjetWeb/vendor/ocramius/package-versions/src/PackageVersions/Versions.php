<?php

declare(strict_types=1);

namespace PackageVersions;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    public const ROOT_PACKAGE_NAME = '__root__';
    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    public const VERSIONS          = array (
  'doctrine/annotations' => 'v1.8.0@904dca4eb10715b92569fbcd79e201d5c349b6bc',
  'doctrine/cache' => 'v1.8.1@d4374ae95b36062d02ef310100ed33d78738d76c',
  'doctrine/collections' => 'v1.6.2@c5e0bc17b1620e97c968ac409acbff28b8b850be',
  'doctrine/common' => 'v2.11.0@b8ca1dcf6b0dc8a2af7a09baac8d0c48345df4ff',
  'doctrine/dbal' => 'v2.10.0@0c9a646775ef549eb0a213a4f9bd4381d9b4d934',
  'doctrine/doctrine-bundle' => '1.11.2@28101e20776d8fa20a00b54947fbae2db0d09103',
  'doctrine/doctrine-cache-bundle' => '1.3.5@5514c90d9fb595e1095e6d66ebb98ce9ef049927',
  'doctrine/doctrine-migrations-bundle' => 'v2.0.0@4c9579e0e43df1fb3f0ca29b9c20871c824fac71',
  'doctrine/event-manager' => 'v1.0.0@a520bc093a0170feeb6b14e9d83f3a14452e64b3',
  'doctrine/inflector' => 'v1.3.0@5527a48b7313d15261292c149e55e26eae771b0a',
  'doctrine/instantiator' => '1.2.0@a2c590166b2133a4633738648b6b064edae0814a',
  'doctrine/lexer' => '1.1.0@e17f069ede36f7534b95adec71910ed1b49c74ea',
  'doctrine/migrations' => '2.1.1@a89fa87a192e90179163c1e863a145c13337f442',
  'doctrine/orm' => 'v2.6.4@b52ef5a1002f99ab506a5a2d6dba5a2c236c5f43',
  'doctrine/persistence' => '1.1.1@3da7c9d125591ca83944f477e65ed3d7b4617c48',
  'doctrine/reflection' => 'v1.0.0@02538d3f95e88eb397a5f86274deb2c6175c2ab6',
  'egulias/email-validator' => '2.1.11@92dd169c32f6f55ba570c309d83f5209cefb5e23',
  'fig/link-util' => '1.0.0@1a07821801a148be4add11ab0603e4af55a72fac',
  'fzaninotto/faker' => 'v1.8.0@f72816b43e74063c8b10357394b6bba8cb1c10de',
  'jdorn/sql-formatter' => 'v1.2.17@64990d96e0959dff8e059dfcdc1af130728d92bc',
  'monolog/monolog' => '1.25.1@70e65a5470a42cfec1a7da00d30edb6e617e8dcf',
  'ocramius/package-versions' => '1.5.1@1d32342b8c1eb27353c8887c366147b4c2da673c',
  'ocramius/proxy-manager' => '2.2.3@4d154742e31c35137d5374c998e8f86b54db2e2f',
  'phpdocumentor/reflection-common' => '2.0.0@63a995caa1ca9e5590304cd845c15ad6d482a62a',
  'phpdocumentor/reflection-docblock' => '4.3.2@b83ff7cfcfee7827e1e78b637a5904fe6a96698e',
  'phpdocumentor/type-resolver' => '1.0.1@2e32a6d48972b2c1976ed5d8967145b6cec4a4a9',
  'psr/cache' => '1.0.1@d11b50ad223250cf17b86e38383413f5a6764bf8',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/link' => '1.0.0@eea8e8662d5cd3ae4517c9b864493f59fca95562',
  'psr/log' => '1.1.2@446d54b4cb6bf489fc9d75f55843658e6f25d801',
  'sensio/framework-extra-bundle' => 'v5.5.1@dfc2c4df9f7d465a65c770e9feb578fe071636f7',
  'swiftmailer/swiftmailer' => 'v6.2.1@5397cd05b0a0f7937c47b0adcb4c60e5ab936b6a',
  'symfony/asset' => 'v4.3.6@3f97e57596884f7b9158d564a533112a0d19dbdd',
  'symfony/cache' => 'v4.3.6@30a51b2401ee15bfc7ea98bd7af0f9d80e26e649',
  'symfony/cache-contracts' => 'v1.1.7@af50d14ada9e4e82cfabfabdc502d144f89be0a1',
  'symfony/config' => 'v4.3.6@f4ee0ebb91b16ca1ac105aa39f9284f3cac19a15',
  'symfony/console' => 'v4.3.6@136c4bd62ea871d00843d1bc0316de4c4a84bb78',
  'symfony/debug' => 'v4.3.6@5ea9c3e01989a86ceaa0283f21234b12deadf5e2',
  'symfony/dependency-injection' => 'v4.3.6@fc036941dfafa037a7485714b62593c7eaf68edd',
  'symfony/doctrine-bridge' => 'v4.3.6@2c1397c1ec5b0112e78aec8ef8325d449eb414d7',
  'symfony/dotenv' => 'v4.3.6@62d93bf07edd0d76f033d65a7fd1c1ce50d28b50',
  'symfony/event-dispatcher' => 'v4.3.6@6229f58993e5a157f6096fc7145c0717d0be8807',
  'symfony/event-dispatcher-contracts' => 'v1.1.7@c43ab685673fb6c8d84220c77897b1d6cdbe1d18',
  'symfony/expression-language' => 'v4.3.6@d81f0eb914f534e8b17a9db8c2408d1f0cf55fd2',
  'symfony/filesystem' => 'v4.3.6@9abbb7ef96a51f4d7e69627bc6f63307994e4263',
  'symfony/finder' => 'v4.3.6@72a068f77e317ae77c0a0495236ad292cfb5ce6f',
  'symfony/flex' => 'v1.4.6@133e649fdf08aeb8741be1ba955ccbe5cd17c696',
  'symfony/form' => 'v4.3.6@1134c093d6fd339ea1b8823c50940607b58349f2',
  'symfony/framework-bundle' => 'v4.3.6@f93b4202207a85822d4ee2cb62e9805e4ea95006',
  'symfony/http-client' => 'v4.3.6@9aea44c00dee78844f18c345009ef3f0fb3e1d0f',
  'symfony/http-client-contracts' => 'v1.1.7@353b2a3e907e5c34cf8f74827a4b21eb745aab1d',
  'symfony/http-foundation' => 'v4.3.6@38f63e471cda9d37ac06e76d14c5ea2ec5887051',
  'symfony/http-kernel' => 'v4.3.6@56acfda9e734e8715b3b0e6859cdb4f5b28757bf',
  'symfony/inflector' => 'v4.3.6@fc488a52c79b2bbe848fa9def35f2cccb47c4798',
  'symfony/intl' => 'v4.3.6@818771ff6acef04cdce05023ddfc39b7078014bf',
  'symfony/mime' => 'v4.3.6@3c0e197529da6e59b217615ba8ee7604df88b551',
  'symfony/monolog-bridge' => 'v4.3.6@6b9d84b34e0c2c5d9d4f4dbd5f36b0c9e4e5ef93',
  'symfony/monolog-bundle' => 'v3.4.0@7fbecb371c1c614642c93c6b2cbcdf723ae8809d',
  'symfony/options-resolver' => 'v4.3.6@f46c7fc8e207bd8a2188f54f8738f232533765a4',
  'symfony/orm-pack' => 'v1.0.7@c57f5e05232ca40626eb9fa52a32bc8565e9231c',
  'symfony/polyfill-intl-icu' => 'v1.12.0@66810b9d6eb4af54d543867909d65ab9af654d7e',
  'symfony/polyfill-intl-idn' => 'v1.12.0@6af626ae6fa37d396dc90a399c0ff08e5cfc45b2',
  'symfony/polyfill-mbstring' => 'v1.12.0@b42a2f66e8f1b15ccf25652c3424265923eb4f17',
  'symfony/polyfill-php72' => 'v1.12.0@04ce3335667451138df4307d6a9b61565560199e',
  'symfony/polyfill-php73' => 'v1.12.0@2ceb49eaccb9352bff54d22570276bb75ba4a188',
  'symfony/process' => 'v4.3.6@3b2e0cb029afbb0395034509291f21191d1a4db0',
  'symfony/property-access' => 'v4.3.6@bb0c302375ffeef60c31e72a4539611b7f787565',
  'symfony/property-info' => 'v4.3.6@e91cb19058c768ed3a1a1e321f5c9e227612981d',
  'symfony/routing' => 'v4.3.6@63a9920cc86fcc745e5ea254e362f02b615290b9',
  'symfony/security-bundle' => 'v4.3.6@d295626ee5294dde825efa4ef5be5c65a37f21b3',
  'symfony/security-core' => 'v4.3.6@8c46ea77fe0738f2495eacc08fa34e1e19ff0b0d',
  'symfony/security-csrf' => 'v4.3.6@0760ec651ea8ff81e22097780337e43f3a795769',
  'symfony/security-guard' => 'v4.3.6@62cc82a384f2c1c75c58189fcf713032f6fef1e9',
  'symfony/security-http' => 'v4.3.6@a2f67dfe0ecfb713734847f4ada0f4231e28ae71',
  'symfony/serializer' => 'v4.3.6@cb2d8c6e82b4966a5cc5762385e6e0f70ee1388a',
  'symfony/serializer-pack' => 'v1.0.2@c5f18ba4ff989a42d7d140b7f85406e77cd8c4b2',
  'symfony/service-contracts' => 'v1.1.7@ffcde9615dc5bb4825b9f6aed07716f1f57faae0',
  'symfony/stopwatch' => 'v4.3.6@1e4ff456bd625be5032fac9be4294e60442e9b71',
  'symfony/swiftmailer-bundle' => 'v3.3.0@6b895bc0a5e815d1bf2d444869415a7c752516aa',
  'symfony/translation' => 'v4.3.6@a3aa590ce944afb3434d7a55f81b00927144d5ec',
  'symfony/translation-contracts' => 'v1.1.7@364518c132c95642e530d9b2d217acbc2ccac3e6',
  'symfony/twig-bridge' => 'v4.3.6@67fdb93de3361bcf1ab02bd8275af8c790bae900',
  'symfony/twig-bundle' => 'v4.3.6@869ebf144acafd19fb9c8c386808c26624f28572',
  'symfony/validator' => 'v4.3.6@33ba80582cab3400c9aae66f5e58bb51d7412192',
  'symfony/var-exporter' => 'v4.3.6@d5b4e2d334c1d80e42876c7d489896cfd37562f2',
  'symfony/web-link' => 'v4.3.6@4bd0ce7c54d604300deee8eb1b1beda856fbba20',
  'symfony/yaml' => 'v4.3.6@324cf4b19c345465fad14f3602050519e09e361d',
  'twig/twig' => 'v2.12.1@ddd4134af9bfc6dba4eff7c8447444ecc45b9ee5',
  'webmozart/assert' => '1.5.0@88e6d84706d09a236046d686bbea96f07b3a34f4',
  'zendframework/zend-code' => '3.4.0@46feaeecea14161734b56c1ace74f28cb329f194',
  'zendframework/zend-eventmanager' => '3.2.1@a5e2583a211f73604691586b8406ff7296a946dd',
  'doctrine/data-fixtures' => 'v1.3.2@09b16943b27f3d80d63988d100ff256148c2f78b',
  'doctrine/doctrine-fixtures-bundle' => '3.2.2@90e4a4f968b2dae40e290a6ee516957af043f16c',
  'easycorp/easy-log-handler' => 'v1.0.9@224e1dfcf9455aceee89cd0af306ac097167fac1',
  'nikic/php-parser' => 'v4.2.5@b76bbc3c51f22c570648de48e8c2d941ed5e2cf2',
  'symfony/browser-kit' => 'v4.3.6@b14fa08508afd152257d5dcc7adb5f278654d972',
  'symfony/css-selector' => 'v4.3.6@f4b3ff6a549d9ed28b2b0ecd1781bf67cf220ee9',
  'symfony/debug-bundle' => 'v4.3.6@bb83f93785dae1f9c227a408ced3eb3f86399bf8',
  'symfony/debug-pack' => 'v1.0.7@09a4a1e9bf2465987d4f79db0ad6c11cc632bc79',
  'symfony/dom-crawler' => 'v4.3.6@4b9efd5708c3a38593e19b6a33e40867f4f89d72',
  'symfony/maker-bundle' => 'v1.14.2@5dfcbc400b168943f15a21d4283ad848605d9bc2',
  'symfony/phpunit-bridge' => 'v4.3.6@c216b32261358a820bb4217eb3a20e3f437a484e',
  'symfony/profiler-pack' => 'v1.0.4@99c4370632c2a59bb0444852f92140074ef02209',
  'symfony/test-pack' => 'v1.0.6@ff87e800a67d06c423389f77b8209bc9dc469def',
  'symfony/var-dumper' => 'v4.3.6@ea4940845535c85ff5c505e13b3205b0076d07bf',
  'symfony/web-profiler-bundle' => 'v4.3.6@6ce12ffe97d9e26091b0e7340a9d661fba64655e',
  'symfony/web-server-bundle' => 'v4.3.6@dc26b980900ddf3e9feade14e5b21c029e8ca92f',
  'paragonie/random_compat' => '2.*@5298c28fc4ea95b37e5dff1d7d927bd1ec4e92c3',
  'symfony/polyfill-ctype' => '*@5298c28fc4ea95b37e5dff1d7d927bd1ec4e92c3',
  'symfony/polyfill-iconv' => '*@5298c28fc4ea95b37e5dff1d7d927bd1ec4e92c3',
  'symfony/polyfill-php71' => '*@5298c28fc4ea95b37e5dff1d7d927bd1ec4e92c3',
  'symfony/polyfill-php70' => '*@5298c28fc4ea95b37e5dff1d7d927bd1ec4e92c3',
  'symfony/polyfill-php56' => '*@5298c28fc4ea95b37e5dff1d7d927bd1ec4e92c3',
  '__root__' => 'dev-dev@5298c28fc4ea95b37e5dff1d7d927bd1ec4e92c3',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     */
    public static function getVersion(string $packageName) : string
    {
        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new \OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}
