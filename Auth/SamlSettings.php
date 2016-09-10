<?php

namespace Kanboard\Plugin\SamlAuth\Auth;

class SamlSettings {

  private $configModel = null;

  public function __construct($configModel)
  {
      $this->configModel = $configModel;

  }

  public function getSettings() {


    $sp = array();
    $sp['entityid'] = $this->configModel->get('samlauth_sp_entity_id');
    $sp['signon'] = $this->configModel->get('samlauth_sp_signon');
    $sp['signout'] = $this->configModel->get('samlauth_sp_signout');
    $sp['techname'] = $this->configModel->get('samlauth_techcontact_name');
    $sp['techemail'] = $this->configModel->get('samlauth_techcontact_email');

    $sp['privatecert'] = file_get_contents('/var/kanboard-certs/sp-private.crt');
    $sp['publiccert'] = file_get_contents('/var/kanboard-certs/sp-public.crt');

    $login = htmlspecialchars($sp['signon'], ENT_XML1);
    $logout = htmlspecialchars($sp['signout'], ENT_XML1);

    $idp = array();
    $idp['entityid'] = $this->configModel->get('samlauth_idp_entity_id');
    $idp['signon'] = $this->configModel->get('samlauth_idp_signon');
    $idp['signout'] = $this->configModel->get('samlauth_idp_signout');

    $idp['publiccert'] = file_get_contents('/var/kanboard-certs/idp-public.crt');


    $settingsInfo = array(
      'debug' => true,
      'security' => array(
        'authnRequestsSigned' => true,
        'signatureAlgorithm' => 'http://www.w3.org/2001/04/xmldsig-more#rsa-sha256',
        //'wantAssertionsEncrypted' => true,
        'requestedAuthnContext' =>false,
      ),

      'contactPerson' => array(
          'technical' => array(
              'givenName' => $sp['techname'],
              'emailAddress' => $sp['techemail']
          ),
      ),

      'sp' => array(
          'entityId' => $sp['entityid'],
          //'entittyId' => $sp['entityid'],
          'assertionConsumerService' => array(
              'url' => $login,
              'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
          ),
          'singleLogoutService' => array(
              'url' => $logout,
              'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
          ),
          //'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:entity',
          'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
          'x509cert' => $sp['publiccert'],
          'privateKey' => $sp['privatecert'],
      ),
      'idp' => array(
          'entityId' => $idp['entityid'],

          'singleSignOnService' => array(
              'url' => $idp['signon'],
          ),
          'singleLogoutService' => array(
              'url' => $idp['signout'],
          ),
          'x509cert' => $idp['publiccert'],
      ),
    );
    return $settingsInfo;
  }



}
