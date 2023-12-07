<?php

class Banner {
    var $message;
    var $colour = 'green';

    function __construct($msg) {
        $this->message = $msg;
    }

    function __toString() {
        return "<div class='bg-{$this->colour}-950 text-{$this->colour}-700 p-4 m-3 drop-shadow-2xl border-black border-2'>{$this->message}</div>";
    }
}

class Alert extends Banner {
    var $colour = 'red';
}

?>