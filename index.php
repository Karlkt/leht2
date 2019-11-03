<?php

require_once 'vendor/tpl.php';
require_once 'Request.php';
require_once 'contact_functions2.php';

$rq = new Request($_REQUEST);

$cmd = $rq->param('cmd')
    ? $rq->param('cmd')
    : 'list';
$firstName = $rq->param('firstName')
    ? $rq->param('firstName')
    : '';
$lastName = $rq->param('lastName')
    ? $rq->param('lastName')
    : '';
$phone = $rq->param('phone')
    ? $rq->param('phone')
    : '';

if ($cmd === 'add') {
    print(renderTemplate('templates/add.html'));
} else if ($cmd === 'list') {
    print(renderTemplate('templates/list.html'));
} else if ($cmd === 'addPerson') {
    addPerson($firstName, $lastName, $phone);
    $people = viewPeople();
    $data = ["people" => $people];
    print(renderTemplate('templates/list.html', $data));
}
