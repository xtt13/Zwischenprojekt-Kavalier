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
      <tr class="space"></tr>
       <tr class="table_row">
         <td>1</td>
         <td>hannah</td>
         <td>email.adress@email.at</td>
         <td>ja</td>
         <td>
           <a href="index.php?site=users&amp;action=edit" class="button_do">edit</a>
         </td>
         <td>
            <a href="index.php?site=users&amp;action=delet" class="button_do">delete</a>
         </td>
       </tr>
       <tr class="space"></tr>
        <tr class="table_row">
          <td>2</td>
          <td>Hannah</td>
          <td>email.adress@email.at</td>
          <td>nein</td>
          <td>
            <a href="index.php?site=users&amp;action=edit" class="button_do">edit</a>
          </td>
          <td>
            <a href="index.php?site=users&amp;action=delet" class="button_do">delete</a>
          </td>
        </tr>
   </tbody>
 </table>
</div>
