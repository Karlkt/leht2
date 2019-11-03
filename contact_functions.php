<?php

class person {
    public $firstName;
    public $lastName;
    public $phone;

    public function __construct($firstName, $lastName, $phone) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
    }

}

function addPerson($firstName, $lastName, $phone) {
    $info = urlencode($firstName) . ";" . urlencode($lastName) . ";" . urlencode($phone) . PHP_EOL;

    $myfile = fopen("data.txt", "w");
    fwrite($myfile, $info);
}

function viewPeople() {
    $info = file("data.txt", FILE_IGNORE_NEW_LINES);

    $people = [];
    foreach ($info as $line) {
        list ($firstName, $lastName, $phone) = explode(";", $line);
        $people[] = new Person(urldecode($firstName), urldecode($lastName), urldecode($phone));
    }
    return $people;
}
