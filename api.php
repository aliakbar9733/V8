<?php
if (@$_POST['type'] == "c_user") {
    echo json_encode($_POST);
    die;
}