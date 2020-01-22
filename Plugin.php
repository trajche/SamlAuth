<?php

namespace Kanboard\Plugin\SamlAuth;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Security\Role;
use Kanboard\Plugin\SamlAuth\Auth\SamlAuth;
use Kanboard\Plugin\SamlAuth\Auth\SamlSettings;



class Plugin extends Base
{
    public function initialize()
    {

        $this->authenticationManager->register(new SamlAuth($this->container));
        $this->applicationAccessMap->add('SamlAuthController', '*', Role::APP_PUBLIC);
        $this->applicationAccessMap->add('SamlAuthController', 'metadata', Role::APP_ADMIN);

        //Generate Metadata
        $this->route->addRoute('/sso/metadata', 'SamlAuthController', 'metadata', 'SamlAuth');
        //Send to SAML URL
        $this->route->addRoute('/sso/saml', 'SamlAuthController', 'index', 'SamlAuth');

        $this->template->hook->attach('template:auth:login-form:after', 'SamlAuth:auth/login');
        $this->template->hook->attach('template:config:integrations', 'SamlAuth:config/integrations');
    }

    public function getPluginDescription()
    {
        return 'This SAML Authentication plugin lets you use Kanboard as a Service Provider.';
    }

    public function getPluginAuthor()
    {
        return 'Halton Oy';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/trajche/SamlAuth';
    }


}
