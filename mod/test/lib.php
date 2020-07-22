<?php
/**
 * Created by PhpStorm.
 * User: lex
 * Date: 2020-07-21
 * Time: 01:26
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/calendar/lib.php');


function test_add_instance(stdClass $test) {
    global $DB;
    $test->timecreated = time(); $test->timemodified = $test->timecreated;
    $returnid = $DB->insert_record('test', $test);

    $event = new stdClass();
    $event->type        = CALENDAR_EVENT_TYPE_ACTION;
    $event->name        = $test->name;
    $event->description = format_module_intro('test', $test, $test->coursemodule);
    $event->courseid    = $test->course;
    $event->groupid     = 0;
    $event->userid      = 0;
    $event->modulename  = 'test';
    $event->instance    = $returnid;
    $event->timestart   = $test->valdate;
    $event->timesort    = $test->valdate;
    $event->timeduration = 0;

    calendar_event::create($event);

    return $returnid;
}

function test_update_instance(stdClass $test){
    global $DB;
    $test->timemodified = time();
    $test->id = $test->instance;
    try {
        return $DB->update_record('test', $test);
    } catch (dml_exception $e) {
    }
}

function test_delete_instance($id) {
    global $DB;
    try {
        if (!$test = $DB->get_record('test', array('id' => $id))) {
            return false;
        }
    } catch (dml_exception $e) {
    }
    $DB->delete_records('test', array('id' => $test->id));
    return true;
}