<p>Name: <?= $contact['Contact']['first_name'] . ' ' . $contact['Contact']['last_name'] ?></p>
<p>Email: <?= $contact['Contact']['email'] ?></p>
<p>Phone: <?= $contact['Contact']['phone'] ?></p>
<p>Travel Dates: <?= $contact['Contact']['travel_dates'] ?></p>
<p>Destination: <?= $contact['Contact']['destination'] ?></p>
<p>Comments:</p> <?= nl2br($contact['Contact']['comments']) ?>
    