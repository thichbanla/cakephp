<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>

<!-- <?php echo $this->Form->create('Input', array('url' => 'addItems')); ?> -->

<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

<table id="itemTable" class="table table-striped table-bordered table-hover">
<thead>
<th><span id="add_item_button" class="btn mini green addbutton" onclick="addRow()">
											<i class="icon-plus"></i></span></th>
<th>Description</th>
<th>Quantity</th>
<th>Unit Price</th>
</thead>

<tbody>
	<?php $count = 0;
		foreach ($inputs as $input): 
			$count++;
	?>
		<tr>
			<td></td>
			<td>
				<label class="clickedit" id="data[<?php echo $input['Input']['id']?>][description]" name="data[<?php echo $input['Input']['id']?>][description]" rows="2"><?php echo $input['Input']['description']?></label>
				<textarea class="editable" type="text"></textarea>
			</td>
			<td>
				<label class="clickedit" id="data[<?php echo $input['Input']['id']?>][quantity]" name="data[<?php echo $input['Input']['id']?>][quantity]"><?php echo $input['Input']['quantity']?></label>
				<textarea class="editable" type="text"></textarea>
			</td>
			<td>
				<label class="clickedit" id="data[<?php echo $input['Input']['id']?>][unit_price]" name="data[<?php echo $input['Input']['id']?>][unit_price]"><?php echo $input['Input']['unit_price']?></label>
				<textarea class="editable" type="text"></textarea>
			</td>
		</tr>
	<?php endforeach; ?>
</tbody>

</table>
<!-- <?php echo $this->Form->button("Save"); ?>
<?php echo $this->Form->end(); ?> -->

<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="../video/q3_2.mov">
Your browser does not support the video tag.
</video>
</p>

<style>
</style>

<?php $this->start('script_own');?>
<script>
$(document).ready(function(){

	// $(document).on("click", "#add_item_button", function(){
	
});

var defaultText = "default value";

$('.editable').hide()
$(document).on("focusout", ".editable", endEdit)
.keyup(function (e) {
	if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
		endEdit(e);
		return false;
	} else {
		return true;
	}
})
$(document).on("click", ".clickedit", function () {	
	$(this).hide();
	$(this).next().show();
	$(this).next().val($(this).text());
	$(this).next().focus();
});

function endEdit(e) {
	var textarea = $(e.target),
		label = textarea && textarea.prev();

	label.text(textarea.val() === '' ? defaultText : textarea.val());
	textarea.hide();
	label.show();
}

var count = "<?php echo $count; ?>";
	
function addRow(){
	table = document.getElementById("itemTable");
	count++;
	html = "<tr><td></td>"
			+ "<td><label class='clickedit' id='data[" + count + "][description]' name='data[" + count + "][description]' rows='2'>0</label>"
			+ "<textarea class='editable' type='text'></textarea></td>"
			+ "<td><label class='clickedit' id='data[" + count + "][quantity]' name='data[" + count + "][quantity]'>0</label>"
			+ "<textarea class='editable' type='text'></textarea></td>"
			+ "<td><label class='clickedit' id='data[" + count + "][unit_price]' name='data[" + count + "][unit_price]'>0</label>"
			+ "<textarea class='editable' type='text'></textarea></td>"
			+ "</tr>";
	table.innerHTML += html;
	$('.editable').hide();
}

</script>
<?php $this->end();?>

