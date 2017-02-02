#MAXIMO_EMAIL_BEGIN
LSNRACTION=CREATE;
LSNRAPPLIESTO=SR;
TICKETID=&AUTOKEY&;
ASSETSITEID=SSW;
CLASS=SR;
DESCRIPTION=<?= $this->Email->e($ticket->description) ?>;
ORGID=MTFM;
SITEID=SSW;
LOCATION=<?= $this->Email->e($ticket->building->code) ?>;
REPORTEDPRIORITY=<?= $this->Email->e($ticket->priority) ?>;
MTFMSRCLIENTREF=389456;
DESCRIPTION_LONGDESCRIPTION=<?= $this->Email->e($ticket->additional) ?>;
AFFECTEDPERSONNP=<?= $this->Email->e($ticket->name) ?>;
AFFECTEDPHONENP=<?= $this->Email->e($ticket->phone) ?>;
REPORTEDEMAILNP=<?= $this->Email->e($ticket->email) ?>;
#MAXIMO_EMAIL_END
