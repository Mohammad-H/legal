<?php //print_r_debug_die($data['all']) ?>
<script>

    /*$.ajax({
        url:"http://localhost/legal/admindashboard/getAjax",
        type:"GET",
        success: function (data) {
            alert(data);
        }
    });*/

</script>
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">Datatables</span> - Data Sources</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="datatable_data_sources.html">Datatables</a></li>
							<li class="active">Data sources</li>
						</ul>

						<ul class="breadcrumb-elements">
							<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear position-left"></i>
									Settings
									<span class="caret"></span>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
									<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
									<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- HTML sourced data -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Ajax sourced data</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
                            DataTables has the ability to read data from virtually any JSON data source that can be obtained by Ajax. This can be done, in its most simple form, by setting the ajax option to the address of the JSON data source. The example below shows DataTables loading data for a table from arrays as the data source (object parameters can also be used through the columns.data option).
						</div>
						<table class="table datatable-ajax datatable-column-search-inputs  datatable-selection-multiple">

							<thead>
								<tr>
					                <th>user_id</th>
					                <th>username</th>
					                <th>first_name</th>
					                <th>last_name</th>
					                <th>gender</th>
					                <th>status</th>
					            </tr>
							</thead>
                            <tfoot>
                            <tr>
                                <td>user_id</td>
                                <td>username</td>
                                <td>first_name</td>
                                <td>last_name</td>
                                <td>gender</td>
                                <td>status</td>
                            </tr>
                            </tfoot>
						</table>
					</div>
					<!-- /HTML sourced data -->