@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 col-xl-6 grid-margin stretch-card">
        <div class="row w-100 flex-grow">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Statistik Inventory Kantor</p>
                <p class="text-muted">Monitoring data inventaris kantor secara 24 jam</p>
                <div class="row mb-3">
                  <div class="col-md-7">
                    <div class="d-flex justify-content-between traffic-status">
                      <div class="item">
                        <p class="mb-">Total Inventaris</p>
                        <h5 class="font-weight-bold mb-0">245</h5>
                        <div class="color-border"></div>
                      </div>
                      <div class="item">
                        <p class="mb-">Barang Dipinjam</p>
                        <h5 class="font-weight-bold mb-0">18</h5>
                        <div class="color-border"></div>
                      </div>
                      <div class="item">
                        <p class="mb-">Stok Tersedia</p>
                        <h5 class="font-weight-bold mb-0">227</h5>
                        <div class="color-border"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <ul class="nav nav-pills nav-pills-custom justify-content-md-end" id="pills-tab-custom"
                      role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab-custom" data-toggle="pill"
                          href="#pills-health" role="tab" aria-controls="pills-home" aria-selected="true">
                          Day
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab-custom" data-toggle="pill" href="#pills-career"
                          role="tab" aria-controls="pills-profile" aria-selected="false">
                          Week
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#pills-music"
                          role="tab" aria-controls="pills-contact" aria-selected="false">
                          Month
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <canvas id="audience-chart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-xl-6 grid-margin stretch-card">
        <div class="row w-100 flex-grow">
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Kondisi Barang</p>
                <div class="regional-chart-legend d-flex align-items-center flex-wrap mb-1"
                  id="regional-chart-legend"></div>
                <canvas height="430" id="regional-chart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body pb-0">
                <div class="d-flex align-items-center mb-4">
                  <p class="card-title mb-0 mr-1">Aktifitas Inventaris</p>
                  <div class="badge badge-info badge-pill">2</div>
                </div>
                <div class="d-flex flex-wrap pt-2">
                  <div class="mr-4 mb-lg-2 mb-xl-0">
                    <p>Barang Baru Ditambahkan</p>
                    <h4 class="font-weight-bold mb-0">92 %</h4>
                  </div>
                  <div>
                    <p>Pengembalian Barang</p>
                    <h4 class="font-weight-bold mb-0">8 %</h4>
                  </div>
                </div>
              </div>
              <canvas height="150" id="activity-chart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Daftar Barang Inventaris</h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Kode Barang
                    </th>
                    <th>
                      Nama Barang
                    </th>
                    <th>
                      Kategori
                    </th>
                    <th>
                      Stok
                    </th>
                    <th>
                      Kondisi
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="py-1">
                      <img src="images/faces/face1.jpg" alt="image"/>
                    </td>
                    <td>
                      Herman Beck
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 77.99
                    </td>
                    <td>
                      May 15, 2015
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="images/faces/face2.jpg" alt="image"/>
                    </td>
                    <td>
                      Messsy Adam
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $245.30
                    </td>
                    <td>
                      July 1, 2015
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="images/faces/face3.jpg" alt="image"/>
                    </td>
                    <td>
                      John Richards
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $138.00
                    </td>
                    <td>
                      Apr 12, 2015
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="images/faces/face4.jpg" alt="image"/>
                    </td>
                    <td>
                      Peter Meggik
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 77.99
                    </td>
                    <td>
                      May 15, 2015
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="images/faces/face5.jpg" alt="image"/>
                    </td>
                    <td>
                      Edward
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 160.25
                    </td>
                    <td>
                      May 03, 2015
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="images/faces/face6.jpg" alt="image"/>
                    </td>
                    <td>
                      John Doe
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 123.21
                    </td>
                    <td>
                      April 05, 2015
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="images/faces/face7.jpg" alt="image"/>
                    </td>
                    <td>
                      Henry Tom
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 150.00
                    </td>
                    <td>
                      June 16, 2015
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- row end -->
  </div>
@endsection

@push('scripts')
  <!-- Script khusus halaman dashboard diletakkan di sini agar tidak meload di halaman lain -->
  <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush