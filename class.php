<?php

class User {
    var $name;
    var $age;

    public function setName($value) {
        $this->name = $value;
    }

    public function setAge($value) {
        $this->age = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }
}

$me = new User();
$me->setName('Hmmm');
$me->setAge('18 for legal reasons');
print($me->getName() . "\n");
print($me->getAge() . "\n");

?>