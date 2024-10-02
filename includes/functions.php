<?php
require 'app.php';

function includeTemplate($name, $header_text) {
    include TEMPLATES_URL . "/${name}.php";
}
