<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 26-Apr-18
 * Time: 2:11 PM
 */

namespace Loc\Post\Setup;


use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{

    /**
     * Installs data for a module
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

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        // TODO: Implement install() method.
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