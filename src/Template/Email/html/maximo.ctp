<h5>New Ticket</h5>
<p><strong>Name: </strong><?= h($ticket->name) ?>.</p>
<p><strong>Email: </strong><?= h($ticket->email) ?>.</p>
<p><strong>Building: </strong><?= h($ticket->building->name) ?>.</p>
<p><strong>Room: </strong><?= h($ticket->room) ?>.</p>
<p><strong>Description: </strong><?= h($ticket->description) ?>.</p>
<br />
<p><strong>Department: </strong><?= h($ticket->department) ?>.</p>
<p><strong>Phone: </strong><?= h($ticket->phone) ?>.</p>
<p><strong>Priority: </strong><?= h($ticket->priority) ?>.</p>
<p><strong>Additional Info: </strong><?= h($ticket->additional) ?>.</p>
