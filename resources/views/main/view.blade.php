@extends('layouts.app')
@section('content')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('main.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
                            Home
                        </a>
                        <a class="nav-link" href="{{ route('main.records') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Status
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="container">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Marital Register</h3>
                        </div>
                        <div class="card-body">                            
                            <form action="{{ route('main.view.update', $view->id) }}" method="POST">
                                @method('PUT')
                                @csrf                        
                                <!-- Form fields -->
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" name="first_name" type="text"
                                                placeholder="Enter your first name"  value="{{ $view->first_name }}"/>
                                            <label for="inputFirstName">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputMiddleName" name="middle_name"
                                                type="text" placeholder="Enter your middle name" value="{{ $view->middle_name }}" />
                                            <label for="inputMiddleName">Middle Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input class="form-control" id="inputLastName" name="last_name" type="text"
                                                placeholder="Enter your last name" value="{{ $view->last_name }}" />
                                            <label for="inputLastName">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label d-block">Gender</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="genderMale" name="gender"
                                            value="male" @if($view->gender == 'male') checked @endif />
                                        <label class="form-check-label" for="genderMale">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="genderFemale" name="gender"
                                            value="female" @if($view->gender == 'female') checked @endif />
                                        <label class="form-check-label" for="genderFemale">Female</label>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputBirthdate" name="birthdate" type="date"
                                        placeholder="Enter your birthdate" value="{{ $view->birthdate }}"  />
                                    <label for="inputBirthdate">Birthdate</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="inputCivilStatus" name="civil_status"
                                        aria-label="Civil Status">
                                        <option value="single" @if($view->civil_status == 'single') selected @endif>Single</option>
                                        <option value="married" @if($view->civil_status == 'married') selected @endif>Married</option>
                                        <option value="widow" @if($view->civil_status == 'widow') selected @endif>Widow</option>
                                        <option value="divorced" @if($view->civil_status == 'divorced') selected @endif>Divorced</option>
                                    </select>
                                    <label for="inputCivilStatus">Civil Status</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="inputReligion" name="religion" aria-label="Religion">
                                        <option value="catholic" @if($view->religion == 'catholic') selected @endif>Roman Catholic</option>
                                        <option value="inc" @if($view->religion == 'inc') selected @endif>Iglesia ni Cristo (INC)</option>
                                        <option value="evangelical" @if($view->religion == 'evangelical') selected @endif>Evangelical/Protestant</option>
                                        <option value="islam" @if($view->religion == 'islam') selected @endif>Islam</option>
                                        <option value="aglipayan" @if($view->religion == 'aglipayan') selected @endif>Aglipayan (Philippine Independent Church)</option>
                                        <option value="buddhism" @if($view->religion == 'buddhism') selected @endif>Buddhism</option>
                                        <option value="hinduism" @if($view->religion == 'hinduism') selected @endif>Hinduism</option>
                                        <option value="jehovahs_witness" @if($view->religion == 'jehovahs_witness') selected @endif>Jehovah’s Witnesses</option>
                                        <option value="seventh_day_adventist" @if($view->religion == 'seventh_day_adventist') selected @endif>Seventh-day Adventist</option>
                                        <option value="lds" @if($view->religion == 'lds') selected @endif>Church of Jesus Christ of Latter-day Saints (LDS/Mormons)</option>
                                        <option value="indigenous" @if($view->religion == 'indigenous') selected @endif>Indigenous Religions</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    <label for="inputReligion">Religion</label>
                                </div>                                
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputPhoneNumber" name="phone_number" type="tel"
                                        placeholder="Enter your phone number" value="{{ $view->phone_number }}" />
                                    <label for="inputPhoneNumber">Phone Number</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputAddress" name="address" type="text"
                                        placeholder="Enter your address" value="{{ $view->address }}" />
                                    <label for="inputAddress">Address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputMotherName" name="mother_name" type="text"
                                        placeholder="Enter your mother's name" value="{{ $view->mother_name }}" />
                                    <label for="inputMotherName">Mother's Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputFatherName" name="father_name" type="text"
                                        placeholder="Enter your father's name" value="{{ $view->father_name }}" />
                                    <label for="inputFatherName">Father's Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputCitizenship" name="citizenship" type="text"
                                        placeholder="Enter your citizenship" value="{{ $view->citizenship }}" />
                                    <label for="inputCitizenship">Citizenship</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputNationality" name="nationality" type="text"
                                        placeholder="Enter your nationality" value="{{ $view->nationality }}" />
                                    <label for="inputNationality">Nationality</label>
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-block" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main><br><br>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
