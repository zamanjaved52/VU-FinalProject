
    <style>
        html {
            font-size: 14px;
        }
        @media (min-width: 768px) {
            html {
                font-size: 16px;
            }
        }

        .container {
            max-width: 960px;
        }

        .pricing-header {
            max-width: 700px;
        }

        .card-deck .card {
            min-width: 220px;
        }

        .border-top { border-top: 1px solid #e5e5e5; }
        .border-bottom { border-bottom: 1px solid #e5e5e5; }

        .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
    </style>
    <section >
        <div class="container-fluid h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class=" card-registration card-registration-2" >
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-4  bg-indigo text-white">
                                    <div class="p-5">
                                        <div style="margin-left: 15%;margin-top: 50%">
                                            <img src="{{asset('logo.png')}}"
                                                 height="50" width="180" alt="">
                                            <span style="word-spacing: 3px">
                                            <h4 style="margin-top:8%;font-weight: bold;">
                                                You're a few steps away<br>
                                        from creating your<br> account.
                                        </h4>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div style="margin-top: 50px; padding: 30px">
                                        <h3 class="fw-normal "><b>Pricing plans</b></h3>
                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">
                                                <label class="form-label text-style">Business logo</label>
                                                <div class="">
                                                    <div class="drag-file-area">
                                                        <p class="dynamic-message"> <b>Drag your company logo or</b> </p>
                                                        <label class="label">
                                                        <span class="browse-files"> <input type="file" class="default-file-input"/> <span class="browse-files-text">browser</span>
                                                        </span>
                                                        </label>
                                                        <p class="file-size">Max, file size: 200MB</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label text-style">Bussiness logo</label>
                                                <div class="">
                                                    <div class="drag-file-area">
                                                        <p class="dynamic-message"> <b>Drag your company logo or</b> </p>
                                                        <label class="label">
                                                            <span class="browse-files"> <input type="file" class="default-file-input"/> <span class="browse-files-text">browser</span></span>
                                                        </label>
                                                        <p class="file-size">Max, file size: 200MB</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">
                                                <div class="business">
                                                    <label class="form-label text-style">Business name</label>
                                                    <input name="business_name" placeholder="mybusiness" type="text" required="" class="form-control input-style-text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="business">
                                                    <label class="form-label text-style">Business address</label>
                                                    <input name="company_address" placeholder="3, street" type="text" required="" class="form-control input-style-text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">
                                                <label class="form-label text-style">Service Category</label>
                                                <select name="service_categories" id="service-categories" class="form-control input-style-text" style="border: none; border-bottom: 2px solid gray; border-radius: 0;">
                                                    <option class="input-style-text">Choose your service category</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label text-style">Company type</label>
                                                <select name="merchant_type" id="bussiness-types" class="form-control sizeable-opt input-style-text" style="border: none; border-bottom: 2px solid gray; border-radius: 0;">
                                                    <option class="input-style-text">Choose your company type</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">
                                                <div class="business">
                                                    <label class="form-label text-style">Website</label>
                                                    <input name="business_website" placeholder="www.website.com" type="text" required="" class="form-control input-style-text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="business">
                                                    <label class="form-label text-style">Contact Number</label>
                                                    <input name="head_office_telephone_no1" placeholder="+1 555 5555 5555" type="text" required="" class="form-control input-style-text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="business">
                                            <label class="form-label text-style">Business General Email Address</label>
                                            <input name="primary_email_address" type="text" required="" class="form-control input-style-text mb-4">
                                        </div>


                                        <button type="button" class="btn btn- btn-lg button-next-first mb-5">Next</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
