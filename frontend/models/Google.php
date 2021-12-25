<?php

namespace frontend\models;

use yii\authclient\OAuth2;

class Google extends OAuth2
{
    public $userAttributes = ['email'];

    public $clientId = "612392373573-5oqao3kcjobscclc92qbrtcgk5165ucm.apps.googleusercontent.com";

    public $clientSecret = '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';

    public $authUrl = 'https://accounts.google.com/o/oauth2/auth';
    
    public $tokenUrl = 'https://www.googleapis.com/oauth2/v4/token';
    
    public $apiBaseUrl = 'https://www.googleapis.com/oauth2/v1';

    public $scope = 'https://www.googleapis.com/auth/drive';

    public function init()
    {
        parent::init();
        if ($this->scope === null) {
            $this->scope = implode(' ', [
                'https://www.googleapis.com/auth/userinfo.profile',
                'https://www.googleapis.com/auth/userinfo.email',
            ]);
        }
    }

    protected function initUserAttributes()
    {
        // return $this->api('me?fields=id,name,email', 'GET');
        return $this->api('userinfo', 'GET');
    }

    protected function defaultName()
    {
        return 'google';
    }

    protected function defaultReturnUrl()
    {
        return "http://localhost:8080/index.php?r=site%2Fcallback";
    }

    protected function defaultTitle()
    {
        return 'Google';
    }
}
