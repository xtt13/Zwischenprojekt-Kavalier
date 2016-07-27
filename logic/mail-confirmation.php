<?php
// Bestellbestätigung

// Muss noch manuell im Code aktiviert werden. Für Präsentation deaktiviert

$order = get_order(89);

$to = $user[0]['email'];
$user_name = $user[0]['fullname'];
$subject = "Your Order";
$order_id = $order[0]['order_id'];
$order_date = $order[0]['date_ordered'];
$message = "

Dear $user_name,

Thank you for placing your order with Kavalier!

\n
----------------------------------------------------------------
\n

Order ID: $order_id
Order Date: $order_date
\n




";
$headers = "From: noreply@michaeldorn.at \r\n Reply-To: kavalier@michaeldorn.at \r\n";

mail($to, $subject, $message, $headers);



 ?>
