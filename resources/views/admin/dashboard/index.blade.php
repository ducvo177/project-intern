@extends('layouts.admin')
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-sm-3 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-primary">
                                        <i class="fe fe-users"></i>
                                    </span>
                                    <div class="dash-count">
                                        <a href="#" class="count-title">Thành viên</a>
                                        <a href="#" class="count"> 10,320</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-3 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-warning">
                                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                                    </span>
                                    <div class="dash-count">
                                        <a href="#" class="count-title">Danh mục</a>
                                        <a href="#" class="count"> 14,628</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-3 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-danger">
                                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                                    </span>
                                    <div class="dash-count">
                                        <a href="#" class="count-title">Sản phẩm</a>
                                        <a href="#" class="count"> 2,980</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-3 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-info">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </span>
                                    <div class="dash-count">
                                        <a href="#" class="count-title">Đơn đặt hàng</a>
                                        <a href="#" class="count"> 2,980</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex">

                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h4 class="card-title float-start">Đơn đặt hàng mới nhất</h4>
                                <div class="table-search float-end">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive no-radius">
                                    <table class="table table-hover table-center">
                                        <thead>
                                          <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Tên khách hàng</th>
                                            <th class="text-center">Số lượng sản phẩm</th>
                                            <th class="text-center">Tổng tiền</th>
                                            <th class="text-end">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td class="text-nowrap">
                                              <div class="font-weight-600">06456546</div>
                                            </td>
                                            <td class="text-nowrap">
                                              <div class="font-weight-600">20-10-2021</div>
                                            </td>
                                            <td class="text-nowrap">Scott Albright</td>
                                            <td class="text-center">20 Jan 2019</td>
                                            <td class="text-center">15 mins ago</td>
                                            <td class="text-end">
                                              <div class="actions">
                                                <a
                                                  href="#"
                                                  class="btn btn-sm bg-success-light me-2"
                                                >
                                                  <i class="fe fe-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm bg-danger-light">
                                                  <i class="fe fe-close"></i>
                                                </a>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td class="text-nowrap">
                                              <div class="font-weight-600">06456546</div>
                                            </td>
                                            <td class="text-nowrap">
                                              <div class="font-weight-600">20-10-2021</div>
                                            </td>
                                            <td class="text-nowrap">Kevin Howard</td>
                                            <td class="text-center">10 Mar 2019</td>
                                            <td class="text-center">Just Now</td>
                                            <td class="text-end">
                                              <div class="actions">
                                                <a
                                                  href="#"
                                                  class="btn btn-sm bg-success-light me-2"
                                                >
                                                  <i class="fe fe-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm bg-danger-light">
                                                  <i class="fe fe-close"></i>
                                                </a>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td class="text-nowrap">
                                              <div class="font-weight-600">06456546</div>
                                            </td>
                                            <td class="text-nowrap">
                                              <div class="font-weight-600">20-10-2021</div>
                                            </td>
                                            <td class="text-nowrap">Eric Knight</td>
                                            <td class="text-center">24 Jun 2019</td>
                                            <td class="text-center">1 hr ago</td>
                                            <td class="text-end">
                                              <div class="actions">
                                                <a
                                                  href="#"
                                                  class="btn btn-sm bg-success-light me-2"
                                                >
                                                  <i class="fe fe-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm bg-danger-light">
                                                  <i class="fe fe-close"></i>
                                                </a>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td class="text-nowrap">
                                              <div class="font-weight-600">06456546</div>
                                            </td>
                                            <td class="text-nowrap">
                                              <div class="font-weight-600">20-10-2021</div>
                                            </td>
                                            <td class="text-nowrap">Irene Perkins</td>
                                            <td class="text-center">09 Sep 2019</td>
                                            <td class="text-center">3 mins ago</td>
                                            <td class="text-end">
                                              <div class="actions">
                                                <a
                                                  href="#"
                                                  class="btn btn-sm bg-success-light me-2"
                                                >
                                                  <i class="fe fe-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm bg-danger-light">
                                                  <i class="fe fe-close"></i>
                                                </a>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td class="text-nowrap">
                                              <div class="font-weight-600">06456546</div>
                                            </td>
                                            <td class="text-nowrap">
                                              <div class="font-weight-600">20-10-2021</div>
                                            </td>
                                            <td class="text-nowrap">Carol Andre</td>
                                            <td class="text-center">10 Oct 2020</td>
                                            <td class="text-center">1 day ago</td>
                                            <td class="text-end">
                                              <div class="actions">
                                                <a
                                                  href="#"
                                                  class="btn btn-sm bg-success-light me-2"
                                                >
                                                  <i class="fe fe-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm bg-danger-light">
                                                  <i class="fe fe-close"></i>
                                                </a>
                                              </div>
                                            </td>
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
