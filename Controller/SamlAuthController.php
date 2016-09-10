<?php
namespace Kanboard\Plugin\SamlAuth\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Plugin\SamlAuth\Auth\SamlSettings;

require_once(ROOT_DIR.'/plugins/SamlAuth/Thirdparty/php-saml/_toolkit_loader.php');
class SamlAuthController extends BaseController
{
    /**
     * Handle authentication
     *
     * @access public
     */
    public function index()
    {
        $settings = new SamlSettings($this->configModel);
        $authRequest = new \OneLogin_Saml2_Auth($settings->getSettings());
        $url = $authRequest->login();
        $this->response->redirect($url);
    }


    public function metadata()
    {

        $settings = new SamlSettings($this->configModel);
        try {
            $samlSettings = new \OneLogin_Saml2_Settings($settings->getSettings(), true);
            $metadata = $samlSettings->getSPMetadata();
            $errors = $samlSettings->validateMetadata($metadata);
            if (empty($errors)) {
                header('Content-Type: text/xml');
                echo $metadata;
            } else {
                throw new \OneLogin_Saml2_Error(
                    'Invalid SP metadata: '.implode(', ', $errors),
                    \OneLogin_Saml2_Error::METADATA_SP_INVALID
                );

            }
        } catch (Exception $e) {
            echo $e->getMessage();

        }
    }



}
