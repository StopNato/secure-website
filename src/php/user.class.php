<?php
class User {
    private $id = null;
    private $username = null;
    private $role = null;
    private $remoteAddr = null;
    public function __construct($id, $username, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->role = $role;
        $this->remoteAddr = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
    }
    public function getId() {
        return $this->id;
    }
    public function getUsername() {
        return $this->username;
    }
    public function getRole() {
        return $this->role;
    }
    public function getRemoteAddr() {
        return $this->remoteAddr;
    }
}
?>
