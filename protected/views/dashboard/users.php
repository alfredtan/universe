<div class="nav">
Users | <a href="<?php echo Yii::app()->createUrl('dashboard/universe'); ?>">Universe</a>
</div>
<div>&nbsp;</div>
<div><strong>All registered users (excluding previous winners)</strong></div>
<div>&nbsp;</div>
<div>Total Users: <?php echo count($users); ?></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th class="left">Name</th>
    <th class="left">Email</th>
    <th class="left">NRIC</th>
    <th class="left">Mobile</th>
    <th class="left">Preferred Campus</th>
    <th class="left">Date Registered</th>
  </tr>
  <?php foreach ($users as $user) { ?>
  <tr>
    <td><?php echo $user['name']; ?></td>
    <td><?php echo $user['email']; ?></td>
    <td><?php echo $user['nric']; ?></td>
    <td><?php echo $user['mobile']; ?></td>
    <td><?php echo $user['campusName']; ?></td>
    <td><?php echo $user['dateRegistered']; ?></td>
  </tr>
  <?php } ?>
</table>