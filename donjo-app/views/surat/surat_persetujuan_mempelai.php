<script>
$(function(){
var nik = {};
nik.results = [
<?foreach($penduduk as $data){?>
{id:'<?=$data['id']?>',name:"<?=$data['nik']." - ".($data['nama'])?>",info:"<?=($data['alamat'])?>"},
<?}?>
];

$('#nik').flexbox(nik, {
resultTemplate: '<div><label>No nik : </label>{name}</div><div>{info}</div>',
watermark: <?if($individu){?>'<?=$individu['nik']?> - <?=spaceunpenetration($individu['nama'])?>'<?}else{?>'Ketik no nik di sini..'<?}?>,
width: 260,
noResultsText :'Tidak ada no nik yang sesuai..',
onSelect: function() {
$('#'+'main').submit();
}  
});

});
</script>

<style>
table.form.detail th{
padding:5px;
background:#fafafa;
border-right:1px solid #eee;
}
table.form.detail td{
padding:5px;
}
</style>
<div id="pageC">
<table class="inner">
<tr style="vertical-align:top">
<td class="side-menu">
<fieldset>
<legend>Surat Administrasi</legend>
<div  id="sidecontent2" class="lmenu">
<ul>
<?foreach($menu_surat AS $data){?>
        <li <? if($data['url_surat']==$lap){?>class="selected"<? }?>><a href="<?=site_url()?>surat/<?=$data['url_surat']?>"><?=unpenetration($data['nama'])?></a></li>
<?}?>
</ul>
</div>
</fieldset>
</td>
<td style="background:#fff;padding:5px;"> 
<div class="content-header">

</div>
<div id="contentpane">
<div class="ui-layout-north panel">
<h3>Surat Persetujuan Mempelai</h3>
</div>
<div class="ui-layout-center" id="maincontent" style="padding: 5px;" >
<form id="validasi" action="<?=$form_action?>" method="POST" target="_blank">
<table class="form">

<tr>
	<th>Nomor Surat</th>
	<td><input name="nomor" type="text" class="inputbox required" size="30"/></td>
</tr>
<tr>
<th>DATA SUAMI (Berasal dari desa)			:</th>
</tr>
<tr>
<th>Nama Suami</th>
<td>
<select name="suami"  class="inputbox ">
<option value="">Pilih Penduduk</option>

<? foreach($laki AS $data){?>
<option value="<?=$data['id']?>" ><font style="bold">  <?=$data['nama']?></font> -(<?=$data['nik']?>)</option>
<? }?>
</select>
*) Diisi jika suami berasal dari dalam desa</td>
</tr>

<th>DATA SUAMI (Berasal dari luar desa)		:</th>
<tr>
	<th>Nama Lengkap</th>
	<td><input name="nama_suami" type="text" class="inputbox " size="30"/>*) Diisi jika suami berasal dari luar desa</td>
</tr>
<tr>
	<th>Bin</th>
	<td><input name="bin_suami" type="text" class="inputbox " size="30"/></td>
</tr>
<tr>
	<th>Tempat Tanggal Lahir</th>
	<td><input name="tempatlahir_suami" type="text" class="inputbox " size="30"/>  
	<input name="tanggallahir_suami" type="text" class="inputbox  datepicker" size="20"/></td>
</tr>
<tr>
	<th>Warganegara</th>
	<td><input name="wn_suami" type="text" class="inputbox " size="15"/></td>
</tr>
<tr>
	<th>Agama</th>
	<td><input name="agama_suami" type="text" class="inputbox " size="15"/></td>
</tr>
<tr>
	<th>Pekerjaan</th>
	<td><input name="pekerjaan_suami" type="text" class="inputbox " size="30"/></td>
</tr>
<tr>
	<th>Tempat Tinggal</th>
	<td><input name="tempat_tinggal_suami" type="text" class="inputbox " size="40"/></td>
</tr>
<tr>
<th>DATA ISTRI (Berasal dari desa)			:</th>
</tr>
<tr>
<th>Nama Istri</th>
<td>
<select name="istri"  class="inputbox ">
<option value="">Pilih Penduduk</option>

<? foreach($perempuan AS $data){?>
<option value="<?=$data['id']?>" ><font style="bold">  <?=$data['nama']?></font> -(<?=$data['nik']?>)</option>
<? }?>
</select>
*) Diisi jika istri berasal dari dalam desa</td>
</tr>
<th>DATA ISTRI (Berasal dari luar desa)		:</th>
</tr>
<tr>
	<th>Nama Lengkap</th>
	<td><input name="nama_istri" type="text" class="inputbox " size="30"/>*) Diisi jika istri berasal dari luar desa</td>
</tr>
<tr>
	<th>Bin</th>
	<td><input name="bin_istri" type="text" class="inputbox " size="30"/></td>
</tr>
<tr>
	<th>Tempat Tanggal Lahir</th>
	<td><input name="tempatlahir_istri" type="text" class="inputbox " size="30"/> 
	<input name="tanggallahir_istri" type="text" class="inputbox  datepicker" size="20"/></td>
</tr>
<tr>
	<th>Warganegara</th>
	<td><input name="wn_istri" type="text" class="inputbox " size="15"/></td>
</tr>
<tr>
	<th>Agama</th>
	<td><input name="agama_istri" type="text" class="inputbox " size="15"/></td>
</tr>
<tr>
	<th>Pekerjaan</th>
	<td><input name="pekerjaan_istri" type="text" class="inputbox " size="30"/></td>
</tr>
<tr>
	<th>Tempat Tinggal</th>
	<td><input name="tempat_tinggal_istri" type="text" class="inputbox " size="40"/></td>
</tr>

</table>
</div>
   
<div class="ui-layout-south panel bottom">
<div class="left">     
<a href="<?=site_url()?>sid_wilayah" class="uibutton icon prev">Kembali</a>
</div>
<div class="right">
<div class="uibutton-group">
<button class="uibutton" type="reset">Clear</button>
<button class="uibutton confirm" type="submit" >Cetak</button>
</div>
</div>
</div> </form>
</div>
</td></tr></table>
</div>