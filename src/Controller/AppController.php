<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Utility\Shibboleth as Auth;
use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{
    const AUTHORISED_GROUPS = ['SDC Non-Teaching Staff', 'SDC Teaching Staff'];

    protected $user;

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $auth = new Auth;
        $auth->setAuthGroups(self::AUTHORISED_GROUPS);
        $auth->authoriseUser();

        $this->user = $auth->user;

        $this->viewBuilder()->className('App');
    }

    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
