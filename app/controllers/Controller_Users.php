<?php

namespace app\controllers;

use app\models\Model_Users;
use app\core\Controller;
use app\core\Route;

class Controller_Users extends Controller {

    public function __construct() {
        parent::__construct();
        $this->model = new Model_Users();
    }

    private function getPhonesEmails($array, $keyword) {
        foreach ($array as $key => $value) {
            if (stristr($key, $keyword)) {
                if (stristr($key, 'pub')) {
                    if (stristr($key, 'new')) {
                        $unit['id'] = 'new';
                    } else {
                        $unit['id'] = preg_replace('/[^0-9]/', '', $key);
                    }
                    $unit['published'] = 1;
                } else {
                    if (stristr($key, 'new')) {
                        $unit['id'] = 'new';
                    } else {
                        $unit['id'] = preg_replace('/[^0-9]/', '', $key);
                    }
                    $unit[$keyword] = $value;
                }
                $units[] = $unit;
            }
        }
        return $units;
    }

    function action_index() {
        $this->view->all_users = $this->model->get_all_users();
        $user = $this->model->getUserByLogin($_SESSION['login']);
        $this->view->user = $user;
        $this->view->countries = $this->model->get_all_countries();
        $this->view->all_phones = $this->model->get_all_phones();
        $this->view->all_emails = $this->model->get_all_emails();
        $this->view->emails = $this->model->get_user_emails($user['id']);
        $this->view->phones = $this->model->get_user_phones($user['id']);
        $this->view->content_view = 'content/users_view.php';
        $this->view->render();
    }

    public function action_login() {
        $this->view->content_view = 'content/login_view.php';
        $this->view->render();
    }

    public function action_mycontact() {
        $user = $this->model->getUserByLogin($_SESSION['login']);
        $this->view->user = $user;
        $this->view->countries = $this->model->get_all_countries();
        $this->view->emails = $this->model->get_user_emails($user['id']);
        $this->view->phones = $this->model->get_user_phones($user['id']);
        $this->view->content_view = 'content/mycontact_view.php';
        $this->view->render();
    }

    public function action_signin() {
        $user = filter_input_array(INPUT_POST);
        $user_from_db = $this->model->getUserByLogin($user['login']);
        if ($user_from_db) {
            if ($user['pass'] === $user_from_db['password']) {
                $_SESSION['login'] = $user['login'];
                Route::redirect('/');
            } else {
                Route::redirect('/');
            }
        } else {
            Route::redirect('/');
        }
    }

    public function action_signout() {
        unset($_SESSION['login']);
        Route::redirect("/");
    }

    public function action_update() {
        if (filter_input(INPUT_POST, 'send')) {
            extract(filter_input_array(INPUT_POST));
            $input_data = filter_input_array(INPUT_POST);
            $phones = $this->getPhonesEmails($input_data, 'phone');
            $emails = $this->getPhonesEmails($input_data, 'email');
            $this->model->update_user($id, $firstname, $lastname, $adress, $zipcode, $country_id, $published);
            foreach ($emails as $email) {
                $this->model->update_phones_emails($id, $email, 'email');
            }
            foreach ($phones as $phone) {
                $this->model->update_phones_emails($id, $phone, 'phone');
            }
        }
        Route::redirect('/');
    }

//    private function getEmails($array) {
//        foreach ($array as $key => $value) {
//            if (stristr($key, 'email')) {
//                if (stristr($key, 'new')) {
//                    $email['id'] = 'new';
//                } else {
//                    $email['id'] = preg_replace('/[^0-9]/', '', $key);
//                }
//                $email['email'] = $value;
//                $emails[] = $email;
//            }
//        }
//        return $emails;
//    }
}
