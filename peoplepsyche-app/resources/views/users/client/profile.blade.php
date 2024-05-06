@extends('layout.dashboard')

@section('page-title')
    Profile
@endsection

@section('content')
    <!-- PROFILE -->
    <div class="d-flex mt-5 justify-content-center">
        <i id="profile-pic" class="fa-regular fa-user"></i>
    </div>
    <div class="d-flex mt-3 justify-content-center">

        <!-- DISPLAY INFORMATION -->
        <div id="profile-info">
            <div class="row">
                <p><span class="fw-bold">Full Name:</span>
                    <span id="givenName">Jungkook</span>
                    <span id="middleName"></span>
                    <span id="lastName">Jeon</span>
                    <span id="suffixName"></span>
                </p>
            </div>
            <div class="row">
                <p> <span class="fw-bold">Contact Number:</span>
                    <span id="phoneNum">09123456789</span>
                </p>
            </div>
            <div class="row">
                <p> <span class="fw-bold">Birthday:</span>
                    <span id="birthday">1997-09-01</span>
                </p>
            </div>
            <div class="row">
                <p> <span class="fw-bold">Sex:</span>
                    <span id="sex">Male</span>
                </p>
            </div>
            <div class="row">
                <p> <span class="fw-bold">Civil Status:</span>
                    <span id="civilStat">Single</span>
                </p>
            </div>
            <div class="row">
                <p> <span class="fw-bold">Religion:</span>
                    <span id="religion"></span>
                </p>
            </div>
            <div class="row">
                <p><span class="fw-bold">Address:</span>
                    <span id="address">Seoul, South Korea</span>
                </p>
            </div>
            <div class="row">
                <button onclick="edit()" type="button" class="btn"><i class="fa-regular fa-pen-to-square" style="padding-right: 5px;"></i>Edit Profile</button>
            </div>
        </div>

        <!-- EDIT INFORMATION -->
        <form id="profile-form" class="form-hidden" onsubmit="save(event)">
            <fieldset>
                <div class="row">
                    <p><span class="fw-bold">Full Name:</span>
                        <input id="new-givenName" type="name" class="form-control" placeholder="Given Name">
                        <input id="new-middleName" type="name" class="form-control" placeholder="Middle Name">
                        <input id="new-lastName" type="name" class="form-control" placeholder="Last Name">
                        <input id="new-suffixName" type="name" class="form-control" placeholder="Suffix Name">
                    </p>
                </div>
                <div class="row">
                    <p><span class="fw-bold">Contact Number:</span>
                        <input id="new-phoneNum" type="tel" class="form-control" placeholder="Contact Number">
                    </p>
                </div>
                <div class="row">
                    <p> <span class="fw-bold">Birthday:</span>
                        <input id="new-birthday" type="date" class="form-control" placeholder="Birthday">
                    </p>
                </div>
                <div class="row">
                    <p> <span class="fw-bold">Sex:</span>
                        <select class="form-select" id="new-sex">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </p>
                </div>
                <div class="row">
                    <p> <span class="fw-bold">Civil Status:</span>
                        <select class="form-select" id="new-civilStat">
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Separated">Separated</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </p>
                </div>
                <div class="row">
                    <p> <span class="fw-bold">Religion:</span>
                        <input id="new-religion" type="text" class="form-control" placeholder="Religion">
                    </p>
                </div>
                <div class="row">
                    <p><span class="fw-bold">Address:</span>
                        <input id="new-address" type="text" class="form-control" placeholder="Address">
                    </p>
                </div>
                <div class="row">
                    <button type="submit" value="Submit" class="btn"><i class="fa-regular fa-floppy-disk" style="padding-right: 5px;"></i>Save Changes</button>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
