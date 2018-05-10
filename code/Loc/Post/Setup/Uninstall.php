<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 26-Apr-18
 * Time: 2:20 PM
 */

namespace Loc\Post\Setup;


use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UninstallInterface;

class Uninstall implements UninstallInterface
{

    /**
     * Invoked when remove-data flag is set during module uninstall.
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        // TODO: Implement uninstall() method.
        $installer = $setup;
        $installer->startSetup();

        $installer->getConnection()->dropTable($installer->getTable('loc_post_post'));

        $installer->endSetup();
    }
}