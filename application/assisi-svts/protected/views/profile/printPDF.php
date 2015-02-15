<div class="center">
	<h1>Allocation Report for Academic School Year <br/>(<?php echo  $start.'-'.$end; ?>)</h1>
</div>

<div>
	<?php foreach ($schools as $key => $school) : 
	echo "<b>".$school->Name."</b><br/><br/>"; 
	?>
</div>

<table>
	<tr>
		<th id="th">Student Name</th>
		<th id="th">Course</th>
		<th id="th">Total Allocation</th>
	</tr>

	<?php $this->getStudentInSchoolAndAllocationInPeriodOf($school,$start,$end); ?>
</table>
<br/>
<?php endforeach; ?>