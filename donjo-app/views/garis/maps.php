<script type="text/javascript" src="<?=base_url()?>assets/js/polygon.min.js"></script>
<script>
	function PolygonCreator(map){
		this.map=map;this.pen=new Pen(this.map);
		var thisOjb=this;
		var jalur = "";
		this.event=google.maps.event.addListener(thisOjb.map,'click',function(event){thisOjb.pen.draw(event.latLng);jalur+=event.latLng;jalur+=";";});
		
		this.showData=function(){return this.pen.getData();}
		
		this.showColor=function(){return this.pen.getColor();}
		this.showJalur=function(){return jalur;}
		
		this.destroy=function(){
			this.pen.deleteMis();
			if(null!=this.pen.polygon){
				this.pen.polygon.remove();
			}
		google.maps.event.removeListener(this.event);
		}
	}
	
	$(function(){

    var options = {
		<?if($desa['lat']!=""){?>
		  center: new google.maps.LatLng(<?=$desa['lat']?>,<?=$desa['lng']?>),
		  zoom: <?=$desa['zoom']?>,
		  mapTypeId: google.maps.MapTypeId.<?=strtoupper($desa['map_tipe'])?>
		<?}else{?>
		  center: new google.maps.LatLng(-7.885619783139936,110.39893195996092),
		  zoom: 14,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		<?}?>
    };
    var map = new google.maps.Map(document.getElementById('map'), options);


<?
			$path = preg_split("/\;/", $garis['path']);
			echo "var path = [";foreach($path AS $p){if($p!=""){echo"new google.maps.LatLng".$p.",";}}echo"];";?>
			
    // Creating the polyline object
    var polyline = new google.maps.Polyline({
      path: path,
      strokeColor: "#00ff00",
      strokeOpacity: 0.6,
      strokeWeight: 5
    });
    
    // Adding the polyline to the map
    polyline.setMap(map);
  
			    	 
<?/*
			$path_desa = preg_split("/\;/", $desa['path']);
			echo "var path_desa = [";foreach($path_desa AS $p){if($p!=""){echo"new google.maps.LatLng".$p.",";}}echo"];";?>
			
			var desa = new google.maps.Polygon({
			  paths: path_desa,
			  map: map,
			  strokeColor: '#11ddff',
			  strokeOpacity: 0.6,
			  strokeWeight: 1,
			  fillColor: '#11ddff',
			  fillOpacity: 0.25
			});
			*/?>
			google.maps.event.addListener(polyline, 'mouseover', function(e) {
			  polyline.setOptions({
				fillColor: '#0000ff',
				strokeColor: '#0000ff'
			  });
			});

			google.maps.event.addListener(polyline, 'mouseout', function(e) {
			  polyline.setOptions({
				fillColor: '#11ff00',
				strokeColor: '#11ff00'
			  });
			});
			
		var creator = new PolygonCreator(map);
		 $('#reset').click(function(){ 
		 		creator.destroy();
		 		creator=null;
		 		
		 		creator=new PolygonCreator(map);
				document.getElementById('dataPanel').value = creator.showData();
		 });		 
		 
		$('#showData').click(function(){ 
		 		$('#dataPanel').empty();
		 		if(null==creator.showJalur()){
					this.form.submit();
		 		}else{
					document.getElementById('dataPanel').value = creator.showJalur();
					this.form.submit();
		 		}
		 });
		 
	});	
	
</script>
<style>
#map {
  width: 420px;
  height: 320px;
  border: 1px solid #000;
}
</style>
	<div id="map"></div>
<form action="<?=$form_action?>" method="post">
	<input type="hidden" id="dataPanel" name="path"  value="<?=$garis['path']?>">
	<div class="buttonpane" style="text-align: right; width:400px;position:absolute;bottom:0px;">
	<div class="uibutton-group">
		<button class="uibutton" type="button" onclick="$('#window').dialog('close');">Close</button>
		<input class="uibutton confirm" id="showData"  value="Simpan" type="button"/>
	</div>
	</div>
</form>