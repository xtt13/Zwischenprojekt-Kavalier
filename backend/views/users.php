<?php
echo 'users';
 ?>
 <h4>Users</h4>
 <a href="index.php?site=users&amp;action=new">new user</a>

 <table>
   <thead>
     <tr>
       <th>users_id</th>
       <th>user_name</th>
       <th>user_email</th>
       <th>user_is_admin</th>
       <th>Aktionen</th>
     </tr>
   </thead>

   <tbody>
       <tr>
         <td>1</td>
         <td>hannah</td>
         <td>email.adress@email.at</td>
         <td>ja</td>
         <td>
           <a href="index.php?site=users&amp;action=edit">edit</a>
           <a href="index.php?site=users&amp;action=delet">delete</a>
         </td>
       </tr>
   </tbody>
 </table>
