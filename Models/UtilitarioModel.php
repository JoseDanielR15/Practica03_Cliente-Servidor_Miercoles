<?php

function OpenDatabase()
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return mysqli_connect("127.0.0.1:3306","root","","practicas13");
}

function CloseDatabase($context)
{
    mysqli_close($context);
}