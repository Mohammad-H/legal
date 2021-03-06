<!DOCTYPE html>
<html lang="en" dir="rtl" xmlns="http://www.w3.org/1999/html">
<head>
    <base href="<?= URL_SITE ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MEHRABANI-admin</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="public/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="public/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="public/admin/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="public/admin/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="public/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="public/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="public/admin/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="public/admin/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/admin/assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="public/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="public/admin/assets/js/plugins/forms/selects/select2.min.js"></script>

    <script type="text/javascript" src="public/admin/assets/js/core/app.js"></script>
    <!-- <script type="text/javascript" src="public/admin/assets/js/pages/datatables_api.js"></script> -->
<!--    <script type="text/javascript" src="public/admin/assets/js/pages/datatables_data_sources.js"></script>-->
    <script type="text/javascript">
    $(function() {


    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
    autoWidth: false,
    columnDefs: [{
    orderable: false,
    width: '100px',
    targets: [ 5 ]
    }],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
    search: '<span>Filter:</span> _INPUT_',
    searchPlaceholder: 'Type to filter...',
    lengthMenu: '<span>Show:</span> _MENU_',
    paginate: { 'first': 'First', 'last': 'Last', 'next': '&larr;', 'previous': '&rarr;' }
    },
    drawCallback: function () {
    $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
    },
    preDrawCallback: function() {
    $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
    }
    });

    // AJAX sourced data
    $('.datatable-ajax').dataTable({
        /*"processing": true,
        "serverSide": true,*/
    ajax: 'http://localhost/legal/admindashboard/getAjax',

        columns: [
            { data: "user_id" },
            { data: "username" },
            { data: "first_name" },
            { data: "last_name" },
            { data: "gender" },
            { data: "status" },
        ]
    });

        // Individual column searching with text inputs
        // $('.datatable-column-search-inputs tfoot td').not(':last-child')
        $('.datatable-column-search-inputs tfoot td').each(function () {
            var title = $('.datatable-column-search-inputs thead th').eq($(this).index()).text();
            $(this).html('<input type="text" class="form-control input-sm" placeholder="Search '+title+'" />');
        });
        var table = $('.datatable-column-search-inputs').DataTable();
        table.columns().every( function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                that.search(this.value).draw();
            });
        });

        // Multiple rows selection
        $('.datatable-selection-multiple').DataTable();
        $('.datatable-selection-multiple tbody').on('click', 'tr', function() {
            $(this).toggleClass('success');
        });


        // External table additions
    // ------------------------------

    // Enable Select2 select for the length option
    /*$('.dataTables_length select').select2({
    minimumResultsForSearch: Infinity,
    width: 'auto'
    });*/

        // Enable Select2 select for individual column searching
//        $('.filter-select').select2();

    });
</script>
    <script type="text/javascript" src="public/admin/assets/js/plugins/ui/ripple.min.js"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse bg-indigo">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-puzzle3"></i>
                    <span class="visible-xs-inline-block position-right">Git updates</span>
                    <span class="status-mark border-orange-400"></span>
                </a>

                <div class="dropdown-menu dropdown-content">
                    <div class="dropdown-content-heading">
                        Git updates
                        <ul class="icons-list">
                            <li><a href="#"><i class="icon-sync"></i></a></li>
                        </ul>
                    </div>

                    <ul class="media-list dropdown-content-body width-350">
                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
                            </div>

                            <div class="media-body">
                                Drop the IE <a href="#">specific hacks</a> for temporal inputs
                                <div class="media-annotation">4 minutes ago</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-commit"></i></a>
                            </div>

                            <div class="media-body">
                                Add full font overrides for popovers and tooltips
                                <div class="media-annotation">36 minutes ago</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-branch"></i></a>
                            </div>

                            <div class="media-body">
                                <a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch
                                <div class="media-annotation">2 hours ago</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-merge"></i></a>
                            </div>

                            <div class="media-body">
                                <a href="#">Eugene Kopyov</a> merged <span class="text-semibold">Master</span> and <span class="text-semibold">Dev</span> branches
                                <div class="media-annotation">Dec 18, 18:36</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
                            </div>

                            <div class="media-body">
                                Have Carousel ignore keyboard events
                                <div class="media-annotation">Dec 12, 05:46</div>
                            </div>
                        </li>
                    </ul>

                    <div class="dropdown-content-footer">
                        <a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>
        </ul>

        <div class="navbar-right">
            <p class="navbar-text">Morning, Victoria!</p>
            <p class="navbar-text"><span class="label bg-success-400">Online</span></p>

            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-bell2"></i>
                        <span class="visible-xs-inline-block position-right">Activity</span>
                        <span class="status-mark border-orange-400"></span>
                    </a>

                    <div class="dropdown-menu dropdown-content">
                        <div class="dropdown-content-heading">
                            Activity
                            <ul class="icons-list">
                                <li><a href="#"><i class="icon-menu7"></i></a></li>
                            </ul>
                        </div>

                        <ul class="media-list dropdown-content-body width-350">
                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs"><i class="icon-mention"></i></a>
                                </div>

                                <div class="media-body">
                                    <a href="#">Taylor Swift</a> mentioned you in a post "Angular JS. Tips and tricks"
                                    <div class="media-annotation">4 minutes ago</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn bg-pink-400 btn-rounded btn-icon btn-xs"><i class="icon-paperplane"></i></a>
                                </div>

                                <div class="media-body">
                                    Special offers have been sent to subscribed users by <a href="#">Donna Gordon</a>
                                    <div class="media-annotation">36 minutes ago</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn bg-blue btn-rounded btn-icon btn-xs"><i class="icon-plus3"></i></a>
                                </div>

                                <div class="media-body">
                                    <a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch in <span class="text-semibold">MEHRABANI</span> repository
                                    <div class="media-annotation">2 hours ago</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn bg-purple-300 btn-rounded btn-icon btn-xs"><i class="icon-truck"></i></a>
                                </div>

                                <div class="media-body">
                                    Shipping cost to the Netherlands has been reduced, database updated
                                    <div class="media-annotation">Feb 8, 11:30</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn bg-warning-400 btn-rounded btn-icon btn-xs"><i class="icon-bubble8"></i></a>
                                </div>

                                <div class="media-body">
                                    New review received on <a href="#">Server side integration</a> services
                                    <div class="media-annotation">Feb 2, 10:20</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn bg-teal-400 btn-rounded btn-icon btn-xs"><i class="icon-spinner11"></i></a>
                                </div>

                                <div class="media-body">
                                    <strong>January, 2016</strong> - 1320 new users, 3284 orders, $49,390 revenue
                                    <div class="media-annotation">Feb 1, 05:46</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-bubble8"></i>
                        <span class="visible-xs-inline-block position-right">Messages</span>
                        <span class="status-mark border-orange-400"></span>
                    </a>

                    <div class="dropdown-menu dropdown-content width-350">
                        <div class="dropdown-content-heading">
                            Messages
                            <ul class="icons-list">
                                <li><a href="#"><i class="icon-compose"></i></a></li>
                            </ul>
                        </div>

                        <ul class="media-list dropdown-content-body">
                            <li class="media">
                                <div class="media-left">
                                    <img src="public/admin/assets/images/demo/users/face10.jpg" class="img-circle img-sm" alt="">
                                    <span class="badge bg-danger-400 media-badge">5</span>
                                </div>

                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">James Alexander</span>
                                        <span class="media-annotation pull-right">04:58</span>
                                    </a>

                                    <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="public/admin/assets/images/demo/users/face3.jpg" class="img-circle img-sm" alt="">
                                    <span class="badge bg-danger-400 media-badge">4</span>
                                </div>

                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Margo Baker</span>
                                        <span class="media-annotation pull-right">12:16</span>
                                    </a>

                                    <span class="text-muted">That was something he was unable to do because...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left"><img src="public/admin/assets/images/demo/users/face24.jpg" class="img-circle img-sm" alt=""></div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Jeremy Victorino</span>
                                        <span class="media-annotation pull-right">22:48</span>
                                    </a>

                                    <span class="text-muted">But that would be extremely strained and suspicious...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left"><img src="public/admin/assets/images/demo/users/face4.jpg" class="img-circle img-sm" alt=""></div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Beatrix Diaz</span>
                                        <span class="media-annotation pull-right">Tue</span>
                                    </a>

                                    <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left"><img src="public/admin/assets/images/demo/users/face25.jpg" class="img-circle img-sm" alt=""></div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Richard Vango</span>
                                        <span class="media-annotation pull-right">Mon</span>
                                    </a>

                                    <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                                </div>
                            </li>
                        </ul>

                        <div class="dropdown-content-footer">
                            <a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main sidebar-default">
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user-material">
                    <div class="category-content">
                        <div class="sidebar-user-material-content">
                            <a href="#"><img src="public/admin/assets/images/demo/users/face11.jpg" class="img-circle img-responsive" alt=""></a>
                            <h6>Victoria Baker</h6>
                            <span class="text-size-small">Santa Ana, CA</span>
                        </div>

                        <div class="sidebar-user-material-menu">
                            <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                        </div>
                    </div>

                    <div class="navigation-wrapper collapse" id="user-nav">
                        <ul class="navigation">
                            <li><a href="#"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
                            <li><a href="#"><i class="icon-coins"></i> <span>My balance</span></a></li>
                            <li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
                            <li><a href="#"><i class="icon-switch2"></i> <span>Logout</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">

                            <!-- Main -->
                            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                            <li><a href="index.html"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                            <li>
                                <a href="#"><i class="icon-stack2"></i> <span>Page layouts</span></a>
                                <ul>
                                    <li><a href="layout_navbar_fixed.html">Fixed navbar</a></li>
                                    <li><a href="layout_navbar_sidebar_fixed.html">Fixed navbar &amp; sidebar</a></li>
                                    <li><a href="layout_sidebar_fixed_native.html">Fixed sidebar native scroll</a></li>
                                    <li><a href="layout_navbar_hideable.html">Hideable navbar</a></li>
                                    <li><a href="layout_navbar_hideable_sidebar.html">Hideable &amp; fixed sidebar</a></li>
                                    <li><a href="layout_footer_fixed.html">Fixed footer</a></li>
                                    <li class="navigation-divider"></li>
                                    <li><a href="boxed_default.html">Boxed with default sidebar</a></li>
                                    <li><a href="boxed_mini.html">Boxed with mini sidebar</a></li>
                                    <li><a href="boxed_full.html">Boxed full width</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-copy"></i> <span>Layouts</span></a>
                                <ul>
                                    <li><a href="../../../layout_1/LTR/index.html" id="layout1">Layout 1</a></li>
                                    <li><a href="index.html" id="layout2">Layout 2 <span class="label bg-warning-400">Current</span></a></li>
                                    <li><a href="../../../layout_3/LTR/index.html" id="layout3">Layout 3</a></li>
                                    <li><a href="../../../layout_4/LTR/index.html" id="layout4">Layout 4</a></li>
                                    <li><a href="../../../layout_5/LTR/index.html" id="layout5">Layout 5</a></li>
                                    <li class="disabled"><a href="../../../layout_6/LTR/index.html" id="layout6">Layout 6 <span class="label label-transparent">Coming soon</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-droplet2"></i> <span>Color system</span></a>
                                <ul>
                                    <li><a href="colors_primary.html">Primary palette</a></li>
                                    <li><a href="colors_danger.html">Danger palette</a></li>
                                    <li><a href="colors_success.html">Success palette</a></li>
                                    <li><a href="colors_warning.html">Warning palette</a></li>
                                    <li><a href="colors_info.html">Info palette</a></li>
                                    <li class="navigation-divider"></li>
                                    <li><a href="colors_pink.html">Pink palette</a></li>
                                    <li><a href="colors_violet.html">Violet palette</a></li>
                                    <li><a href="colors_purple.html">Purple palette</a></li>
                                    <li><a href="colors_indigo.html">Indigo palette</a></li>
                                    <li><a href="colors_blue.html">Blue palette</a></li>
                                    <li><a href="colors_teal.html">Teal palette</a></li>
                                    <li><a href="colors_green.html">Green palette</a></li>
                                    <li><a href="colors_orange.html">Orange palette</a></li>
                                    <li><a href="colors_brown.html">Brown palette</a></li>
                                    <li><a href="colors_grey.html">Grey palette</a></li>
                                    <li><a href="colors_slate.html">Slate palette</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-stack"></i> <span>Starter kit</span></a>
                                <ul>
                                    <li><a href="starters/horizontal_nav.html">Horizontal navigation</a></li>
                                    <li><a href="starters/1_col.html">1 column</a></li>
                                    <li><a href="starters/2_col.html">2 columns</a></li>
                                    <li>
                                        <a href="#">3 columns</a>
                                        <ul>
                                            <li><a href="starters/3_col_dual.html">Dual sidebars</a></li>
                                            <li><a href="starters/3_col_double.html">Double sidebars</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="starters/4_col.html">4 columns</a></li>
                                    <li>
                                        <a href="#">Detached layout</a>
                                        <ul>
                                            <li><a href="starters/detached_left.html">Left sidebar</a></li>
                                            <li><a href="starters/detached_right.html">Right sidebar</a></li>
                                            <li><a href="starters/detached_sticky.html">Sticky sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="starters/layout_boxed.html">Boxed layout</a></li>
                                    <li class="navigation-divider"></li>
                                    <li><a href="starters/layout_navbar_fixed_main.html">Fixed main navbar</a></li>
                                    <li><a href="starters/layout_navbar_fixed_secondary.html">Fixed secondary navbar</a></li>
                                    <li><a href="starters/layout_navbar_fixed_both.html">Both navbars fixed</a></li>
                                    <li><a href="starters/layout_fixed.html">Fixed layout</a></li>
                                </ul>
                            </li>
                            <li><a href="changelog.html"><i class="icon-list-unordered"></i> <span>Changelog <span class="label bg-blue-400">1.6</span></span></a></li>
                            <li><a href="../../RTL/default/index.html"><i class="icon-width"></i> <span>RTL version</span></a></li>
                            <!-- /main -->

                            <!-- Layout -->
                            <li class="navigation-header"><span>Layout</span> <i class="icon-menu" title="Layout options"></i></li>

                            <li>
                                <a href="#"><i class="icon-tree5"></i> <span>Menu levels</span></a>
                                <ul>
                                    <li><a href="#"><i class="icon-IE"></i> Second level</a></li>
                                    <li>
                                        <a href="#"><i class="icon-firefox"></i> Second level with child</a>
                                        <ul>
                                            <li><a href="#"><i class="icon-android"></i> Third level</a></li>
                                            <li>
                                                <a href="#"><i class="icon-apple2"></i> Third level with child</a>
                                                <ul>
                                                    <li><a href="#"><i class="icon-html5"></i> Fourth level</a></li>
                                                    <li><a href="#"><i class="icon-css3"></i> Fourth level</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#"><i class="icon-windows"></i> Third level</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><i class="icon-chrome"></i> Second level</a></li>
                                </ul>
                            </li>
                            <!-- /layout -->

                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->