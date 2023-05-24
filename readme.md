# Contact Form Departments Extension for Magento

Contact Form Departments extension for Magento extends default contact form by adding departments field that helps you sort all incoming contact emails. Easily add any number of contact departments - specify department name, email address to receive emails and set display order within select field for each department. From now on, contact emails will be sent to specified department email address.

![Screenshot](http://i.imgur.com/jYm010D.jpg)

#### Frontend Features

- Easily add, edit and set order to any number of contact departments;
- Control the departments field title - just change the title configuration field value;
- Add a "call-to-select" option in departments select or let the first one be the default choice.

#### Admin Features

- Seamless integration - feels like departments feature is part of Magento core;
- Need to disable contact departments feature - 3 mouse clicks and you are good to go;
- Store view level settings - specify email departments for each store or use same for all.

#### General Features

- No extension conflicts - built without a single core class rewrite;
- Well structured and commented code, not a bit of it is encrypted, follows best practices;
- Clean, lightweight and extendable solution - perfect starting point for custom functionality.

## Compatibility
Magento Community: 1.7.x - 1.9.x, Magento Enterprise: 1.12.x - 1.14.x

## Configuration

To avoid any template conflicts and broken contact forms for existing Magento stores, installation requires a change in your current theme’s contact form template file. Find the contact form template file within your current package and theme: `app/design/frontend/[package]/[theme]/template/contacts/form.phtml` and add following line into form tag - right after any of closing `</li>` tags, but before closing `</ul>` tag: 
`<?php echo $this->getChildHtml('departments') ?>`

Navigate to "System -> Configuration -> General -> Contacts" and open "Departments" section. Add your departments in "Departments" field by clicking "Add Department" button and set "Enable Departments" configuration field value to "Yes". Adjust the rest of config fields according to your needs. From now on, contact emails will be sent to specified department’s email address.

To add department email to contacts email template, use `{{var data.departmentEmail}}` template variable - it will output the department email customer had selected in contacts form.

![Screenshot](http://i.imgur.com/XDrp8HQ.jpg)
Extension developed by [Raivis Vitols](https://raivis.com/).
