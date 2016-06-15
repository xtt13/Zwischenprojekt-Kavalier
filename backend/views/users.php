<?php

 ?>
 <div class="body-wrapper">
 <h3 class="headline">Users</h3>
 <a href="index.php?site=users&amp;action=new" class="button_new">new user</a>

 <table>
   <thead>
     <tr>
       <th>users_id</th>
       <th>user_name</th>
       <th>user_email</th>
       <th>user_is_admin</th>
       <th></th>
       <th></th>
     </tr>
   </thead>

   <tbody>
     <?php foreach ($users as $user) : ?>
      <tr class="space"></tr>
       <tr class="table_row">
         <td><?php echo $user['id']; ?></td>
         <td><?php echo $user['fullname']; ?></td>
         <td><?php echo $user['email']; ?></td>
         <td><?php echo $user['is_admin']; ?></td>
         <td>
           <a href="index.php?site=users&amp;action=edit&amp;id=<?php echo $user['id']; ?>" class="button_do">edit</a>
         </td>
         <td>
            <a href="index.php?site=users&amp;action=delet&amp;id=<?php echo $user['id']; ?>" class="button_do">delete</a>
         </td>
      <?php endforeach; ?>
   </tbody>
 </table>
</div>
