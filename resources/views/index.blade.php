@extends('layouts.app')

@section('content')
<div class="nk-content-body">
    <div class="nk-block">
        <div class="row">
            <div class="col-xxl-4 col-sm-4">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Total Products</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="amount">945</div>
                                    <div class="nk-ecwg6-ck">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="info"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>4.63%</span><span> vs. last week</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-sm-4">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Total Customers</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="amount">745</div>
                                    <div class="nk-ecwg6-ck">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="info"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>4.63%</span><span> vs. last week</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-sm-4">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Total Orders</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="amount">1,094</div>
                                    <div class="nk-ecwg6-ck">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="info"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>4.63%</span><span> vs. last week</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-gs mt-1">
            <div class="col-xxl-6">
                <div class="row g-gs">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-inner">
                                <div class="card-title-group align-start mb-2">
                                    <div class="card-title">
                                        <h6 class="title">Cards</h6>
                                        <p>In last 30 days Cards </p>
                                    </div>
                                    <div class="card-tools"><em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title=""></em></div>
                                </div>
                                <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                    <div class="nk-sale-data-group flex-md-nowrap g-4">
                                        <div class="nk-sale-data">
                                            <span class="amount">
                                                5490 <span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>16.93%</span>
                                            </span>
                                            <span class="sub-title">This Month</span>
                                        </div>
                                        <div class="nk-sale-data">
                                            <span class="amount">
                                                1480<span class="change up text-success"><em class="icon ni ni-arrow-long-up"></em>4.26%</span>
                                            </span>
                                            <span class="sub-title">This Week</span>
                                        </div>
                                    </div>
                                    <div class="nk-sales-ck sales-revenue">
                                        <canvas height="70px" id="barChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xxl-8">
                <div class="card h-100">
                    <div class="card-inner">
                        <div class="card-title-group align-start pb-3 g-2">
                            <div class="card-title card-title-sm">
                                <h6 class="title">New Products</h6>
                            </div>
                            <div class="card-tools"><em class="card-hint icon ni ni-help" data-bs-toggle="tooltip" data-bs-placement="left" title="Users of this month"></em></div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 50px;"></th>
                                    <th>Product Name</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img style="width: 100%;" src="" alt=""></td>
                                    <td>Product</td>
                                    <td><strong>$ 125.20</strong></td>
                                </tr>
                                <tr>
                                    <td><img style="width: 100%;" src="" alt=""></td>
                                    <td>Product</td>
                                    <td><strong>$ 125.20</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="card card-full overflow-hidden">
                    <div class="nk-ecwg nk-ecwg4 h-100">
                        <div class="card-inner flex-grow-1">
                            <div class="card-title-group mb-4">
                                <div class="card-title">
                                    <h6 class="title">Top Agent</h6>
                                </div>
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Lorem Name</td>
                                        <td>lorem@mail.com</td>
                                    </tr>
                                    <tr>
                                        <td>Lorem Name</td>
                                        <td>lorem@mail.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection