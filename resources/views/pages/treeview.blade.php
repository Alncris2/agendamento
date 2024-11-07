@extends('layouts.vertical', ['title' => 'Rizz'])

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Listree Example</h4>
                    </div><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <ul class="listree">
                    <li>
                        <div class="listree-submenu-heading">Metrics</div>
                        <ul class="listree-submenu-items">
                            <li>
                                <div class="listree-submenu-heading">Daily Metrics</div>
                                <ul class="listree-submenu-items">
                                    <li>
                                        <div class="listree-submenu-heading">Daily Order Metrics</div>
                                        <ul class="listree-submenu-items">
                                            <li>
                                                <div class="listree-submenu-heading">Categorywise Daily order metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Categorywise daily order count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Categorywise daily bookings</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="listree-submenu-heading">Storewise Daily order metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Storewise daily order count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Storewise daily bookings</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="listree-submenu-heading">Daily Invoice Metrics</div>
                                        <ul class="listree-submenu-items">
                                            <li>
                                                <div class="listree-submenu-heading">Categorywise Daily invoice metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Categorywise daily invoice count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Categorywise daily revenue</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="listree-submenu-heading">Storewise Daily invoice metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Storewise daily invoice count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Storewise daily revenue</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="listree-submenu-heading">Monthly Metrics</div>
                                <ul class="listree-submenu-items">
                                    <li>
                                        <div class="listree-submenu-heading">Monthly Order Metrics</div>
                                        <ul class="listree-submenu-items">
                                            <li>
                                                <div class="listree-submenu-heading">Categorywise Monthly order metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Categorywise monthly order count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Categorywise monthly bookings</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="listree-submenu-heading">Storewise Monthly order metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Storewise monthly order count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Storewise monthly bookings</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="listree-submenu-heading">Monthly Invoice Metrics</div>
                                        <ul class="listree-submenu-items">
                                            <li>
                                                <div class="listree-submenu-heading">Categorywise Monthly invoice metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Categorywise monthly invoice count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Categorywise monthly revenue</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="listree-submenu-heading">Storewise Monthly invoice metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Storewise monthly invoice count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Storewise monthly revenue</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="listree-submenu-heading">Settings</div>
                        <ul class="listree-submenu-items">
                            <li>
                                <div class="listree-submenu-heading">Personal Settings</div>
                                <ul class="listree-submenu-items">
                                    <li><a href="">Password Settings</a></li>
                                    <li><a href="">Viewing Preferences</a></li>
                                </ul>
                            </li>
                            <li>
                                <div class="listree-submenu-heading">Org Settings</div>
                                <ul class="listree-submenu-items">
                                    <li><a href="">Teams</a></li>
                                    <li><a href="">Billing</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
    <div class="col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Listree Custom Folder Icon</h4>
                    </div><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <ul class="listree folder-icon">
                    <li>
                        <div class="listree-submenu-heading">Metrics</div>
                        <ul class="listree-submenu-items">
                            <li>
                                <div class="listree-submenu-heading">Daily Metrics</div>
                                <ul class="listree-submenu-items">
                                    <li>
                                        <div class="listree-submenu-heading">Daily Order Metrics</div>
                                        <ul class="listree-submenu-items">
                                            <li>
                                                <div class="listree-submenu-heading">Categorywise Daily order metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Categorywise daily order count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Categorywise daily bookings</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="listree-submenu-heading">Storewise Daily order metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Storewise daily order count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Storewise daily bookings</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="listree-submenu-heading">Daily Invoice Metrics</div>
                                        <ul class="listree-submenu-items">
                                            <li>
                                                <div class="listree-submenu-heading">Categorywise Daily invoice metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Categorywise daily invoice count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Categorywise daily revenue</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="listree-submenu-heading">Storewise Daily invoice metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Storewise daily invoice count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Storewise daily revenue</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="listree-submenu-heading">Monthly Metrics</div>
                                <ul class="listree-submenu-items">
                                    <li>
                                        <div class="listree-submenu-heading">Monthly Order Metrics</div>
                                        <ul class="listree-submenu-items">
                                            <li>
                                                <div class="listree-submenu-heading">Categorywise Monthly order metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Categorywise monthly order count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Categorywise monthly bookings</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="listree-submenu-heading">Storewise Monthly order metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Storewise monthly order count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Storewise monthly bookings</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="listree-submenu-heading">Monthly Invoice Metrics</div>
                                        <ul class="listree-submenu-items">
                                            <li>
                                                <div class="listree-submenu-heading">Categorywise Monthly invoice metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Categorywise monthly invoice count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Categorywise monthly revenue</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="listree-submenu-heading">Storewise Monthly invoice metrics</div>
                                                <ul class="listree-submenu-items">
                                                    <li>
                                                        <a href="">Storewise monthly invoice count</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Storewise monthly revenue</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="listree-submenu-heading">Settings</div>
                        <ul class="listree-submenu-items">
                            <li>
                                <div class="listree-submenu-heading">Personal Settings</div>
                                <ul class="listree-submenu-items">
                                    <li><a href="">Password Settings</a></li>
                                    <li><a href="">Viewing Preferences</a></li>
                                </ul>
                            </li>
                            <li>
                                <div class="listree-submenu-heading">Org Settings</div>
                                <ul class="listree-submenu-items">
                                    <li><a href="">Teams</a></li>
                                    <li><a href="">Billing</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
</div><!--end row-->

@endsection

@section('script')
@vite(['resources/js/pages/tree.init.js'])
@endsection