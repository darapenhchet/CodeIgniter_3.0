<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
  <body>
  
 
    <h4>POST INFORMATION</h4>
    <table>
     <tr>
      <td><strong>Post Id</strong></td>
      <td><strong>Post Title</strong></td>
      <td><strong>Post Content</strong></td>
    </tr>
     <?php foreach($posts as $post){?>
     <tr>
         <td><?php echo $post->post_id;?></td>
         <td><?php echo $post->post_title;?></td>
         <td><?php echo $post->post_content;?></td>
      </tr>    
     <?php }?>  
   </table>
 
 
  </body>
</html>
