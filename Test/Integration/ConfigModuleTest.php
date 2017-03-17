<?php
/**
 * Space48_QuickView
 *
 * @category    Space48
 * @package     Space48_PromoSashes
 * @Date        02/2017
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * @author      @diazwatson
 */

declare(strict_types = 1);

namespace Space48\QuickView\Test\Integration;

use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\App\DeploymentConfig\Reader as DeploymentReader;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\Module\ModuleList;
use Magento\TestFramework\ObjectManager;

class ConfigModuleTest extends \PHPUnit_Framework_TestCase
{

    protected $moduleName = 'Space48_PromoSashes';

    public function testModuleIsRegistered()
    {
        $registrar = New ComponentRegistrar();

        $this->assertArrayHasKey($this->moduleName, $registrar->getPaths(ComponentRegistrar::MODULE));
    }

    public function testTheModuleIsConfiguredAndEnabledInTheTestEnvironment()
    {
        $objectManager = ObjectManager::getInstance();

        $moduleList = $objectManager->create(ModuleList::class);

        $this->assertTrue($moduleList->has($this->moduleName), 'Test is not enable in dev environment.');

    }

    public function testTheModuleIsConfiguredAndEnabledInTheRealEnvironment()
    {
        $objectManager = ObjectManager::getInstance();

        $dirList = $objectManager->create(DirectoryList::class, ['root' => BP]);

        $configReader = $objectManager->create(DeploymentReader::class, ['dirList' => $dirList]);

        $deploymentConfig = $objectManager->create(DeploymentConfig::class, ['reader' => $configReader]);

        $moduleList = $objectManager->create(ModuleList::class, ['config' => $deploymentConfig]);

        $this->assertTrue($moduleList->has($this->moduleName), 'Test is not enable in real environment.');

    }

}