<?php 

class lab4_1_User {
    public $login;
    public $name;
    public $password;

    public function __construct(string $login, string $name, string $password) {
        $this->login = $login;
        $this->name = $name;
        $this->password = $password;
    }

    public function __clone() {
        $new_user = $this;
        $new_user->name = "User";
        $new_user->login = "User";
        $new_user->password = "qwerty";
        return $new_user;
    }

    public function getInfo() {
        echo "<p>"
            . "Логин: " . $this->login . "; Имя: " . $this->name . "; Пароль: " . $this->password . 
            ";</p>";
    }
}

class SuperUser extends lab4_1_User {
    public $character;
}

$superuser = new SuperUser("boss", "boss", "cool");
$superuser->character = "admin";
$superuser->getInfo();
echo "<p>" . $superuser->character . "</p>";


