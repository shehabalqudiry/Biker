<!doctype html>
<html lang="ar_SA" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>لوحة التحكم</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('build') }}/css/simplebar.css">
    <!-- Fonts CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('build') }}/css/feather.css">
    <link rel="stylesheet" href="{{ asset('build') }}/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ asset('build') }}/css/select2.css">
    <link rel="stylesheet" href="{{ asset('build') }}/css/dropzone.css">
    <link rel="stylesheet" href="{{ asset('build') }}/css/uppy.min.css">
    <link rel="stylesheet" href="{{ asset('build') }}/css/jquery.steps.css">
    <link rel="stylesheet" href="{{ asset('build') }}/css/jquery.timepicker.css">
    <link rel="stylesheet" href="{{ asset('build') }}/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('build') }}/css/daterangepicker.css">
    <!-- App CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('build') }}/css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{ asset('build') }}/css/app-dark.css" id="darkTheme">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <!-- Styles -->
    <style>
        body {
            font-family: "Cairo", sans-serif;
            font-size: 1rem;
            font-weight: 500;
        }

        .select2-container--bootstrap4 .select2-selection--single {
            height: 3.5rem !important;
            padding: 0.75rem 1.75rem !important;
        }

        .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
            line-height: 1.6;
        }

        .dropdown-toggle::after {
            border-top: none
        }
    </style>
    @yield('styles')
    {{-- @livewireStyles --}}
    <link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css" />
</head>

<body class="dark rtl">
    <div class="wrapper">
        @if (session()->has('success'))
            <div style="position: absolute;z-index: 4444444444444;left: 35px;top: 80px;max-width: calc(100% - 70px);padding: 16px 22px;border-radius: 7px;overflow: hidden;width: 273px;border-right: 8px solid #374b52;background: #3ad29f;color: #fff;cursor: pointer;"
                onclick="$(this).slideUp();" class="messageNoti">
                <span class="fas fa-info-circle"></span> {{ session()->get('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="col-12 justify-content-end d-flex">
                <div class="col-12" style="position: absolute;top: 80px;left: 10px;" class="messageNoti">
                    {!! implode(
                        '',
                        $errors->all(
                            '<div class="alert-click-hide alert alert-danger alert alert-danger col-9 col-xl-3 rounded-0 mb-1" style="position: fixed!important;z-index: 11;opacity:.9;left:25px;cursor:pointer;" onclick="$(this).fadeOut();">:message</div>',
                        ),
                    ) !!}
                </div>
            </div>
        @endif
        <div class="container-fluid">
            @yield('content')
        </div> <!-- .container-fluid -->
    </div>
    @stack('modals')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('build') }}/js/jquery.min.js"></script>
    <script src="{{ asset('build') }}/js/jquery.repeater.js"></script>
    <script src="{{ asset('build') }}/js/popper.min.js"></script>
    <script src="{{ asset('build') }}/js/moment.min.js"></script>
    <script src="{{ asset('build') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('build') }}/js/simplebar.min.js"></script>
    <script src="{{ asset('build') }}/js/daterangepicker.js"></script>
    <script src="{{ asset('build') }}/js/jquery.stickOnScroll.js"></script>
    <script src="{{ asset('build') }}/js/tinycolor-min.js"></script>
    <script src="{{ asset('build') }}/js/config.js"></script>
    <script src="{{ asset('build') }}/js/d3.min.js"></script>
    <script src="{{ asset('build') }}/js/topojson.min.js"></script>
    <script src="{{ asset('build') }}/js/datamaps.all.min.js"></script>
    <script src="{{ asset('build') }}/js/datamaps-zoomto.js"></script>
    <script src="{{ asset('build') }}/js/datamaps.custom.js"></script>
    <script src="{{ asset('build') }}/js/Chart.min.js"></script>
    <script>
        /* defind global options */
        Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
        Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{ asset('build') }}/js/gauge.min.js"></script>
    <script src="{{ asset('build') }}/js/jquery.sparkline.min.js"></script>
    <script src="{{ asset('build') }}/js/apexcharts.min.js"></script>
    <script src="{{ asset('build') }}/js/apexcharts.custom.js"></script>
    <script src="{{ asset('build') }}/js/jquery.mask.min.js"></script>
    <script src="{{ asset('build') }}/js/select2.min.js"></script>
    <script src="{{ asset('build') }}/js/jquery.steps.min.js"></script>
    <script src="{{ asset('build') }}/js/jquery.validate.min.js"></script>
    <script src="{{ asset('build') }}/js/jquery.timepicker.js"></script>
    <script src="{{ asset('build') }}/js/dropzone.min.js"></script>
    <script src="{{ asset('build') }}/js/uppy.min.js"></script>
    <script src="{{ asset('build') }}/js/quill.min.js"></script>
    <script src="{{ asset('build') }}/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('build') }}/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script>
        var stepper1Node = document.querySelector('#stepper1')
        var stepper1 = new Stepper(document.querySelector('#stepper1'))

        stepper1Node.addEventListener('show.bs-stepper', function(event) {
            console.warn('show.bs-stepper', event);
        })
        stepper1Node.addEventListener('shown.bs-stepper', function(event) {
            console.warn('shown.bs-stepper', event);
        })
        setTimeout(function() {
            $('.messageNoti').fadeOut('fast');
        }, 3000);
        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });

        $('.drgpicker').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale: {
                format: 'MM/DD/YYYY'
            }
        });
        {{ asset('build') }} /
            $('.time-input').timepicker({
                'scrollDefault': 'now',
                'zindex': '9999' /* fix modal open */
            });
        /** date range picker */
        if ($('.datetimes').length) {
            $('.datetimes').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });
        }
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            }
        }, cb);
        cb(start, end);
        $('.input-placeholder').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('.input-zip').mask('00000-000', {
            placeholder: "____-___"
        });
        $('.input-money').mask("#.##0,00", {
            reverse: true
        });
        $('.input-phoneus').mask('(000) 000-0000');
        $('.input-mixed').mask('AAA 000-S0S');
        $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            },
            placeholder: "___.___.___.___"
        });
        // editor
        var editor = document.getElementById('editor');
        if (editor) {
            var toolbarOptions = [
                [{
                    'font': []
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{
                        'header': 1
                    },
                    {
                        'header': 2
                    }
                ],
                [{
                        'list': 'ordered'
                    },
                    {
                        'list': 'bullet'
                    }
                ],
                [{
                        'script': 'sub'
                    },
                    {
                        'script': 'super'
                    }
                ],
                [{
                        'indent': '-1'
                    },
                    {
                        'indent': '+1'
                    }
                ], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction
                [{
                        'color': []
                    },
                    {
                        'background': []
                    }
                ], // dropdown with defaults from theme
                [{
                    'align': []
                }],
                ['clean'] // remove formatting button
            ];
            var quill = new Quill(editor, {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script>
        var uptarg = document.getElementById('drag-drop-area');
        if (uptarg) {
            var uppy = Uppy.Core().use(Uppy.Dashboard, {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
            }).use(Uppy.Tus, {
                endpoint: 'https://master.tus.io/files/'
            });
            uppy.on('complete', (result) => {
                console.log('Upload complete! We’ve uploaded these files:', result.successful)
            });
        }
    </script>
    {{-- @livewireScripts --}}
    <script src="{{ asset('build') }}/js/apps.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());
        gtag('config', 'UA-56159088-1');
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap4',
            });
            $('.select2-multi').select2({
                multiple: true,
                theme: 'bootstrap4',
            });
            $('.select2-container').css('width', '100%');
            $('.repeater').repeater({
                show: function() {
                    $(this).slideDown();
                    var type = $("#type").val();
                    if (type == '1') {
                        $(".offerCollect").hide();
                        $(".offerDefault2").show();
                        $(".offerPerson").hide();
                    } else if (type == '2') {
                        $(".offerDefault2").hide();
                        $(".offerDefault").hide();
                        $(".offerCollect").show();
                        $(".offerPerson").hide();

                    } else if (type == '3') {
                        $(".offerDefault").hide();
                        $(".offerCollect").hide();
                        $(".offerPerson").show();
                    }
                    $('.select2-container').remove();
                    $('.select2').select2({
                        theme: 'bootstrap4',
                    });
                    $('.select2-multi').select2({
                        multiple: true,
                        theme: 'bootstrap4',
                    });
                    $('.select2-container').css('width', '100%');
                },
                hide: function(remove) {
                    if (confirm('Confirm Question')) {
                        $(this).slideUp(remove);
                    }
                }
            });
            $('.dataTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/ar.json"
                }
            });
            document.addEventListener("livewire:load", () => {
                Livewire.hook('message.processed', (message, component) => {
                    $('.select2').select2({
                        theme: 'bootstrap4',
                    });
                    $('.select2-multi').select2({
                        multiple: true,
                        theme: 'bootstrap4',
                    });
                });
            });
        });
    </script>

    @stack('scripts')
    @yield('scripts')
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

</body>

</html>
