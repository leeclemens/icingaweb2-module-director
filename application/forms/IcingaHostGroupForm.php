<?php

namespace Icinga\Module\Director\Forms;

use Icinga\Module\Director\Web\Form\DirectorObjectForm;

class IcingaHostGroupForm extends DirectorObjectForm
{
    public function setup()
    {
        $this->addHidden('object_type', 'object');

        $this->addElement('text', 'object_name', array(
            'label'       => $this->translate('Hostgroup'),
            'required'    => true,
            'description' => $this->translate('Icinga object name for this host group')
        ));

        $this->addGroupDisplayNameElement()
             ->setButtons();
        $this->addAssignmentElements();
    }

    public function addAssignmentElements()
    {
        $sub = new AssignListSubForm();
        $sub->setObject($this->object());
        $sub->setup();
        $sub->setOrder(30);

        $this->addSubForm($sub, 'assignlist');

        return $this;
    }
}
