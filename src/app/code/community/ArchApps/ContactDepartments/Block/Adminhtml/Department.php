<?php
/**
 * @category    ArchApps
 * @package     ArchApps_ContactDepartments
 * @copyright   Copyright 2016 ArchApps (https://archapps.io)
 * @license     https://opensource.org/licenses/osl-3.0.php OSL 3.0
 */

class ArchApps_ContactDepartments_Block_Adminhtml_Department
    extends Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract
{
    /**
     * Add contact department columns, set template, add values.
     */
    public function __construct()
    {
        /** @var ArchApps_ContactDepartments_Helper_Data $helper */
        $helper = Mage::helper('archapps_contactdepartments');

        $this->addColumn('name', array(
            'style' => 'width:200px',
            'label' => $helper->__('Department Name'),
        ));

        $this->addColumn('email', array(
            'style' => 'width:200px',
            'label' => $helper->__('Email'),
        ));

        $this->addColumn('position', array(
            'style' => 'width:80px',
            'label' => $helper->__('Sort Order'),
        ));

        $this->_addButtonLabel = $helper->__('Add Department');
        $this->_addAfter = false;
        parent::__construct();
    }
}