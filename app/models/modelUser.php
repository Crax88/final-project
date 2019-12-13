<?php

class modelUser
{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function register() {
        // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'success' => false,
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'pwd' => trim($_POST['password']),
            'rePwd' => trim($_POST['rePassword']),
            'name_error' => '',
            'email_error' => '',
            'pwd_error' => '',
            'rePwd_error' => ''
        ];
        if (empty($data['name'])) {
            $data['name_error'] = 'Please enter your name';
        }
        $data = $this->validateEmail($data);
        $data = $this->validatePassword($data);

        if (empty($data['email_error']) && empty($data['pwd_error']) && empty($data['rePwd_error']) && empty($data['name_error'])) {
            $this->db->query('INSERT INTO users (name, email, password, status, role_id) VALUES (:name, :email, :password, :status, :role_id)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', password_hash($data['pwd'], PASSWORD_DEFAULT));
            $this->db->bind(':status', 0);
            $this->db->bind(':role_id', 1);
            
            if ($this->db->exec()) {
                $data['success'] = true;
            } 
        }
        return $data;
    }

    public function login() {
        $data = [
            'success' => false,
            'email' => trim($_POST['email']),
            'pwd' => trim($_POST['password']),
            'email_error' => '',
            'pwd_error' => '',
        ];
        $user = $this->findUserByEmail($data['email']);

        if ($user && password_verify($data['pwd'], $user->password) && $user->status == 0) {
            $token = sha1(time() . random_int(0, PHP_INT_MAX));
            $this->db->query('UPDATE users SET token = :token WHERE id = :id');
            $this->db->bind(':token', $token);
            $this->db->bind(':id', $user->id);
            $this->db->exec();
            $user = $this->findUserByEmail($data['email']);
            $privileges = $this->getPrivileges($user->id);
            if (!empty($privileges)) {
                foreach ($privileges as $privilege) {
                    $user->privileges[] = $privilege->Privileg;
                }
            }
            $this->createUserSession($user);
            $data['success'] = true;
        } else {
            $data['email_error'] = 'Email or password is invalid';
            $data['pwd_error'] = 'Email or password is invalid';
        }

        return $data;
    }

    public function logOut() {
        $this->db->query('UPDATE users SET token = :token WHERE id = :id');
        $this->db->bind(':token', '');
        $this->db->bind(':id', $_SESSION['user_id']);
        $this->db->exec();
        $this->destroyUserSession();
    }

    public function findUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $user = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return $user;
        } else {
            return false;
        }
    }

    public function getUser($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $user = $this->db->single();
        return $user;
    }


    protected function validateEmail($data) {
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email_error'] = 'Please enter a valid email address';
        } elseif ($this->findUserByEmail($data['email'])) {
            $data['email_error'] = 'Email already registered';
        }
        return $data;
    }

    protected function validatePassword($data) {
        $upperCase = preg_match('#[A-Z]#', $data['pwd']);
        $lowerrCase = preg_match('#[a-z]#', $data['pwd']);
        $number = preg_match('#[0-9]#', $data['pwd']);
        $specialChars = preg_match('#[^\w]#', $data['pwd']);
        if (empty($data['pwd'])) {
            $data['pwd_error'] = 'Please enter a password';
        }
        if (!$upperCase || !$lowerrCase || !$number || !$specialChars || strlen($data['pwd']) < 8) {
            $data['pwd_error'] = "Password should be at least 8 characters long and should include at least one upper case letter, one number, and one special character";
        }
        if ($data['pwd'] != $data['rePwd']) {
            $data['rePwd_error'] = 'Passwords do not match';
        }
        return $data;
    }
    protected function getPrivileges($id) {
        $this->db->query('SELECT p.privileg_name as Privileg
                          FROM privileges p
                            INNER JOIN role_has_privileg rhp ON p.id = rhp.privileg_id
                            INNER JOIN users u ON rhp.role_id = u.role_id
                            WHERE u.id = :id
                        ');
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    protected function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['token'] = $user->token;
        $_SESSION['status'] = $user->status;
        $_SESSION['role_id'] = $user->role_id;
        $_SESSION['privileges'] = $user->privileges;
        setcookie('token', $user->token, time() + 86400*365, '/', '', false, true);
    }

    protected function destroyUserSession() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        unset($_COOKIE['token']);
    }
}