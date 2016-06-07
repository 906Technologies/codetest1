<?php
require_once __DIR__.'/core.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<title>Fix Me</title>
    </head>
    <body>
		<fieldset id="create-armor">
			<legend>Add Armor</legend>
			
			<label>Name</label>
			<input type="text" name="name" />
			
			<label>Value</label>
			<input type="number" name="value" />
			
			<label>Type</label>
			<select name="type">
				<?
				foreach(Armor::getTypeLabels() as $id => $label){
					?>
					<option value="<?=$id?>"><?=$label?></option>
					<?
				}
				?>
			</select>
			
			
			<input type="button" class="add-armor" value="Create" />
		</fieldset>
		<fieldset id="inventory">
			<legend>Inventory</legend>
			<div class="inventory-container"></div>
		</fieldset>
		
		<fieldset id="outfit">
			<legend>Outfit</legend>
			<?
			foreach(Armor::getTypeLabels() as $id => $label){
				?>
				<label><?=$label?></label>
				<select class="equiped" name="<?=$label?>">
				</select>
				<br/>
				<?
			}
			?>
		</fieldset>
		<style>
			.inventory-item{
				border: 1px solid black;
				padding: 7px;
				margin: 7px;
				display: inline-block;
			}
		</style>
		<script type="text/javascript">
		
		$(document).ready(function(){
			function refreshInventory(){
				$.get("api/getInventory.php",
					function(data){
						$('.inventory-container').empty();
						
						$('.equiped').empty();
						
						for (var i = 0; i < data.inventory.length; i++) {
							var armor = data.inventory[i];
							
							var item = $('<div>Name:'+armor.name+'<br/>Value:'+armor.value+'<br/>Type:'+armor.type+'<br/></div>');
							item.addClass('inventory-item');
							
							var removeAction = $('<input type="button" class="remove-inventory" value="Remove" />');
							removeAction.data('name', armor.name);
							removeAction.data('type', armor.type);
							
							removeAction.click(function(e){
								var target = $(e.target);
								var name = target.data('name');
								var type = target.data('type');
								
								removeInventory(target.data('name'));

								var outfitInput = $('.equiped[name='+type+']');
								
								if(outfitInput.val() == name){
									outfitInput.val(null);
								}

								outfitInput.find('option[value='+name+']').remove();
								
								target.parent('.inventory-item').remove();
								
							});
							
							item.append(removeAction);
							
							
							$('.inventory-container').append(item);
							
							var option = $('<option value="'+armor.name+'">'+armor.name+'</option>');

							$('.equiped[name='+armor.type+']').append(option);
						}
						
					},
					'json'
					).fail(function() {
						alert( "An Error has Occurred" );
					});
			}
			refreshInventory();
			
			function getOutfit(){
				$.get("api/getOutfit.php",
					function(data){
						if(data.outfit){
							//debugger;
							for (var slot in data.outfit) {
								if (data.outfit.hasOwnProperty(slot)) {
									var armor = data.outfit[slot];
									if(armor){
										$('.equiped[name='+armor.type+']').val(armor.name);
									}
									
								}
							}
							
						}
						
					},
					'json'
					).fail(function() {
						alert( "An Error has Occurred" );
					});
			}
			getOutfit();
			
			$('.add-armor').click(function(){
				var data = $('#create-armor').serializeObject();
				
				$.post("api/addArmor.php",
					data,
					function(data){
						alert(data.message);
						refreshInventory();
					},
					'json'
					).fail(function() {
						alert( "An Error has Occurred" );
					});
			});
			
			function removeInventory(name){
				$.post("api/removeArmor.php",
					{name:name},
					function(data){
						alert(data.message);
					},
					'json'
					).fail(function() {
						alert( "An Error has Occurred" );
					});
			}
			
			$('.equiped').change(function(){
				var data = $('#outfit').serializeObject();
				$.post("api/saveOutfit.php",
					data,
					function(data){
						alert(data.message);
					},
					'json'
					)
				.fail(function(error) {
					console.log(error);
					alert( "An Error has Occurred11" );
				});
				
			});
			
		});
		$.fn.serializeObject = function()
		{
			var o = {};
			var a = this.serializeArray();
			$.each(a, function() {
				if (o[this.name] !== undefined) {
					if (!o[this.name].push) {
						o[this.name] = [o[this.name]];
					}
					o[this.name].push(this.value || '');
				} else {
					o[this.name] = this.value || '';
				}
			});
			return o;
		};
		
		</script>
		
	</body>
</html>