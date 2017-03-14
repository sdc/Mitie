#MAXIMO_EMAIL_BEGIN
LSNRACTION=CREATE<?= "\r\n" ?>;<?= "\r\n" ?>
LSNRAPPLIESTO=SR<?= "\r\n" ?>;<?= "\r\n" ?>
TICKETID=&AUTOKEY&<?= "\r\n" ?>;<?= "\r\n" ?>
ASSETSITEID=SSW<?= "\r\n" ?>;<?= "\r\n" ?>
CLASS=SR<?= "\r\n" ?>;<?= "\r\n" ?>
DESCRIPTION=<?= $this->Email->e($ticket->description) ?><?= "\r\n" ?>;<?= "\r\n" ?>
ORGID=MTFM<?= "\r\n" ?>;<?= "\r\n" ?>
SITEID=SSW<?= "\r\n" ?>;<?= "\r\n" ?>
LOCATION=<?= $this->Email->e($ticket->building->code) ?><?= "\r\n" ?>;<?= "\r\n" ?>
REPORTEDPRIORITY=<?= $this->Email->e($ticket->priority) ?><?= "\r\n" ?>;<?= "\r\n" ?>
MTFMSRCLIENTREF=389456<?= "\r\n" ?>;<?= "\r\n" ?>
DESCRIPTION_LONGDESCRIPTION=<?= $this->Email->e($ticket->additional) ?><?= "\r\n" ?>;<?= "\r\n" ?>
AFFECTEDPERSONNP=<?= $this->Email->e($ticket->name) ?><?= "\r\n" ?>;<?= "\r\n" ?>
REPORTEDPHONENP=<?= $this->Email->e($ticket->phone) ?><?= "\r\n" ?>;<?= "\r\n" ?>
REPORTEDEMAILNP=<?= $this->Email->e($ticket->email) ?><?= "\r\n" ?>;<?= "\r\n" ?>
#MAXIMO_EMAIL_END
