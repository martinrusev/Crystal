<style>
	.crystal_table
		{
		width:100%;
		border:1px solid #eee;
		border-collapse:collapse;
		}
	 .crystal_table td
	 	{
	 	padding:4px;
	 	border:1px solid #eee;
	 	}	
	 .crystal_table thead td
	 	{
	 	background:#eee;
	 	font-weight:bold;
	 	text-align:center;
	 	}	
</style>
<?php if(isset($table_fields)): ?>
<table class="crystal_table">
	<thead>
		<?php foreach($table_fields as $key => $field): ?>
		<td>
			<?php echo $field; ?>
		</td>			
		<?php endforeach; ?>
	</thead>		
	<?php foreach($result as $k => $v): ?>
	<tr>
		<?php foreach($v as $item): ?>
		<td>
		<?php echo $item; ?>
		</td>
		<?php endforeach; ?>
	</tr>
	<?php endforeach; ?>	
</table>
<?php else: ?>
<p>
The specified table is empty
</p>

<?php endif; ?>