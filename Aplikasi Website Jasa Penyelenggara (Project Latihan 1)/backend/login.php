<?php

class Login {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function login($username, $password) {

        try {

            $username = htmlspecialchars(strip_tags($username));
            $sql = "SELECT id_user, username, password FROM user WHERE username = '$username' AND password = '$password' LIMIT 1";
            $result = $this->db->fetchData($sql);

            if (count ($result) == 0) { // User tidak ditemukan

                return false;
            }

            else {
                return $result[0];
            }

        } 
        
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); // Menampilkan pesan error
            return false;
        }
    }
}


class Session {

    public static function start() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Melakukan set timeout session jika nonaktif selama 1 jam
        $timeout = 3600; 
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeout)) {
            self::destroy();
            header("Location: index.php");
            exit();
        }
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function destroy() {
        session_unset();
        session_destroy();
    }
}

?>
