<?php
/**
 * @category    ArchApps
 * @package     ArchApps_ContactFormDepartments
 * @license     https://opensource.org/licenses/osl-3.0.php OSL 3.0
 */

class ArchApps_ContactFormDepartments_Model_Observer
{
    /**
     * Set contact form recipient email to one specified in the department
     *
     * @param Varien_Event_Observer $observer Default event observer object
     */
    public function setDepartmentRecipient(Varien_Event_Observer $observer)
    {
        /** @var ArchApps_ContactFormDepartments_Helper_Data $helper */
        $helper = Mage::helper('archapps_contactformdepartments');

        if (!$helper->isEnabled()) {
            return;
        }

        /** @var Mage_Contacts_IndexController $controller Contacts */
        $controller = $observer->getEvent()->getControllerAction();
        $key = $controller->getRequest()->getPost('department');

        if (!$key) {
            return;
        }

        if ($recipient = $helper->getDepartmentEmail($key)) {
            $path = Mage_Contacts_IndexController::XML_PATH_EMAIL_RECIPIENT;
            // Set new department email address to specified config node
            Mage::app()->getStore()->setConfig($path, $recipient);
        }
    }
}
