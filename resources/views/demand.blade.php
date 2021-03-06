
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

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
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
  font-size: 0.8em;
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
    <title>Contoh Aja</title>
  </head>
  <body>
    <header class="clearfix">
      <h1>Laporan Detail Pembelian <br/> Assalam Jaya</h1>
      <div id="company" class="clearfix">
        <div>Assalam Jaya</div>
        <div>Jl. Kemiri - Pituruh,<br /> Desa Rejosari RT. 0/1</div>
        <div>Kec. Kemiri, Kab. Purworejo</div>
        <div>HP. 081 280 477 648</div>
      </div>
      <div id="project">
        <div><span>Tanggal</span> {{date_format(date_create("$tanggal_cetak"), "d F Y")}}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">ID</th>
            <th class="desc">Tanggal Penjualan</th>
            <th class="desc">Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data1 as $a)
          <tr>
            <td class="service">{{$a->id_detail_penjualan}}</td>
            <td class="desc">{{date_format(date_create("$a->tanggal_penjualan"), "d F Y")}}</td>
            <td class="desc">{{$a->nama_barang}}</td>
            <td class="unit">{{ number_format($a->harga_jual, 2)}}</td>
            <td class="qty">{{$a->jumlah_barang}}</td>
            <td class="total">{{ number_format($a->total_harga, 2)}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </main>
    <footer>
      Data yang tercetak dari komputer, sah tanpa tanda tangan dan cap
    </footer>
  </body>
</html>

