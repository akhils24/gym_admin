@extends('layouts.app')
@section('content')
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" >
      <div>
        <h3 class="fw-bold mb-3">Dashboard</h3>
      </div>
      <div class="ms-md-auto py-2 py-md-0">
        <a href="/custview" class="btn btn-label-info btn-round me-2">Manage</a>
        <a href="/register" class="btn btn-primary btn-round">Add Customer</a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="card card-round">
          <div class="card-body">
            <div class="card-head-row card-tools-still-right">
              <div class="card-title">New Customers</div>
              <div class="card-tools">
                <div class="dropdown">
                  <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    <i class="fas fa-ellipsis-h"></i>
                  </button>
                </div>
              </div>
            </div>
            <div class="card-list py-4">
              @forelse ($customers as $user)
                <div class="item-list">
                  <div class="avatar">
                    <span class="avatar-title rounded-circle border border-white" >
                      {{ collect(explode(' ', $user->name))->map(fn($word) => strtoupper($word[0]))->take(2)->implode('') }}
                    </span>
                  </div>
                  <div class="info-user ms-3">
                    <div class="username">{{ $user->name }}</div>
                    <div class="status">{{ $user->phone }}</div>
                  </div>
                  <button class="btn btn-icon btn-link op-8 me-1">
                    <i class="far fa-envelope"></i>
                  </button>
                  <button class="btn btn-icon btn-link btn-danger op-8">
                    <i class="fas fa-ban"></i>
                  </button>
                </div>
              @empty
              <div class="item-list">
                <div class="avatar">
                  <span class="avatar-title rounded-circle border border-white" >NO</span >
                </div>
                <div class="info-user ms-3">
                  <div class="username">No Customers</div>
                  <div class="status"></div>
                </div>
                <button class="btn btn-icon btn-link op-8 me-1">
                  <i class="far fa-envelope"></i>
                </button>
                <button class="btn btn-icon btn-link btn-danger op-8">
                  <i class="fas fa-ban"></i>
                </button>
              </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row card-tools-still-right">
              <div class="card-title">Transaction History</div>
              <div class="card-tools">
                <div class="dropdown">
                  <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    <i class="fas fa-ellipsis-h"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center mb-0">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Payment Number</th>
                    <th scope="col" class="text-end">Date & Time</th>
                    <th scope="col" class="text-end">Amount</th>
                    <th scope="col" class="text-end">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($payments as $payment)
                    <tr>
                      <th scope="row">
                        <button class="btn btn-icon btn-round btn-success btn-sm me-2" >
                          <i class="fa fa-check"></i>
                        </button> Payment from #{{ $payment->customer->id }}
                      </th>
                      <td class="text-end">{{ $payment->created_at }}</td>
                      <td class="text-end">${{ $payment->amount }}</td>
                      <td class="text-end">
                        <span class="badge badge-success">Completed</span>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" class="text-center">No Payments Found</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
      