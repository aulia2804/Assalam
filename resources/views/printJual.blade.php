
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
    <title>Penjualan</title>
  </head>
  <body>
    <header class="clearfix">
      <h4>Assalam Jaya <br/> Jl. Kemiri-Pituruh, Ds. Rejosari RT.0/1, Kemiri, Purworejo <br/> No. Telp : 081 280 477 648</h4>
      @foreach($data2 as $a)
      <div id="project">
        <div>Kepada :</div>
        <div>{{$a->nama_pelanggan}}</div>
        <div>{{$a->alamat_pelanggan}}</div>
        <div>{{$a->kontak_pelanggan}}</div>
      </div>
      @endforeach
      <br>
      <br>
      <br>
      <br>
      <br>
      @foreach($data1 as $b)
        <div id="project">
          <div>Cara Penjualan :{{$b->cara_penjualan}}</div>
          <div>Tanggal Penjualan :{{date_format(date_create("$b->tanggal_penjualan"), "d F Y")}}</div>
        </div>
      @endforeach
    </header>
    <main>
      <h4 style="text-align: center;">Detail Barang</h4>
      <br>
      <table>
        <thead>
          <tr>
            <th class="service">No</th>
            <th class="desc">Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; ?>
          @foreach($data3 as $c)
          <tr>
            <td class="service">{{$no++}}</td>
            <td class="desc">{{$c->nama_barang}}</td>
            <td class="unit">{{$c->harga_beli}}</td>
            <td class="qty">{{$c->jumlah_barang}}</td>
            <td class="total">{{$c->total_harga}}</td>
          </tr>
          @endforeach

          @foreach($data1 as $d)
          <tr>
            <td colspan="4">Total</td>
            <td class="total">{{$d->total_bayar}}</td>
          </tr>
          <tr>
            <td colspan="4">Dibayarkan</td>
            <td class="total">{{$d->uang_muka}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <br>
      <h4>Riwayat Pembayaran</h4>
      <br>
      <table>
        <thead>
          <tr>
            <th class="service">No</th>
            <th class="desc">Tanggal</th>
            <th>Jumlah Uang</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; ?>
          @foreach($data4 as $d)
          <tr>
            <td class="service">{{$no++}}</td>
            <td class="desc">{{date_format(date_create("$d->tanggal_pelunasan_piutang"), "d F Y")}}</td>
            <td class="unit">{{$d->bayar_piutang}}</td>
            <td class="qty">{{$d->status}}</td>
          </tr>
          @endforeach
          @foreach($data1 as $d)
          <tr>
            <td colspan="3" class="grand total">Sisa Pembayaran</td>
            <td class="grand total">{{$d->sisa_piutang}}</td>
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
