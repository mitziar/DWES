<?php
$hashed = hash('sha512', 'administrador');
echo $hashed;


function isValidLogin($username, $password) {
    $sql = $this->connect();
    $sql->real_escape_string($username);
    $sql->real_escape_string($password);

    $res = $sql->query("SELECT password FROM users WHERE name='".$username."'");

    if ($res->num_rows >= 1) {
        while($row = $res->fetch_assoc()) {
            if (password_verify(hash('sha512', $password), $row['password'])) {
                return true;
            }
        }
    }

    return false;
}
?>