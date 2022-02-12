<?php

class Admin
{
    private $login;
    private $role;



    public function __construct($l, $r){
        $this->role = $r;
        $this->login = $l;
    }
/**
 * @return mixed
 */
public function getLogin()
{
    return $this->login;
}/**
 * @param mixed $login
 */
public function setLogin($login)
{
    $this->login = $login;
}/**
 * @return mixed
 */
public function getRole()
{
    return $this->role;
}/**
 * @param mixed $role
 */
public function setRole($role)
{
    $this->role = $role;
}

}
?>