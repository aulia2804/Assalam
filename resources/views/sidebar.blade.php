<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      @if(\Illuminate\Support\Facades\Auth::user()->rule == 'Pemilik')
        <ul class="sidebar-menu" data-widget="tree">
          <li>
            <a href="{{URL::to('/beranda')}}">
              <i class="fa fa-dashboard"></i> <span>Beranda</span>
            </a>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-briefcase"></i>
              <span>Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                        
              <li><a href="{{URL::to('/pengguna')}}"><i class="fa fa-circle-o"></i> Pengguna</a></li>
              <li><a href="{{URL::to('/pelanggan')}}"><i class="fa fa-circle-o"></i> Pelanggan</a></li>
              <li><a href="{{URL::to('/pemasok')}}"><i class="fa fa-circle-o"></i> Pemasok</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-cube"></i>
              <span>Barang</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{URL::to('/barang')}}"><i class="fa fa-circle-o"></i> Barang</a></li>
              <li><a href="{{URL::to('/satuan')}}"><i class="fa fa-circle-o"></i> Satuan</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-minus"></i> <span>Pembelian</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{URL::to('/transaksi_pembelian')}}"><i class="fa fa-circle-o"></i> Transaksi Pembelian</a></li>
              <li><a href="{{URL::to('/data_transaksi_pembelian')}}"><i class="fa fa-circle-o"></i> Data Transaksi Pembelian</a></li>
              <li><a href="{{URL::to('/retur_pembelian')}}"><i class="fa fa-circle-o"></i> Retur Pembelian</a></li>
              <li><a href="{{URL::to('/data_retur_pembelian')}}"><i class="fa fa-circle-o"></i> Data Retur Pembelian</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-plus"></i> <span>Penjualan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{URL::to('/transaksi_penjualan')}}"><i class="fa fa-circle-o"></i> Transaksi Penjualan</a></li>
              <li><a href="{{URL::to('/data_transaksi_penjualan')}}"><i class="fa fa-circle-o"></i> Data Transaksi Penjualan</a></li>
            </ul>
          </li>
<!--           <li>
            <a href="{{URL::to('/kalender')}}">
              <i class="fa fa-calendar"></i> <span>Kalender</span>
            </a>
          </li> -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{URL::to('/laporan_pembelian')}}"><i class="fa fa-circle-o"></i> Laporan Pembelian</a></li>
              <li><a href="{{URL::to('/laporan_penjualan')}}"><i class="fa fa-circle-o"></i> Laporan Penjualan</a></li>
            </ul>
          </li>
        </ul>
      @else
         <ul class="sidebar-menu" data-widget="tree">
          <li>
            <a href="{{URL::to('/beranda')}}">
              <i class="fa fa-dashboard"></i> <span>Beranda</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-briefcase"></i>
              <span>Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{URL::to('/pelanggan')}}"><i class="fa fa-circle-o"></i> Pelanggan</a></li>
              <li><a href="{{URL::to('/pemasok')}}"><i class="fa fa-circle-o"></i> Pemasok</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-cube"></i>
              <span>Barang</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{URL::to('/barang')}}"><i class="fa fa-circle-o"></i> Barang</a></li>
              <li><a href="{{URL::to('/satuan')}}"><i class="fa fa-circle-o"></i> Satuan</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-minus"></i> <span>Pembelian</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{URL::to('/transaksi_pembelian')}}"><i class="fa fa-circle-o"></i> Transaksi Pembelian</a></li>
              <li><a href="{{URL::to('/data_transaksi_pembelian')}}"><i class="fa fa-circle-o"></i> Data Transaksi Pembelian</a></li>
              <li><a href="{{URL::to('/retur_pembelian')}}"><i class="fa fa-circle-o"></i> Retur Pembelian</a></li>
              <li><a href="{{URL::to('/data_retur_pembelian')}}"><i class="fa fa-circle-o"></i> Data Retur Pembelian</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-plus"></i> <span>Penjualan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{URL::to('/transaksi_penjualan')}}"><i class="fa fa-circle-o"></i> Transaksi Penjualan</a></li>
              <li><a href="{{URL::to('/data_transaksi_penjualan')}}"><i class="fa fa-circle-o"></i> Data Transaksi Penjualan</a></li>
            </ul>
          </li>
<!--           <li>
            <a href="{{URL::to('/kalender')}}">
              <i class="fa fa-calendar"></i> <span>Kalender</span>
            </a>
          </li> -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{URL::to('/laporan_pembelian')}}"><i class="fa fa-circle-o"></i> Laporan Pembelian</a></li>
              <li><a href="{{URL::to('/laporan_penjualan')}}"><i class="fa fa-circle-o"></i> Laporan Penjualan</a></li>
            </ul>
          </li>
        </ul>
      @endif
    </section>
    <!-- /.sidebar -->
  </aside>