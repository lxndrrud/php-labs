<?php 

class lab3_User {
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

$users = array();
for($i = 1; $i < 4; $i++) {
    $user = new lab3_User("login_user" . $i, "name_user" . $i, "password_user" . $i);
    array_push($users, $user);
}

array_push($users, clone $users[0]);

foreach($users as $user) {
    
    $user->getInfo();
}

