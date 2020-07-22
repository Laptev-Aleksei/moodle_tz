<?php
/**
 * Created by PhpStorm.
 * User: lex
 * Date: 2020-07-21
 * Time: 01:26
 */

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once($CFG->dirroot.'/course/moodleform_mod.php');
require_once($CFG->dirroot.'/mod/test/lib.php');

class mod_test_mod_form extends moodleform_mod {

    function definition()
    {
        global $CFG, $DB, $OUTPUT, $PAGE;

        $mform =& $this->_form;

        $mform->addElement('text', 'name', get_string('labeltext', 'test'), array('size' => '64'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');


        $mform->addElement('select', 'valselect', get_string('selecttext', 'test'), array(
            '1' => 'Value №1',
            '2' => 'Value №2',
            '3' => 'Value №3'));
        $mform->setType('select', PARAM_TEXT);
        $mform->setDefault('select', 'def_value');

        $mform->addElement('date_selector', 'valdate', get_string('datetext', 'test'));

        $this->standard_coursemodule_elements();

        $this->add_action_buttons();
    }
}
