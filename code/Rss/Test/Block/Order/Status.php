<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Rss
 * @subpackage  integration_tests
 * @copyright   Copyright (c) 2012 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Mage_Rss_Test_Block_Order_Status extends Mage_Test_Unit_Case
{
    /**
     * @var Mage_Rss_Block_Order_Status
     */
    protected $_block;

    // constants required for integration tests
    const CLASS_GROUP_TYPE = parent::CLASS_GROUP_TYPE_BLOCK;
    const CLASS_ID = 'rss/block_order_status';

    protected function setUp()
    {
        $this->_block = new Mage_Rss_Block_Order_Status();
    }

    /**
    public function testToHtml()
    {
        $this->assertEmpty($this->_block->toHtml());

        $uniqid = uniqid();
        $order = $this->getMock('Varien_Object', array('formatPrice'), array(array('id' => $uniqid,)));
        Mage::register('current_order', $order);
        $this->assertContains($uniqid, $this->_block->toHtml());
    }
    */
}
