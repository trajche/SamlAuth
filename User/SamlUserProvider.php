<?php

namespace Kanboard\Plugin\SamlAuth\User;
use Kanboard\Core\User\UserProviderInterface;
use Kanboard\Core\Security\Role;

class SamlUserProvider implements UserProviderInterface
{
    /**
     * Username
     *
     * @access protected
     * @var string
     */
    protected $username = '';

    /**
     * Email
     *
     * @access protected
     * @var string
     */
    protected $email = '';

    /**
     * Name
     *
     * @access protected
     * @var string
     */
    protected $name = '';

    /**
     * User profile if the user already exists
     *
     * @access private
     * @var array
     */
    private $userProfile = array();

    /**
     * Constructor
     *
     * @access public
     * @param  string $username
     */
    public function __construct($username, $email, $name, array $userProfile = array())
    {
        $this->username = $username;
        $this->email = $email;
        $this->name = $name;
        $this->userProfile = $userProfile;
    }

    /**
     * Return true to allow automatic user creation
     *
     * @access public
     * @return boolean
     */
    public function isUserCreationAllowed()
    {
        return true;
    }

    /**
     * Get internal id
     *
     * @access public
     * @return string
     */
    public function getInternalId()
    {
        return '';
    }

    /**
     * Get external id column name
     *
     * @access public
     * @return string
     */
    public function getExternalIdColumn()
    {
        return 'username';
    }

    /**
     * Get external id
     *
     * @access public
     * @return string
     */
    public function getExternalId()
    {
        return $this->username;
    }

    /**
     * Get user role
     *
     * @access public
     * @return string
     */
    public function getRole()
    {
        if(isset($this->userProfile['role'])){
            return $this->userProfile['role'];
        }
        return Role::APP_USER;
    }

    /**
     * Get username
     *
     * @access public
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get full name
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get user email
     *
     * @access public
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get external group ids
     *
     * @access public
     * @return array
     */
    public function getExternalGroupIds()
    {
        return array();
    }

    /**
     * Get extra user attributes
     *
     * @access public
     * @return array
     */
    public function getExtraAttributes()
    {
        return array(
            'is_ldap_user' => 1,
            'disable_login_form' => 1,
        );
    }
}
