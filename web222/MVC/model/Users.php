<?php
namespace model;
class Users
{
    public $BirthDay;
    public $PasswordHashUser;
    public $EmailUser;
    public $FullNameUser;
    public $PhoneNumberUser;
    public $RoleUser;


    public function __construct($n, $b, $p, $ph, $e,$r)
    {
        $this->BirthDay = $n;
        $this->PasswordHashUser = $b;
        $this->EmailUser = $p;
        $this->FullNameUser = $ph;
        $this->PhoneNumberUser = $e;
        $this->RoleUser = $r;
    }
}
