<?php

// FUNKTIONIERT NOCH NICHT!

$order = get_order(89);

$to = $user[0]['fullname'];
$subject = "Your Order";
$message = "

Dear '. $to . ', \n

\n

Thank you for placing your order with Kavalier!

\n
----------------------------------------------------------------
\n

Order ID: ' . $order[0]['order_id'] . ' \n
Order Date: ' . $order[0]['date_ordered'] . ' \n
\n





";
$headers = "From: noreply@michaeldorn.at \r\n Reply-To: kavalier@michaeldorn.at \r\n";

mail($to, $subject, $message, $headers);



 ?>
