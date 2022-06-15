@extends('admin.layout.app')
@section('content')
<div class="row">
  <!-- Team Members -->
  <div class="col-md-6 col-lg-5 mb-md-0 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Team Members</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="teamMemberList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList">
            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-borderless">
          <thead>
            <tr>
              <th>Name</th>
              <th>Project</th>
              <th>Task</th>
              <th>Progress</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar me-2">
                    <img src="../../assets/img/avatars/17.png" alt="Avatar" class="rounded-circle">
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-0 text-truncate">Nathan Wagner</h6><small class="text-truncate text-muted">iOS Developer</small>
                  </div>
                </div>
              </td>
              <td><span class="badge bg-label-primary rounded-pill text-uppercase">Zipcar</span></td>
              <td><small class="fw-semibold">87/135</small></td>
              <td>
                <div class="chart-progress" data-color="primary" data-series="65"></div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar me-2">
                    <img src="../../assets/img/avatars/8.png" alt="Avatar" class="rounded-circle">
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-0 text-truncate">Emma Bowen</h6><small class="text-truncate text-muted">UI/UX Designer</small>
                  </div>
                </div>
              </td>
              <td><span class="badge bg-label-danger rounded-pill text-uppercase">Bitbank</span></td>
              <td><small class="fw-semibold">320/440</small></td>
              <td>
                <div class="chart-progress" data-color="danger" data-series="85"></div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar me-2">
                    <span class="avatar-initial rounded-circle bg-label-warning">AM</span>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-0 text-truncate">Adrian McGuire</h6><small class="text-truncate text-muted">PHP Developer</small>
                  </div>
                </div>
              </td>
              <td><span class="badge bg-label-warning rounded-pill text-uppercase">Payers</span></td>
              <td><small class="fw-semibold">50/82</small></td>
              <td>
                <div class="chart-progress" data-color="warning" data-series="73"></div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar me-2">
                    <img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-0 text-truncate">Alma Gonzalez</h6><small class="text-truncate text-muted">Product Manager</small>
                  </div>
                </div>
              </td>
              <td><span class="badge bg-label-info rounded-pill text-uppercase">Brandi</span></td>
              <td><small class="fw-semibold">98/260</small></td>
              <td>
                <div class="chart-progress" data-color="info" data-series="61"></div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar me-2">
                    <img src="../../assets/img/avatars/11.png" alt="Avatar" class="rounded-circle">
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-0 text-truncate">Allan kristian</h6><small class="text-truncate text-muted">Frontend Designer</small>
                  </div>
                </div>
              </td>
              <td><span class="badge bg-label-success rounded-pill text-uppercase">Crypter</span></td>
              <td><small class="fw-semibold">690/760</small></td>
              <td>
                <div class="chart-progress" data-color="success" data-series="77"></div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--/ Team Members -->
      <!-- Customer Table -->
  <div class="col-md-6 col-lg-7 mb-0">
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="invoice-list-table table border-top">
          <thead>
            <tr>
              <th>Customer</th>
              <th>Amount</th>
              <th>Status</th>
              <th class="cell-fit">Paid By</th>
              <th class="cell-fit">Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle"></div>
                  </div>
                  <div class="d-flex flex-column">
                    <a href="editUser/1" class="text-body text-truncate fw-semibold">Henry Barnes</a>
                    <small class="text-truncate text-muted">jok@puc.co.uk</small>
                  </div>
                </div>
              </td>
              <td>$459.65</td>
              <td><span class="badge bg-label-success"> Paid </span></td>
              <td><img src="../../assets/img/icons/payments/master-light.png" class="img-fluid" width="50" alt="masterCard" data-app-light-img="icons/payments/master-light.png" data-app-dark-img="icons/payments/master-dark.html"></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                      <a href="javascript:;" class="dropdown-item">Duplicate</a>
                      <div class="dropdown-divider"></div>
                      <a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/20.png" alt="Avatar" class="rounded-circle"></div>
                  </div>
                  <div class="d-flex flex-column">
                    <a href="pages-profile-user.html" class="text-body text-truncate fw-semibold">Hallie Warner</a>
                    <small class="text-truncate text-muted">hellie@war.co.uk</small>
                  </div>
                </div>
              </td>
              <td>$93.81</td>
              <td><span class="badge bg-label-warning"> Pending </span></td>
              <td><img src="../../assets/img/icons/payments/visa-light.png" class="img-fluid" width="50" alt="visaCard" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.html"></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                      <a href="javascript:;" class="dropdown-item">Duplicate</a>
                      <div class="dropdown-divider"></div>
                      <a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/9.png" alt="Avatar" class="rounded-circle"></div>
                  </div>
                  <div class="d-flex flex-column">
                    <a href="pages-profile-user.html" class="text-body text-truncate fw-semibold">Gerald Flowers</a>
                    <small class="text-truncate text-muted">initus@odemi.com</small>
                  </div>
                </div>
              </td>
              <td>$934.35</td>
              <td><span class="badge bg-label-warning"> Pending </span></td>
              <td><img src="../../assets/img/icons/payments/visa-light.png" class="img-fluid" width="50" alt="visaCard" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.html"></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                      <a href="javascript:;" class="dropdown-item">Duplicate</a>
                      <div class="dropdown-divider"></div>
                      <a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/14.png" alt="Avatar" class="rounded-circle"></div>
                  </div>
                  <div class="d-flex flex-column">
                    <a href="pages-profile-user.html" class="text-body text-truncate fw-semibold">John Davidson</a>
                    <small class="text-truncate text-muted">jtum@upkesja.gov</small>
                  </div>
                </div>
              </td>
              <td>$794.97</td>
              <td><span class="badge bg-label-success"> Paid </span></td>
              <td><img src="../../assets/img/icons/payments/paypal-light.png" class="img-fluid" width="50" alt="paypalCard" data-app-light-img="icons/payments/paypal-light.png" data-app-dark-img="icons/payments/paypal-dark.html"></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                      <a href="javascript:;" class="dropdown-item">Duplicate</a>
                      <div class="dropdown-divider"></div>
                      <a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-2"><span class="avatar-initial rounded-circle bg-label-warning">JH</span></div>
                  </div>
                  <div class="d-flex flex-column">
                    <a href="pages-profile-user.html" class="text-body text-truncate fw-semibold">Jayden Harris</a>
                    <small class="text-truncate text-muted">wipare@tin.com</small>
                  </div>
                </div>
              </td>
              <td>$19.49</td>
              <td><span class="badge bg-label-success"> Paid </span></td>
              <td><img src="../../assets/img/icons/payments/master-light.png" class="img-fluid" width="50" alt="masterCard" data-app-light-img="icons/payments/master-light.png" data-app-dark-img="icons/payments/master-dark.html"></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                      <a href="javascript:;" class="dropdown-item">Duplicate</a>
                      <div class="dropdown-divider"></div>
                      <a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/8.png" alt="Avatar" class="rounded-circle"></div>
                  </div>
                  <div class="d-flex flex-column">
                    <a href="pages-profile-user.html" class="text-body text-truncate fw-semibold">Rena Ferguson</a>
                    <small class="text-truncate text-muted">nur@kaomor.edu</small>
                  </div>
                </div>
              </td>
              <td>$636.27</td>
              <td><span class="badge bg-label-danger"> Failed </span></td>
              <td><img src="../../assets/img/icons/payments/paypal-light.png" class="img-fluid" width="50" alt="paypalCard" data-app-light-img="icons/payments/paypal-light.png" data-app-dark-img="icons/payments/paypal-dark.html"></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                      <a href="javascript:;" class="dropdown-item">Duplicate</a>
                      <div class="dropdown-divider"></div>
                      <a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        {{-- <x-table>
          <x-slot name="table">
            
          </x-slot>
            
        </x-table> --}}
      </div>
    </div>
  </div>
  <!--/ Customer Table -->
</div>
@endsection