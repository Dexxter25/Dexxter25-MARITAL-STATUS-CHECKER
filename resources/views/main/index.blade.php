@extends('layouts.app')
@section('content')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link active" style="background-color: pink" href="{{ route('main.index') }}">
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
                            <!-- resources/views/main/index.blade.php -->
                            <form action="{{ route('marital.records.store') }}" method="POST" id="maritalForm">
                                @method('POST')
                                @csrf
                                <!-- Form fields -->
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" name="first_name" type="text"
                                                placeholder="Enter your first name"/>
                                            <label for="inputFirstName">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputMiddleName" name="middle_name"
                                                type="text" placeholder="Enter your middle name" />
                                            <label for="inputMiddleName">Middle Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input class="form-control" id="inputLastName" name="last_name" type="text"
                                                placeholder="Enter your last name" />
                                            <label for="inputLastName">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label d-block">Gender</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="genderMale" name="gender"
                                            value="male" />
                                        <label class="form-check-label" for="genderMale">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="genderFemale" name="gender"
                                            value="female" />
                                        <label class="form-check-label" for="genderFemale">Female</label>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputBirthdate" name="birthdate" type="date"
                                        placeholder="Enter your birthdate" />
                                    <label for="inputBirthdate">Birthdate</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="inputCivilStatus" name="civil_status"
                                        aria-label="Civil Status">
                                        <option value="">Select Civil Status</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="widow">Widow</option>
                                        <option value="divorced">Divorced</option>
                                    </select>
                                    <label for="inputCivilStatus">Civil Status</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="inputReligion" name="religion" aria-label="Religion">
                                        <option value="">Select Religion</option>
                                        <option value="catholic">Roman Catholic</option>
                                        <option value="inc">Iglesia ni Cristo (INC)</option>
                                        <option value="evangelical">Evangelical/Protestant</option>
                                        <option value="islam">Islam</option>
                                        <option value="aglipayan">Aglipayan (Philippine Independent Church)</option>
                                        <option value="buddhism">Buddhism</option>
                                        <option value="hinduism">Hinduism</option>
                                        <option value="jehovahs_witness">Jehovah’s Witnesses</option>
                                        <option value="seventh_day_adventist">Seventh-day Adventist</option>
                                        <option value="lds">Church of Jesus Christ of Latter-day Saints (LDS/Mormons)
                                        </option>
                                        <option value="indigenous">Indigenous Religions</option>
                                    </select>
                                    <label for="inputReligion">Religion</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputPhoneNumber" name="phone_number" type="tel"
                                        placeholder="Enter your phone number" />
                                    <label for="inputPhoneNumber">Phone Number</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputAddress" name="address" type="text"
                                        placeholder="Enter your address" />
                                    <label for="inputAddress">Address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputMotherName" name="mother_name" type="text"
                                        placeholder="Enter your mother's name" />
                                    <label for="inputMotherName">Mother's Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputFatherName" name="father_name" type="text"
                                        placeholder="Enter your father's name" />
                                    <label for="inputFatherName">Father's Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputCitizenship" name="citizenship" type="text"
                                        placeholder="Enter your citizenship" />
                                    <label for="inputCitizenship">Citizenship</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputNationality" name="nationality" type="text"
                                        placeholder="Enter your nationality" />
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
        </div>
    </div>
    <script>
        document.getElementById('maritalForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Validate form fields
            let valid = true;
            let errorMsg = '';

            const requiredFields = [
                { id: 'inputFirstName', name: 'First Name' },
                { id: 'inputLastName', name: 'Last Name' },
                { id: 'inputBirthdate', name: 'Birthdate' },
                { id: 'inputCivilStatus', name: 'Civil Status' },
                { id: 'inputPhoneNumber', name: 'Phone Number' },
                { id: 'inputAddress', name: 'Address' },
                { id: 'inputMotherName', name: 'Mother\'s Name' },
                { id: 'inputFatherName', name: 'Father\'s Name' },
                { id: 'inputCitizenship', name: 'Citizenship' },
                { id: 'inputNationality', name: 'Nationality' },
            ];

            requiredFields.forEach(field => {
                const input = document.getElementById(field.id);
                if (!input.value.trim()) {
                    valid = false;
                    errorMsg += `${field.name} is required.<br><br>`;
                }
            });

            if (!valid) {
                Swal.fire({
                    title: "Error!",
                    html: errorMsg,
                    icon: "error",
                    confirmButtonText: "OK"
                });
                return;
            }

            Swal.fire({
                title: "Save Successfully",
                text: "Your data has been saved successfully!",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        });

        window.deleteConfirm = function(e) {
            e.preventDefault();
            var form = e.target.form;
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
@endsection
