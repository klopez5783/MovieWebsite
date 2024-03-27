<?php
function validate_username($field)
{
    if ($field == "") return "No Username was entered<br>";
    else if (strlen($field) < 5)
    return "Usernames must be at least 5 characters<br>";
    else if (preg_match("/[^a-zA-Z0-9_-]/", $field))
    return "Only letters, numbers, - and _ in usernames<br>";
    return "";		
}
function validate_password($field)
{
    if ($field == "") return "No Password was entered<br>";
    else if (strlen($field) < 6)
    return "Passwords must be at least 6 characters<br>";
    else if (!preg_match("/[a-z]/", $field) ||
            !preg_match("/[A-Z]/", $field) ||
            !preg_match("/[0-9]/", $field))
    return "Passwords require 1 each of a-z, A-Z and 0-9<br>";
    return "";
}
function validate_email($field)
{
    if ($field == "") return "No Email was entered<br>";
    else if (!((strpos($field, ".") > 0) &&
                (strpos($field, "@") > 0)) ||
                preg_match("/[^a-zA-Z0-9.@_-]/", $field))
        return "The Email address is invalid<br>";
    return "";
}
?>