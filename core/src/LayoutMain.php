<?php
/**
 * @link https://github.com/rogertiongdev/RTadminlte RTadminlte GitHub project
 * @license https://rogertiongdev.github.io/MIT-License/
 *
 * AdminLTE main layout.
 *
 * @version 0.1
 * @author Roger Tiong RTdev
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <base href="<?php print BASEURL; ?>"/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php print $this->configData['title']; ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php print WEB_ASSETS; ?>bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php print WEB_ASSETS; ?>plugins/select2/select2.min.css">
        <link rel="stylesheet" href="<?php print WEB_ASSETS; ?>plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="<?php print WEB_ASSETS; ?>plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php print WEB_ASSETS; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php print WEB_ASSETS; ?>plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="<?php print WEB_ASSETS; ?>css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php print WEB_ASSETS; ?>css/skins/_all-skins.min.css">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            .scrollToTop{
                width:40px;
                height: 40px;
                color:rgb(238, 238, 238);
                line-height:40px;
                text-align:center;
                background-color:rgb(34, 45, 50);
                cursor:pointer;
                border-radius:5px;
                z-index:99999;
                opacity: 0.3;
                position:fixed;
                right:25px;
                bottom:55px;
                display:none;
            }
        </style>
        <?php print $this->configData['head_add']; ?>
    </head>
    <body class="hold-transition <?php print sprintf('%s %s', $this->configData['skin'], $this->configData['layout_type']); ?> sidebar-mini">
        <script src="<?php print WEB_ASSETS; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
        <div class="wrapper">
            <header class="main-header">
                <a class="logo">
                    <span class="logo-mini"><?php print $this->configData['logo_mini']; ?></span>
                    <span class="logo-lg"><?php print $this->configData['logo_lg']; ?></span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <?php print $this->configData['header_menu_add']; ?>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php print $this->configData['header_user_before']; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <?php print $this->configData['header_user_after']; ?>
                                    </li>
                                    <li class="user-footer">
                                        <?php print $this->configData['header_user_footer']; ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <?php print $this->configData['navi_head']; ?>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="header"><?php print $this->configData['navi_header']; ?></li>
                        <?php print $this->configData['navi_list']; ?>
                    </ul>
                </section>
            </aside>
            <div class="content-wrapper">
                <?php print $this->configData['content']; ?>
            </div>
            <?php print $this->configData['htmlextra']; ?>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <?php print $this->configData['version']; ?>
                </div>
                <?php print $this->configData['copyright']; ?>
            </footer>
            <div class="scrollToTop">
                <i class="fa fa-chevron-up"></i>
            </div>
        </div>
        <script src="<?php print WEB_ASSETS; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/select2/select2.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/daterangepicker/daterangepicker.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/fastclick/fastclick.js"></script>
        <script src="<?php print WEB_ASSETS; ?>js/app.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/chartjs/Chart.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>js/demo.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/datatablesRT/jquery.dataTables.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/datatablesRT/dataTables.bootstrap.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/datatablesRT/dataTables.buttons.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/datatablesRT/buttons.bootstrap.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/datatablesRT/jszip.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/datatablesRT/pdfmake.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/datatablesRT/vfs_fonts.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/datatablesRT/buttons.flash.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/datatablesRT/buttons.html5.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/datatablesRT/buttons.print.min.js"></script>
        <script src="<?php print WEB_ASSETS; ?>plugins/datatablesRT/buttons.colVis.min.js"></script>
        <script type="text/javascript">

            $(document).ready(function () {
                /** Check to see if the window is top if not then display button **/
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 100) {
                        $('.scrollToTop').fadeIn();
                    } else {
                        $('.scrollToTop').fadeOut();
                    }
                });
                /** Click event to scroll to top **/
                $('.scrollToTop').click(function () {
                    $('html, body').animate({scrollTop: 0}, 800);
                    return false;
                });
            });

        </script>
        <?php
        print $this->configData['script_src_add'];
        print $this->configData['scripts'];
        ?>
    </body>
</html>