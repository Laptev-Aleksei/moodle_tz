<?php

require('../../config.php');
require_once('lib.php');

$id = required_param('id', PARAM_INT);
list ($course, $cm) = get_course_and_cm_from_cmid($id, 'test');
$test = $DB->get_record('test', array('id'=> $cm->instance), '*', MUST_EXIST);

require_login($course, true, $cm);
$PAGE->set_url('/mod/test/view.php', array('id' => $cm->id)); $PAGE->set_title(format_string($test->name)); $PAGE->set_heading(format_string($course->fullname));
echo $OUTPUT->header();
echo $OUTPUT->heading($test->name);
echo $OUTPUT->box('Value select: ' . $test->valselect);
$date = $test->valdate;
$date_mas = getdate($date);
echo $OUTPUT->box('Date: ' . $date_mas['mday'] . '.' . $date_mas['mon'] . '.' . $date_mas['year']);
echo $OUTPUT->footer();