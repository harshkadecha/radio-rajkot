app = Vue.createApp({
    //data , functions
    // template: '<h2>I am the Template</h2>'
    data() {
        return {


            first_name: '',
            last_name: '',
            email: '',
            gender: 'male',
            bloodgroup: 'A+',
            city: '',
            mobile: '',
            address: '',
            is_approve: '0',
            bloodbank: '',
            hospital: '',
            disease: '',
            error: ['first_name', 'last_name', 'city', 'mobile', 'g-recaptcha-response'],
            errors: 'test',
            success: ''


        }
    },
    methods: {
        handleSubmit() {
            this.error['first_name'] = this.first_name.length > 0 ?
                '' : '*First Name Required',
                this.error['last_name'] = this.last_name.length > 0 ?
                '' : '*Last Name Required',
                this.error['mobile'] = this.mobile.length > 0 ?
                '' : '*Mobile Number is Required',
                this.error['city'] = this.city.length > 0 ?
                '' : '*City Required';

            var rcres = grecaptcha.getResponse();
            if (rcres.length) {

                // alert('recapcha varified')
                this.error['g-recaptcha-response'] = ''

            } else {
                // alert('recapcha not varified')
                this.error['g-recaptcha-response'] = '*Recapcha not verified';

            }


            if (this.error['first_name'] == '' && this.error['last_name'] == '' && this.error['city'] == '' && this.error['g-recaptcha-response'] == '') {

                var url3 = window.location.href + "test1";
                $('#loading').show();
                let _this = this;
                $.ajax({
                    type: "post",
                    url: url3,
                    data: {
                        first_name: this.first_name,
                        last_name: this.last_name,
                        email: this.email,
                        gender: this.gender,
                        bloodgroup: this.bloodgroup,
                        city: this.city,
                        mobile: this.mobile,
                        address: this.address,
                        is_approve: this.is_approve,
                        bloodbank: this.bloodbank,
                        hospital: this.hospital,
                        disease: this.disease,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log(data)
                        $('#loading').hide();
                        if (data.success == true) {

                            _this.success = 'Request Sent Successfully We Will Contact you Sortly'
                            grecaptcha.reset();
                            _this.first_name = '',
                                _this.last_name = '',
                                _this.email = '',
                                _this.gender = 'male',
                                _this.bloodgroup = 'A+',
                                _this.city = '',
                                _this.mobile = '',
                                _this.bloodbank = '',
                                _this.hospital = '',
                                _this.disease = '',
                                _this.address = '';

                            function msg(mode, msg) {
                                var isRtl = $('html').attr('data-textdirection') === 'rtl',
                                    typeSuccess = $('#type-success'),
                                    typeInfo = $('#type-info'),
                                    typeWarning = $('#type-warning'),
                                    typeError = $('#type-error'),
                                    positionTopLeft = $('#position-top-left'),
                                    positionTopCenter = $('#position-top-center'),
                                    positionTopRight = $('#position-top-right'),
                                    positionTopFull = $('#position-top-full'),
                                    positionBottomLeft = $('#position-bottom-left'),
                                    positionBottomCenter = $('#position-bottom-center'),
                                    positionBottomRight = $('#position-bottom-right'),
                                    positionBottomFull = $('#position-bottom-full'),
                                    progressBar = $('#progress-bar'),
                                    clearToastBtn = $('#clear-toast-btn'),
                                    fastDuration = $('#fast-duration'),
                                    slowDuration = $('#slow-duration'),
                                    toastrTimeout = $('#timeout'),
                                    toastrSticky = $('#sticky'),
                                    slideToast = $('#slide-toast'),
                                    fadeToast = $('#fade-toast'),
                                    clearToastObj;

                                setTimeout(function() {
                                    toastr['success'](
                                        msg, {
                                            closeButton: true,
                                            tapToDismiss: false,
                                            rtl: isRtl
                                        }
                                    );
                                }, 2000);
                            }
                            msg('success', 'your request is sent');


                        } else {

                            try {
                                let entries = Object.entries(data);
                                let entries2 = Object.entries(entries[1]);
                                console.log(entries2);

                                if (data.response.first_name != undefined) {
                                    _this.error['first_name'] = data.response.first_name[0]
                                }
                                if (data.response.last_name != undefined) {
                                    _this.error['last_name'] = data.response.last_name[0]
                                }
                                if (data.response.city != undefined) {
                                    _this.error['city'] = data.response.city[0]
                                }
                                if (data.response.mobile != undefined) {
                                    _this.error['mobile'] = data.response.mobile[0]
                                }

                            } catch (e) {
                                console.log(e);
                                console.log(data);

                            } finally {
                                console.log(data);

                            }




                        }

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status);
                        alert(xhr.responseText);
                        alert(url3);
                        $(document).text(xhr.responseText);
                        alert(thrownError);
                    }
                });
            }

        },
        myFunction() {
            alert('test')
            document.getElementById("reset").click();
        }
    }
})

app.mount("#app")
