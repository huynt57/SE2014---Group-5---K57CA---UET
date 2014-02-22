<?php 
	$tableDefault = array(
		"dragToReOrder" => false
	);
	$table = array_merge($tableDefault,$table);
	if($table["actions"]["_view"]=="*")
	{
		$table["actions"]["_view"] = array();
		foreach($table["fields"] as $column => $field)
		{
			$table["actions"]["_view"][] = $column;
		}
	}
	$tableFieldDefault = array(
		"type" => "_text",
		"orderable" => true
	);
	foreach($table["fields"] as $name => $field)
	{
		$table["fields"][$name] = array_merge($tableFieldDefault,$field);
		if(!isset($field["label"]))
			$table["fields"][$name]["label"] = ucwords($name);
	}
?>
<style>
	.select2-search
	{
		display:none;
	}
	#theTable{
		position:relative;
	}
	#theTable .loading-container
	{
		position:absolute;
		width:100%;
		height:100%;
		background:#fff;
		opacity:0.5;
	}
	#theTable .loading-container .loading
	{
		position:absolute;
		left:50%;
		top:50%;
		width:30px;
		height:30px;
		margin-left:-15px;
		margin-right:-15px;
		background-size:100% 100%;
		background-image:url(<?php echo Yii::app()->theme->baseUrl."/assets/img/loading3.gif" ?>);
	}
	#theTable table thead tr.thetitle th.orderable
	{
		cursor:pointer;
	}
	#theTable table
	{
		table-layout:fixed;
		width:100%;
	}
	#theTable table td, #theTable table th
	{
		color:#000;
	}
	.text_filter
	{
		max-width:90%;
	}
	.table-draggable > tr
	{
		cursor:move;
	}
	.pagination
	{
		margin-top:0px;
	}
	body.modal-open, .modal-open .navbar-fixed-top, .modal-open .navbar-fixed-bottom
	{
		margin-right:0px;
	}
</style>
<div id="theTable" ng-app="AjaxTable" ng-controller="AjaxTableController">
	<div class="loading-container" ng-if="loading">
		<div class="loading">
		</div>
	</div>
	<?php foreach($partialTop as $view): ?>
		<div>
			<?php $this->renderPartial($view) ?>
		</div>
	<?php endforeach; ?>
	<div class="panel panel-default" style="margin-top:5px">
		<div class="panel-heading">
			<h4>
				<i class="icon-table"></i>
				<?php echo $table["title"] ?>
			</h4>
		</div>
		<div class="panel-body">
			<div class="row" style="margin-left:0px; margin-right:0px;">
				<div class="col-lg-6" style="padding-left:0px;">
					<label>
						<select class="select2-me" ng-model="per_page" ng-change="refresh()" style="margin-right:5px;">
							<?php foreach($table["limit_values"] as $value): ?>
								<option value="<?php echo $value ?>"><?php echo $value ?></option>
							<?php endforeach; ?>
						</select>
						entries per page
					</label>
				</div>
				<div class="col-lg-6 text-right" style="padding-right:0px;">
					<label>
						<span>Search: </span>
						<input type="text" id="search" class="form-control input-sm" placeholder="Search here..." ng-model="search" ng-enter="refresh()" style="display:inline-block; width:auto; margin-left:5px;" />
					</label>
				</div>
			</div>
			<table class="table table-hover table-nomargin table-bordered" style="margin-top:15px;">
				<thead>
					<tr class="thetitle" role="row">
						<?php foreach($table["columns"] as $column): $field = $table["fields"][$column]; ?>
							<th data-field="<?php echo $column ?>" <?php if($field["orderable"]): ?> ng-click="changeOrder('<?php echo $column ?>')" ng-attr-class="orderable {{orderBy!='<?php echo $column ?>' && 'sorting' || orderType=='desc' && 'sorting_desc' || 'sorting_asc' }}"<?php endif; ?>>
								<?php echo $table["fields"][$column]["label"] ?>
								<?php if($field["orderable"]): ?>
									<i ng-attr-class="pull-right orderable {{orderBy!='<?php echo $column ?>' && 'icon-sort' || orderType=='desc' && 'icon-sort-up' || 'icon-sort-down' }}"></i>
								<?php endif; ?>
							</th>
						<?php endforeach; ?>
						<th>
							Actions
						</th>
					</tr>
					<tr class="thefilter" role="row">
						<?php foreach($table["columns"] as $column): $field = $table["fields"][$column]; ?>
							<th data-field="<?php echo $column ?>">
								<span class="filter_column filter_text">
									<?php if(in_array($column, $table["actions"]["search_advanced"])): ?>
										<?php switch ($field["type"]) {
											case '_checkbox':
												# code...
												?>
													<select class="query-input text_filter input-sm form-control" name="search_advanced[<?php echo $column ?>]" ng-model="search_advanced_<?php echo $column ?>" ng-change="refresh()">
														<option value="">All</option>
														<option value="1">Yes</option>
														<option value="0">No</option>
													</select>
												<?php
												break;
											case '_dropdown':
												?>
													<select class="query-input text_filter form-control input-sm" name="search_advanced[<?php echo $column ?>]" ng-model="search_advanced_<?php echo $column ?>" ng-change="refresh()">
														<option value="">All</option>
														<?php foreach($field["list"] as $value => $label): ?>
															<option value="<?php echo $value ?>"><?php echo $label ?></option>
														<?php endforeach; ?>
													</select>
												<?php
												break;
											default:
												?>
													<input type="text" class="text_filter query-input input-sm form-control" placeholder="<?php echo $table["fields"][$column]["label"]; ?>" name="search_advanced[<?php echo $column ?>]" ng-enter="refresh()" />
												<?php
												break;
										} ?>
									<?php endif; ?>
								</span>
							</th>
						<?php endforeach; ?>
						<th>
						</th>
					</tr>
				</thead>
				<tbody id="tableDraggable" <?php if($table["dragToReOrder"]): ?>ui-sortable="sortableOptions" ng:model="rows" class="table-draggable"<?php endif; ?>>
					<tr ng-if="!rows.length && refreshCount > 0">
						<td colspan="<?php echo count($table["columns"])+1 ?>">
							No <?php echo $table["itemLabel"] ?> found
						</td>
					</tr>
					<tr ng-if="rows.length" ng-repeat="row in rows" data-id="{{row.id}}">
						<?php foreach($table["columns"] as $column): $field = $table["fields"][$column]; ?>
							<td data-field="<?php echo $column ?>">
								<?php switch ($field["type"]) {
									case '_dropdown':
										?>
											<span class="label label-info">{{TableConfig.fields.<?php echo $column ?>.list[row.<?php echo $column ?>]}}</span>
										<?php
										break;
									case '_checkbox':
										?>
											<button type="button" class="btn btn-sm {{parseInt(row.<?php echo $column ?>) ? 'btn-info' : 'btn-danger'}}"><i class="{{parseInt(row.<?php echo $column ?>) ? 'icon-ok' : 'icon-remove'}}"></i></button>
										<?php
										break;
									default:
										?>
											{{row.<?php echo $column ?>}}
										<?php
										break;
								}?>
							</td>
						<?php endforeach; ?>
						<td>
							<?php if($table["actions"]["_view"]): ?>
								<a href="#modal-view-{{row.<?php echo $table["primary"] ?>}}" class="btn" data-toggle="modal" rel="tooltip" title="View ">
									<i class="icon-eye-open"></i>
								</a>
								<!-- Modal View -->
								<div id="modal-view-{{row.<?php echo $table["primary"] ?>}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												<h3 id="myModalLabel"><?php echo $table["itemLabel"] ?>'s information</h3>
											</div>
											<div class="modal-body">
												<div class="panel panel-default">
													<div class="panel-heading">
														<h5>
															Detail					
														</h5>
													</div>
													<div class="panel-body">
														<div class="form-horizontal form-bordered form-validate">
															<?php foreach($table["actions"]["_view"] as $column): $field = $table["fields"][$column]; ?>
																<div class="form-group">
																	<label for="<?php echo $column ?>" class="control-label col-lg-3"><?php echo $field["label"] ?></label>
																	<div class="col-lg-9">
																		<div class="checkbox">
																		<?php switch ($field["type"]) {
																			case '_checkbox':
																				# code...
																				?>
																					<button type="button" class="btn btn-info {{parseInt(row.<?php echo $column ?>) ? 'btn-primary' : 'btn-danger'}}"><i class="{{parseInt(row.<?php echo $column ?>) ? 'icon-ok' : 'icon-remove'}}"></i></button>
																				<?php
																				break;
																			case '_image':
																				?>
																					<img src="{{row.<?php echo $column ?>}}" />
																				<?php
																				break;
																			case '_url':
																				?>
																					<a href="{{row.<?php echo $column ?>}}" target="_blank">Go to link</a>
																				<?php
																				break;
																			case "_dropdown":
																				?>
																					<span class="label label-info">{{TableConfig.fields.<?php echo $column ?>.list[row.<?php echo $column ?>]}}</span>
																				<?php
																				break;
																			default:
																				?>
																					<span>{{row.<?php echo $column ?>}}</span>
																				<?php
																				break;
																		} ?>
																		</div>
																	</div>
																</div>
															<?php endforeach; ?>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- /Modal View -->
							<?php endif; ?>
							<?php if($table["actions"]["_edit"]): ?>
								<a href="#modal-edit-{{row.<?php echo $table["primary"] ?>}}" class="btn" data-toggle="modal" rel="tooltip" title="Edit ">
									<i class="icon-edit"></i>
								</a>
								<!-- Modal Edit -->
								<div ng-attr-id="modal-edit-{{row.<?php echo $table["primary"] ?>}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												<h3 id="myModalLabel">Change <?php echo $table["itemLabel"] ?>'s information</h3>
											</div>
											<div class="modal-body">
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4>
															<i class="icon-edit"></i><span>Edit</span>
														</h4>
													</div>
													<div class="panel-body">
														<!-- Message box (make sure the id match the form) -->
														<div id="administrator_edit_form_message_error" class="alert alert-error" style="display: none;">
															<button type="button" class="close" data-dismiss="alert">×</button>
															<span id="administrator_edit_form_message_error_placeholder"></span>
														</div>
														<div class="alert alert-success" id="administrator_edit_form_message_success" style="display: none;">
															<button type="button" class="close" data-dismiss="alert">×</button>
															Successfully edit user information
														</div>
														<!-- Form -->
														<form ng-attr-id="form-edit-{{row.<?php echo $table["primary"] ?>}}" action="javascript:void(0);" method="POST" class="form-horizontal form-bordered form-validate form-edit">
															<input type="hidden" name="<?php echo $table["primary"] ?>" ng-attr-value="{{row.<?php echo $table["primary"] ?>}}" />
															<?php foreach($table["actions"]["_edit"] as $column): $field = $table["fields"][$column]; ?>
																<div class="form-group">
																	<label for="<?php echo $column ?>" class="control-label col-lg-3"><?php echo $field["label"] ?></label>
																	<div class="col-lg-9">
																		<?php switch ($field["type"]) {
																			case '_checkbox':
																				# code...
																				?>
																					<input type="checkbox" class="form-control input-sm" name="<?php echo $column ?>" value="1" ng-checked="parseInt(row.<?php echo $column ?>)" />
																				<?php
																				break;
																			case '_dropdown':
																				?>
																					<select name="<?php echo $column ?>" class="form-control input-sm">
																						<?php foreach($field["list"] as $value => $label): ?>
																							<option value="<?php echo $value ?>" ng-selected="row.<?php echo $column ?>=='<?php echo $value ?>'"><?php echo $label ?></option>
																						<?php endforeach; ?>
																					</select>
																				<?php
																				break;
																			default:
																				?>
																					<input type="text" class="form-control input-sm" name="<?php echo $column ?>" value="{{row.<?php echo $column ?>}}" class="input-sm form-control" />
																				<?php
																				break;
																		} ?>
																	</div>
																</div>
															<?php endforeach; ?>
														</form>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Close</button>
												<button type="button" ng-click="edit(row.<?php echo $table["primary"] ?>)" class="btn btn-info btn-sm">Save changes</button>
											</div>
										</div>
									</div>
								</div>
								<!-- /Modal Edit -->
							<?php endif; ?>
							<?php if($table["actions"]["_delete"]): ?>
								<a href="javascript:void(0);" class="btn" data-toggle="modal" rel="tooltip" ng-click="delete(row.<?php echo $table["primary"] ?>)" title="Delete ">
									<i class="icon-remove"></i>
								</a>
							<?php endif; ?>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="row">
				<div class="dataTables_info col-lg-6" ng-if="page!=0 && rows.length">
					Showing <span>{{(page-1)*per_page+1}}</span> to <span>{{page*per_page < count ? page*per_page : count}}</span> of <span>{{count}}</span> entries
				</div>
				<div class="dataTables_info col-lg-6" ng-if="page==0">
					Showing all entries
				</div>
				<div class="dataTables_paginate col-lg-6 text-right" ng-if="page==0 && TableConfig.dragToReOrder && count==countAll">
					<button type="button" class="btn btn-sm btn-flat btn-rounded flat-info" ng-click="updateOrder()" ng-disabled="!orderUpdateable">Apply Orders</button>
				</div>
				<div class="dataTables_paginate paging_full_numbers col-lg-6 text-right" id="DataTables_Table_1_paginate" ng-if="page!=0 && rows.length">
					<ul class="pagination pagination-sm">
						<li>
							<a href="javascript:void(0);" ng-attr-class="first paginate_button {{page==1 && 'paginate_button_disabled'}}" ng-disabled="page==1" ng-click="page==1 || changePage(1)">First</a>
						</li>
						<li>
							<a href="javascript:void(0);" ng-attr-class="previous paginate_button {{page-1<1 && 'paginate_button_disabled'}}" ng-disabled="page-1<1" ng-click="page-1<1 || changePage(page-1)">Previous</a>
						</li>
						<!-- pages -->
						<li ng-repeat="pageItem in pages" ng-attr-class="{{pageItem.active ? 'active' : ''}}" >
							<a href="javascript:void(0);" ng-click="changePage(pageItem.num)">{{pageItem.num}}</a>
						</li>
						<!-- /pages -->
						<li>
							<a href="javascript:void(0);" ng-attr-class="next paginate_button {{page+1>pageLast && 'paginate_button_disabled' }}" ng-disabled="page+1>pageLast" ng-click="page+1>pageLast || changePage(1)">Next</a>
						</li>
						<li>
							<a href="javascript:void(0);" ng-attr-class="last paginate_button {{page==pageLast && 'paginate_button_disabled' }}" ng-disabled="page==pageLast" ng-click="page==pageLast || changePage(1)">Last</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php foreach($partialBottom as $view): ?>
		<div>
			<?php $this->renderPartial($view) ?>
		</div>
	<?php endforeach; ?>
	<?php if($newAction = $table["actions"]["_new"]): ?>
		<div>
			<div class="text-right">
				<?php if($newAction["type"]=="link"): ?>
					<a href="<?php echo $newAction["href"] ?>" class="btn btn-flat btn-rounded flat-danger btn-sm" style="margin-top:20px;"><i class="icon icon-plus"></i> New <?php echo $table["itemLabel"] ?></a>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
</div>
<script>
	var TableConfig = <?php echo json_encode($table); ?>;
	var $table = null;
	$(function(){
		window.$table = $("#theTable");
		$("#theTable table").addClass("dataTable");
	});
</script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/angular.min.js"></script>
<?php if($table["dragToReOrder"]): ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui/0.4.0/angular-ui.min.js"></script>
<?php endif; ?>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/AdminTable.js"></script>