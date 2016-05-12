<?php
/**
 * @category    ArchApps
 * @package     ArchApps_ContactFormDepartments
 * @license     https://opensource.org/licenses/osl-3.0.php OSL 3.0
 */

class ArchApps_ContactFormDepartments_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_ENABLED      = 'contacts/departments/enabled';
    const XML_PATH_DEPARTMENTS  = 'contacts/departments/departments';
    const XML_PATH_SELECT_LABEL = 'contacts/departments/select_label';

    const XML_PATH_SHOW_PLACEHOLDER = 'contacts/departments/show_placeholder_option';
    const XML_PATH_PLACEHOLDER_TEXT = 'contacts/departments/placeholder_option_text';

    /**
     * Whether departments feature is enabled for contact form
     *
     * @return mixed
     */
    public function isEnabled()
    {
        return Mage::getStoreConfig(self::XML_PATH_ENABLED);
    }

    /**
     * Gets un-serialized array of all contacts departments
     *
     * @return mixed
     */
    public function getDepartments()
    {
        $departments = unserialize(
            Mage::getStoreConfig(self::XML_PATH_DEPARTMENTS)
        );

        if ($departments) {
            uasort($departments, array(get_class($this), '_sortDepartments'));
        }

        return $departments;
    }

    /**
     * Returns target department email or false if email is not found
     *
     * @param $departmentKey string Department key to lookup email by
     * @return bool|string
     */
    public function getDepartmentEmail($departmentKey)
    {
        foreach ($this->getDepartments() as $key => $department) {
            if ($key == $departmentKey) {
                return $department['email'];
            }
        }

        return false;
    }

    /**
     * Returns specified label to be displayed for department select
     *
     * @return mixed
     */
    public function getSelectLabel()
    {
        return Mage::getStoreConfig(self::XML_PATH_SELECT_LABEL);
    }

    /**
     * Whether to display placeholder option in departments select
     *
     * @return mixed
     */
    public function getShowPlaceholderOption()
    {
        return Mage::getStoreConfig(self::XML_PATH_SHOW_PLACEHOLDER);
    }

    /**
     * Whether to display placeholder option in departments select
     *
     * @return mixed
     */
    public function getPlaceholderOptionText()
    {
        return Mage::getStoreConfig(self::XML_PATH_PLACEHOLDER_TEXT);
    }

    /**
     * Method used to sort departments array based on their position data
     *
     * @param $departmentA array Department data
     * @param $departmentB array Department data
     * @return mixed
     */
    private static function _sortDepartments($departmentA, $departmentB)
    {
        return $departmentA['position'] - $departmentB['position'];
    }
}
