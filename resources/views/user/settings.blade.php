@extends('layouts.user-panel')

@section('panel')

    <div class="tab-pane fade show active">
        <div class="myaccount-content">
            <h3>Account Details</h3>
            <div class="account-details-form">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="first-name" class="required">First Name</label>
                                <input type="text" id="first-name"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="last-name" class="required">Last Name</label>
                                <input type="text" id="last-name"/>
                            </div>
                        </div>
                    </div>
                    <div class="single-input-item">
                        <label for="display-name" class="required">Display Name</label>
                        <input type="text" id="display-name"/>
                    </div>
                    <div class="single-input-item">
                        <label for="email" class="required">Email Addres</label>
                        <input type="email" id="email"/>
                    </div>
                    <fieldset>
                        <legend>Password change</legend>
                        <div class="single-input-item">
                            <label for="current-pwd" class="required">Current Password</label>
                            <input type="password" id="current-pwd"/>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="new-pwd" class="required">New Password</label>
                                    <input type="password" id="new-pwd"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="confirm-pwd" class="required">Confirm Password</label>
                                    <input type="password" id="confirm-pwd"/>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="single-input-item">
                        <button class="check-btn sqr-btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection