<?php
class database
{
    protected $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect("localhost", "root", "", "mangement_food");
    }
}
?>