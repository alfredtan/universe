<div class="nav">
<a href="<?php echo Yii::app()->createUrl('dashboard/users'); ?>">Users</a> | Universe
</div>
<div>&nbsp;</div>
<div><strong>Showing only first universe for each user AND the user must have answered '6' for popquiz (excluding previous winners)</strong></div>
<div<div>&nbsp;</div>
<div>Total Universe: <?php echo count($universe); ?></div>
<div style="overflow:scroll; width:100%">
<table  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th class="left">Name</th>
    <th class="left">Email</th>
    <th class="left">NRIC</th>
    <th class="left">Mobile</th>
    <th class="left">Preferred</th>
    <th class="left">Campus</th>
    <th class="left">Course</th>
    <th class="left">Interest</th>
    <th class="left">Life</th>
    <th class="left">Friends</th>
    <th class="left">Returned</th>
    <th class="left">Create Date</th>
  </tr>
  <?php foreach ($universe as $uni) 
  { 
  	$totalFriends = 0;
	$totalFriends += ($uni['friend1']>0) ? 1 : 0;
	$totalFriends += ($uni['friend2']>0) ? 1 : 0;
	$totalFriends += ($uni['friend3']>0) ? 1 : 0;
  ?>
  <tr>
    <td><?php echo $uni['name']; ?></td>
    <td><?php echo $uni['email']; ?></td>
    <td><?php echo $uni['nric']; ?></td>
    <td><?php echo $uni['mobile']; ?></td>
    <td><?php echo $data[$uni['fbid']]['campusName']; ?></td>
    <td><?php echo $uni['campusName']; ?></td>
    <td><?php echo $uni['courseName']; ?></td>
    <td><?php echo $uni['interestName']; ?></td>
    <td><?php echo $uni['lifeName']; ?></td>
    <td><?php echo $totalFriends; ?></td>
    <td><?php echo $data[$uni['fbid']]['return']; ?></td>
    <td><?php echo $uni['dateCreate']; ?></td>
  </tr>
  <?php } ?>
</table>
</div>