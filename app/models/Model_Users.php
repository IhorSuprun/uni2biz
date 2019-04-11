<?php

namespace app\models;

use app\core\Model;

class Model_Users extends Model {

    protected $users_table = 'users';
    protected $emails_table = 'user_email';
    protected $phones_table = 'user_phones';
    protected $countries_table = 'countries';

    public function __construct() {
        parent::__construct();
    }

    public function get_all_users() {
        $query = 'select * from ' . $this->users_table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if ($result = $stmt->fetchAll()) {
            return $result;
        }
        return false;
    }

    public function get_all_countries() {
        $query = 'select * from ' . $this->countries_table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if ($result = $stmt->fetchAll()) {
            return $result;
        }
        return false;
    }

    public function get_all_emails() {
        $query = 'select * from ' . $this->emails_table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if ($result = $stmt->fetchAll()) {
            return $result;
        }
        return false;
    }

    public function get_all_phones() {
        $query = 'select * from ' . $this->phones_table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if ($result = $stmt->fetchAll()) {
            return $result;
        }
        return false;
    }

    public function get_user_emails($id) {
        $query = 'select * from ' . $this->emails_table . ' WHERE user_id=:user_id;';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $id);
        $stmt->execute();
        if ($result = $stmt->fetchAll()) {
            return $result;
        }
        return false;
    }

    public function get_user_phones($id) {
        $query = 'select * from ' . $this->phones_table . ' WHERE user_id=:user_id;';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $id);
        $stmt->execute();
        if ($result = $stmt->fetchAll()) {
            return $result;
        }
        return false;
    }

    public function getUserByLogin($login) {
        $query = "SELECT * FROM " . $this->users_table . " WHERE login LIKE :login;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        if ($result = $stmt->fetch()) {
            return $result;
        }
        return false;
    }

    public function update_user($id, $firstname, $lastname, $adress, $zipcode, $country_id, $published) {
        $query = 'update ' . $this->users_table . ' set firstname=:firstname, lastname=:lastname, adress=:adress, zipcode=:zipcode, country_id=:country_id, published=:published where id=:id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':adress', $adress);
        $stmt->bindParam(':zipcode', $zipcode);
        $stmt->bindParam(':country_id', $country_id);
        $stmt->bindParam(':published', $published);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update_phones_emails($id, $value, $key) {        
        if ($key === 'phone') {
            $table = $this->phones_table;
        } else if ($key === 'email') {
            $table = $this->emails_table;
        }        
        if ($value['id'] === 'new') {
            $query = 'insert into ' . $table . ' (user_id, ' . $key . ', published) values(:user_id, :' . $key . ', :published)';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':user_id', $id);
            $stmt->bindParam(':' . $key . '', $value[$key]);
            $stmt->bindParam(':published', $value['published']);
        } else {
            $query = 'update ' . $table . ' set ' . $key . '=:' . $key . ', published=:published where id=:id';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $value['id']);
            $stmt->bindParam(':' . $key . '', $value[$key]);
            $stmt->bindParam(':published', $value['published']);
        }
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

//  добавить по необходимости
//    public function insert_user($login, $email, $password) {
//        $query = 'insert into ' . $this->users_table . ' (login, email, password) values(:login, :email, :password)';
//        $stmt = $this->db->prepare($query);
//        $stmt->bindParam(':login', $login);
//        $stmt->bindParam(':email', $email);
//        $stmt->bindParam(':password', $password);
//        if ($stmt->execute()) {
//            return true;
//        }
//        return false;
//    }

//  добавить по необходимости
//    public function delete_user($ID) {
//        $query = 'delete from ' . $this->users_table . ' where id=' . $ID;
//        $stmt = $this->db->prepare($query);
//        if ($stmt->execute()) {
//            return true;
//        }
//        return false;
//    }

}
