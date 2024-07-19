<?php
class Customers {
    public $Customer_ID;
    public $Customer_Name;
    public $Email;
    public $phone_number;
    public $password;
    // Constructor to initialize the movie object
    public $role;
    public function __construct(
        $Customer_ID,
        $Customer_Name, 
        $Email, 
        $phone_number, 
        $password,
        $role
        )
        {
        $this->Customer_ID = $Customer_ID;
        $this->Customer_Name = $Customer_Name;
        $this->Email = $Email;
        $this->phone_number = $phone_number;
        $this->password = $password;
        $this->role=$role;
    }
}
?>
