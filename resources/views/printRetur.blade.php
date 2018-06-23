
<!DOCTYPE html>
<html lang="en">
  <style type="text/css">

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 19cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h4 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 1.5em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 1em;
}

#company {
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 50%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
  </style>
  <head>
    <meta charset="utf-8">
    <title>Retur</title>
  </head>
  <body>
    <header class="clearfix">
      <h4>Assalam Jaya <br/> Jl. Kemiri-Pituruh, Ds. Rejosari RT.0/1, Kemiri, Purworejo <br/> No. Telp : 081 280 477 648</h4>
      @foreach($b as $data1)
      <div id="project">
        <div>Kepada :</div>
        <div>{{$data1->nama_pemasok}}</div>
        <div>{{$data1->alamat_pemasok}}</div>
        <div>{{$data1->kontak_pemasok}}</div>
      </div>
      @endforeach
      <br>
      <br>
      <br>
      <br>
      <br>
      @foreach($a as $data2)
        <div id="project">
          <div>Cara Pembelian :{{$data2->cara_pembelian}}</div>
          <div>Tanggal Pembelian :{{date_format(date_create("$data2->tanggal_pembelian"), "d F Y")}}</div>
          <div>Tanggal Jatuh Tempo :{{date_format(date_create("$data2->tanggal_jatuh_tempo"), "d F Y")}}</div>
        </div>
      @endforeach
    </header>
    <main>
      <h4 style="text-align: center;">Detail Retur Barang</h4>
      <br>
      <table>
        <thead>
          <tr>
            <th class="service">No</th>
            <th class="desc">Tanggal Retur</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Deskripsi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; ?>
          @foreach($c as $data3)
          <tr>
            <td class="service">{{$no++}}</td>
            <td class="desc">{{date_format(date_create("$data3->tanggal_retur"), "d F Y")}}</td>
            <td class="unit">{{$data3->nama_barang}}</td>
            <td class="qty">{{$data3->jumlah_barang}}</td>
            <td class="total">{{$data3->deskripsi_retur}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <footer>
      <div>Tanggal Cetak : {{date_format(date_create("$tanggal_cetak"), "d F Y")}}</div>
      Data yang tercetak dari komputer, sah tanpa tanda tangan dan cap
    </footer>
  </body>
</html>
