<?php
/**
 * @category    Mage_Test
 * @package     Mage_Test
 * @subpackage  Dataflow 
 * @copyright   Copyright (c) 2013 Mage+ Ltd. (http://www.mageplus.org)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Mage_Dataflow_Test_Model_Session extends Mage_Test_Unit_Case
{
    /**
     * @var Mage_Dataflow_Model_Session
     */
    protected $_model;

    protected function setUp()
    {
        $this->_model = new Mage_Dataflow_Model_Session();
    }

}

