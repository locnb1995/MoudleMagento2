<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 26-Apr-18
 * Time: 2:18 PM
 */

namespace Loc\Post\Setup;


use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{

    /**
     * Upgrades data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    protected $_postFactory;

    public function __construct(\Loc\Post\Model\PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        // TODO: Implement upgrade() method.
        if (version_compare($context->getVersion(), '1.2.0', '<')) {
            $data = [
                'title'         => "Demo Post",
                'post_description' => "Posts are automatically generated",
                'image'      => 'image5.jpg',
                'status'       => 1
            ];
            $post = $this->_postFactory->create();
            $post->addData($data)->save();
        }
    }
}