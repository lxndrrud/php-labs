<?php 

class lab2_User {
    public $login;
    public $name;
    public $password;

    public function getInfo() {
        echo "<p>"
            . "Логин: " . $this->login . "; Имя: " . $this->name . "; Пароль: " . $this->password . 
            ";</p>";
    }
}

$users = array();
for($i = 1; $i < 4; $i++) {
    $user = new lab2_User();
    $user->login = "login_user" . $i;
    $user->name = "name_user" . $i;
    $user->password = "password_user" . $i;
    array_push($users, $user);
}

foreach($users as $user) {
    $user->getInfo();
}

