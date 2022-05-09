<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from ableproadmin.com/7.0/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Apr 2022 13:54:43 GMT -->

<head>
    <title>{{ $judul }}</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Gradient Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->

    <link rel="icon" href="https://ableproadmin.com/7.0/files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="/admin_tampil/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="/admin_tampil/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="/admin_tampil/assets/icon/feather/css/feather.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="/admin_tampil/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="/admin_tampil/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="/admin_tampil/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/admin_tampil/assets/css/pages.css">
</head>

<body themebg-pattern="theme1">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->


                    <div class="text-center">
                        <img src="/admin_tampil/assets/images/logo.png" alt="logo.png">
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verify Your Email Address</div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <a href="{{ url('/reset-password/' . $token) }}">Click Here</a>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>


    <!-- Required Jquery -->
    <script type="text/javascript" src="/admin_tampil/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="/admin_tampil/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/admin_tampil/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="/admin_tampil/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- waves js -->
    <script src="/admin_tampil/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="/admin_tampil/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="/admin_tampil/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="/admin_tampil/bower_components/modernizr/js/css-scrollbars.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="/admin_tampil/bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript" src="/admin_tampil/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js">
    </script>
    <script type="text/javascript"
        src="/admin_tampil/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js">
    </script>
    <script type="text/javascript" src="/admin_tampil/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <script type="text/javascript" src="/admin_tampil/assets/js/common-pages.js"></script>
    <script type="text/javascript" src="/admin_tampil/assets/js/analytics.js"></script>


    <!-- Custom js -->
    <script src="/admin_tampil/assets/js/pcoded.min.js"></script>
    <script type="text/javascript" src="/admin_tampil/assets/js/script.min.js"></script>

</body>


<script src="path/to/dist/feather.js"></script>

<!-- choose one -->
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

<script>
    feather.replace()
</script>

<!-- Mirrored from ableproadmin.com/7.0/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Apr 2022 13:54:43 GMT -->

</html>

