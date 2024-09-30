<?php 

class GmailModel {
    private $service;

    public function __construct(ServiceModel $service) {
        $this-> service = $service->getService();
    } 

    public function getMessages() {
        if ($this-> service) {
            $today = date('Y/m/d');
            $query = "after:$today";
            $optParams = ['q' => $query];
            return $this-> service -> users_messages->listUsersMessages('me', $optParams);
        }
        return null;
    }

    public function getMessageDetails($messageId) {
        if ($this-> service) {
            return $this-> service -> users_messages-> get('me', $messageId);
        }
        return null;
    }

    public function getProfile() {
        if ($this-> service) {
            return $this-> service -> users-> getProfile('me');
        }
        return null;
    }
}