<?php

 ?>
 <div class="body-wrapper">
 <h3 class="headline">Users</h3>
 <?php if(isset($success)): ?>
 <p class='success_message'><?php echo $success ?></p>
 <?php endif ?>
 <a href="index.php?site=users&amp;action=new" class="button_new">New User</a>

 <table class="table">
   <thead class="t-head">
     <tr>
       <th>Id</th>
       <th>Fullname</th>
       <th>Email</th>
       <th>Admin</th>
       <th></th>
       <th></th>
     </tr>
   </thead>

   <tbody class="t-body">
     <?php foreach ($users as $user) : ?>
      <tr class="space"></tr>
       <tr class="table_row">
         <td><?php echo $user['id']; ?></td>
         <td><?php echo $user['fullname']; ?></td>
         <td><?php echo $user['email']; ?></td>
         <td><?php if($user['is_admin'] == '1'){
                      echo "Yes";

                    }else{
                      echo "No";
                    }
          ?></td>
         <td>
           <a href="index.php?site=users&amp;action=edit&amp;id=<?php echo $user['id']; ?>" class="button_do">edit</a>
         </td>
         <td>
            <a href="index.php?site=users&amp;action=delet&amp;id=<?php echo $user['id']; ?>" class="button_do delete_user">delete</a>
         </td>
      <?php endforeach; ?>
   </tbody>
 </table>
</div>
