<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table class="table table-bordered table-striped">
	    <thead>
	      <tr>
	        <th style="text-align:center">No</th>
	        <th style="text-align:center">Tanggal Pembelian</th>
	        <th style="text-align:center">Jatuh Tempo</th>
	        <th style="text-align:center">Cara Pembelian</th>
	        <th style="text-align:center">Pemasok</th>
	        <th style="text-align:center">Total</th>
	        <th style="text-align:center">Pegawai</th>
	      </tr>
	    </thead>
	    <tbody>
	    <?php $no=1; ?>
	    @foreach($data as $datas)
	    <tr>
	      <td>{{$no++}}</td>
	      <td>{{date_format(date_create("$datas->tanggal_pembelian"), "d F Y")}}</td>
	      <td>{{date_format(date_create("$datas->tanggal_jatuh_tempo"), "d F Y")}}</td>
	      <td>{{$datas->cara_pembelian}}</td>
	      <td>{{$datas->nama_pemasok}}</td>
	      <td>{{$datas->total_bayar}}</td>
	      <td>{{$datas->nama_pengguna}}</td>
	    </tr>
	    @endforeach
	    </tbody>
    </table>
</body>
</html>