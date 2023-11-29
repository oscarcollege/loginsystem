<?php

class Banner {
    var $message = '';

    function __construct($msg) {
        $this->message = $msg;
    }

    function __toString() {
        return $this->message;
    }
}

?>