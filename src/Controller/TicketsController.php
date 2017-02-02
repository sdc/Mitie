<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\HttpException;
use Cake\Mailer\Email;

class MissingRequestDataException extends HttpException {}
class TicketSaveFailureException extends HttpException {}

class TicketsController extends AppController
{
    const PRIORITIES = [
        'Priority 2: Urgent - This impacts teaching (within one working day response time)',
        'Priority 3: Standard - Non critical (within one working week response time)',
        'Priority 4: Projects - agreed response time'
    ];

    public function initialize()
    {
        parent::initialize();

        $this->set('css', ['ticket']);
        $this->set('js', ['ticket']);
    }

    public function index()
    {
        $this->set('buildings', 
            $this->Tickets->Buildings->find('list', ['limit' => 500])
        );

        $this->set('priorities', array_combine(self::PRIORITIES, self::PRIORITIES)); 
        $this->set('ticket', $this->Tickets->newEntity());
    }

    public function create()
    {
        try {
            $ticket = $this->buildTicketFromRequest();            
        } catch (MissingRequestDataException $e) {
            $this->Flash->error($e->getMessage());
            return $this->redirect('/');
        }

        if (!$this->Tickets->save($ticket)) {
            throw new TicketSaveFailureException('Failed to save ticket');
        }

        $ticket = $this->Tickets->get($ticket->id, ['contain' => 'Buildings']);
        $ticket->additional = $this->buildLongDescription($ticket);
        $this->sendMitieEmail($ticket);
        $this->Flash->success('Ticket sent to Mitie');

        $this->set('buildings', 
            $this->Tickets->Buildings->find('list', ['limit' => 500])
        );
        $this->set('ticket', $ticket);
        $this->set('priorities', array_combine(self::PRIORITIES, self::PRIORITIES)); 
        $this->set('fullService', $this->request->data('full-service'));

        return $this->render('complete');
    }

    private function buildTicketFromRequest()
    {
        $ticket = $this->Tickets->newEntity();
        $ticket->name = $this->user->getName();
        $ticket->description = $this->getRequestOrThrow('description');
        $ticket->room = $this->getRequestOrThrow('room');
        $ticket->building_id = $this->getRequestOrThrow('building_id');

        if ($this->getRequestOrThrow('full-service')) {
            $ticket->department = $this->getRequestOrThrow('department');
            $ticket->phone = $this->getRequestOrThrow('phone');
            $ticket->priority = $this->getRequestOrThrow('priority');
            $ticket->additional = $this->getRequestOrThrow('additional');
            $ticket->email = $this->user->getUsername();
        }

        return $ticket;
    }

    private function getRequestOrThrow($value)
    {
        if (!is_null($this->request->data($value))) {
            return $this->request->data($value);
        }

        throw new MissingRequestDataException("$value is missing");
    }

    private function sendMitieEmail($ticket)
    {
        $email = new Email();
        $email
            ->from(Configure::read('Email.from'))
            ->to(['jamesbyrne@southdevon.ac.uk' => 'James Byrne'])
            ->subject('Mitie')
            ->emailFormat('text')
            ->template('maximo', 'default')
            ->viewVars([
                'ticket' => $ticket
            ]);

        if (Configure::read('Email.enabled')) {
            $email->send();
        }
    }

    private function buildLongDescription($ticket)
    {
        $description = $ticket->additional;
        if (is_null($description)) {
            $description = '';
        }

        $description .= "\nRoom: $ticket->room";

        if (!is_null($ticket->department)) {
            $description .= "\nDepartment: $ticket->department";
        }

        return $description;
    }
}
