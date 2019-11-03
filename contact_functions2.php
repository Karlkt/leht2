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

const data = "data.txt";
function addPerson($firstName, $lastName, $phone) {
    $add = $firstName . "||" . $lastName . "||" . $phone;
    file_put_contents(data,
        str_replace("\n", '', nl2br(htmlentities($add))) . PHP_EOL, FILE_APPEND);
}
function viewPeople() {
    $info = file(data);
    $people = [];

    foreach ($info as $line) {
        list ($firstName, $lastName, $phone) = explode("||", $line);
        $people[] = new Person(
            html_entity_decode($firstName),
            html_entity_decode($lastName),
            html_entity_decode($phone)
        );
    }
    return $people;
}