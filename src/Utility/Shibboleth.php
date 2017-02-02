<?php

// Shibb extension for CakePHP

namespace App\Utility;

use App\Utility\Storage\User;
use Cake\Core\Configure;

class Shibboleth
{
    public $user;
    private $authorisedGroups = [];
    private $adminGroups = [];
    private $envPrefix = false;

    public function __construct()
    {
        $this->user = new User();

        if (!Configure::read('debug')) {
            $this->envPrefix = $this->getEnvironmentPrefixFromEppn();
        }
    }

    public function setAuthGroups(Array $groups)
    {
        $this->isArrayOrThrow($groups);
        $this->authorisedGroups = $groups;
    }

    public function setAdminGroups(Array $groups)
    {
        $this->isArrayOrThrow($groups);
        $this->adminGroups = $groups;
    }

    public function authoriseUser()
    {
        if (Configure::read('debug')) {
            $this->setUser('30116153@southdevon.co.uk', 'Debug User', true);
            return;
        }

        $groups = $this->getMember();
        if ($this->groupAuthorised($groups)) {
            $this->setUser(
                $this->getEnvironmentVar('eppn'), 
                $this->getName(), 
                $this->isAdmin($groups)
            );

            return;
        }

        exit('You are not authorised to access this service');
    }

    private function isArrayOrThrow($value)
    {
        if (!is_array($value)) {
            throw new \Exception('Value is not an array');
        }
    }

    private function isAdmin($groups)
    {
        foreach ($this->adminGroups as $group) {
            if (preg_match('/(?i)\b'.$group.'\b/', $groups)) {
                return true;
            }
        }

        return false;
    }

    private function getName()
    {
        if (!$givenName = $this->getEnvironmentVar('givenName')) {
            throw new \Exception('Missing givenName parameter');
        }

        if (!$sn = $this->getEnvironmentVar('sn')) {
            throw new \Exception('Missing sn parameter');
        }        

        return $givenName.' '.$sn;
    }

    private function getMember()
    {
        if (!$member = $this->getEnvironmentVar('member')) {
            throw new \Exception('No member found');
        }

        return $member;
    }

    private function groupAuthorised($groups)
    {
        if (empty($groups)) {
            return false;
        }

        foreach ($this->authorisedGroups as $group) {
            if (preg_match('/\b'.$group.'\b/', $groups)) {
                return true;
            }
        }

        return false;
    }

    private function setUser($username, $name, $admin = false)
    {
        $this->user->setUsername($username);
        $this->user->setName($name);
        $this->user->setAdmin($admin);
    }

    private function getEnvironmentVar($value) 
    {
        if (!isset($_SERVER[$this->envPrefix . $value])) {
            return false;
        }

        return $_SERVER[$this->envPrefix . $value];
    }

    private function getEnvironmentPrefixFromEppn()
    {
        if (isset($_SERVER['eppn'])) {
            return '';
        }

        if (isset($_SERVER['REDIRECT_eppn'])) {
            return 'REDIRECT_';
        }

        throw new \Exception('No eppn found');
    }
}
