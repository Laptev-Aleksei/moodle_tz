<?php
/**
 * Created by PhpStorm.
 * User: lex
 * Date: 2020-07-21
 * Time: 01:27
 */


defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_configtext('test/url', get_string('url', 'test'), False, 'http://localhost'));

}