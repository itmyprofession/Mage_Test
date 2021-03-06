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
 * @category    Magento
 * @package     Mage_Catalog
 * @subpackage  Test
 * @copyright   Copyright (c) 2012 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Mage_Catalog_Test_Block_Layer_View extends Mage_Test_Unit_Case
{
    /**
     * @magentoAppIsolation enabled
     * @magentoDataFixture Mage/Catalog/_files/categories.php
     * @magentoDataFixture Mage/Catalog/_files/filterable_attributes.php
     */
    public function testGetFilters()
    {
        $currentCategory = new Mage_Catalog_Model_Category;
        $currentCategory->load(3);

        /** @var $layer Mage_Catalog_Model_Layer */
        $layer = Mage::getSingleton('Mage_Catalog_Model_Layer');
        $layer->setCurrentCategory($currentCategory);

        $layout = new Mage_Core_Model_Layout();
        $block = $layout->createBlock('Mage_Catalog_Block_Layer_View', 'block');

        $filters = $block->getFilters();

        $this->assertInternalType('array', $filters);
        $this->assertGreaterThan(3, count($filters)); // At minimum - category filter + 2 fixture attribute filters

        $found = false;
        foreach ($filters as $filter) {
            if ($filter instanceof Mage_Catalog_Block_Layer_Filter_Category) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, 'Category filter must be present');

        $attributeCodes = array('filterable_attribute_a', 'filterable_attribute_b');
        foreach ($attributeCodes as $attributeCode) {
            $found = false;
            foreach ($filters as $filter) {
                if (!($filter instanceof Mage_Catalog_Block_Layer_Filter_Attribute)) {
                    continue;
                }
                if ($attributeCode == $filter->getAttributeModel()->getAttributeCode()) {
                    $found = true;
                    break;
                }
            }
            $this->assertTrue($found, "Filter for attribute {$attributeCode} must be present");
        }
    }
}
