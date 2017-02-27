<?php
  require_once('../../private/initialize.php');
  
  $agent_result = find_all_agents();
?>

<!doctype html>

<html lang="en">
  <head>
    <title>APEX Agent Directory</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <link rel="stylesheet" media="all" href="<?php echo DOC_ROOT . '/includes/styles.css'; ?>" />
  </head>
  <body>
    
    <a href="<?php echo url_for('/index.php'); ?>">Main menu</a>
    <br/>

    <h1>APEX Agent Directory</h1>
    
    <table>
      <tr>
        <th>Codename</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>
      
      <?php while($agent = db_fetch_assoc($agent_result)) { ?>
        <?php $agent_is_current_user = $agent['id'] == $current_user['id']; ?>
        <tr>
          <td><?php echo h($agent['codename']); ?></td>
          <td class="center"><a href="<?php echo url_for('/agents/public_key.php?id=' . h(u($agent['id']))); ?>">Public Key</a></td>
          <td class="center">
            <?php if(!$agent_is_current_user) { ?>
              <a href="<?php echo url_for('/agents/dropbox.php?id=' . h(u($agent['id']))); ?>">Dropbox</a>
            <?php } ?>
          </td>
          <td class="center"><?php if(!$agent_is_current_user) { echo '&#128274;'; } ?> <a href="<?php echo url_for('/agents/messages.php?id=' . h(u($agent['id']))); ?>">Messages</a></td>
        </tr>
      <?php } ?>
    </table>

    <br />
    <a href="<?php echo url_for('/agents/new.php'); ?>">Add an Agent</a>
    
   
  </body>
</html>
