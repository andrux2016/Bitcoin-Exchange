<div class="panel col-sm-9">
   <div class="panel-heading">
      <h3 class="panel-title"><?php _ex("Users Needing Verification"); ?></h3>
      <div class="panel-options">
         <a href="#" data-toggle="panel">
         <span class="collapse-icon">-</span>
         <span class="expand-icon">+</span>
         </a>
         <a href="#" data-toggle="remove">
         x
         </a>
      </div>
   </div>
   <div class="panel-body">
		<script type="text/javascript">
					jQuery(document).ready(function($)
					{
					   $("#users-2").dataTable(
					   {
					   aLengthMenu: [
					   [10, 25, 50, 100, -1],
					   [10, 25, 50, 100, "5"]
					   ]
					   });
						$("#users-1").dataTable({
							dom: "t" + "<'row'<'col-xs-6'i><'col-xs-6'p>>",
							aoColumns: [
								{bSortable: false},
								null,
								null,
								null,
								null
							],
						});

						var $state = $("#users-1 thead input[type='checkbox']");
						
						$("#users-1").on('draw.dt', function()
						{
							cbr_replace();
							
							$state.trigger('change');
						});
						
						$state.on('change', function(ev)
						{
							var $chcks = $("#users-1 tbody input[type='checkbox']");
							
							if($state.is(':checked'))
							{
								$chcks.prop('checked', true).trigger('change');
							}
							else
							{
								$chcks.prop('checked', false).trigger('change');
							}
						});
					});
					</script>
					<table class="table table-bordered table-striped" id="users-2">      
	  <thead>
               <tr role="row">
                  <th class="no-sorting sorting_asc" rowspan="1" colspan="1" aria-label="
                     " style="width: 16px;">
                     <div class="cbr-replaced">
                        <div class="cbr-input"><input type="checkbox" class="cbr cbr-done"></div>
                        <div class="cbr-state"><span></span></div>
                     </div>
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="users-1" rowspan="1" colspan="1" aria-label="<?php _ex("Username"); ?>: activate to sort column ascending" style="width: 176px;"><?php _ex("Username"); ?></th>
                  <th class="sorting" tabindex="0" aria-controls="users-1" rowspan="1" colspan="1" aria-label="<?php _ex("Email"); ?> activate to sort column ascending" style="width: 113px;"><?php _ex("Email"); ?></th>
                  <th class="sorting" tabindex="0" aria-controls="users-1" rowspan="1" colspan="1" aria-label="<?php _ex("First Name"); ?>: activate to sort column ascending" style="width: 191px;"><?php _ex("First Name"); ?></th>
				  <th class="sorting" tabindex="0" aria-controls="users-1" rowspan="1" colspan="1" aria-label="<?php _ex("Last Name"); ?>: activate to sort column ascending" style="width: 191px;"><?php _ex("Last Name"); ?></th>
			      <th class="sorting" tabindex="0" aria-controls="users-1" rowspan="1" colspan="1" aria-label="<?php _ex("Actions"); ?>: activate to sort column ascending" style="width: 191px;"><?php _ex("Actions"); ?></th>

				  </tr>
            </thead>
            <tbody class="middle-align">
			<?php foreach ($users as $user){ ?>
               <tr role="row" class="odd">
                  <td class="sorting_1">
                     <div class="cbr-replaced">
                        <div class="cbr-input"><input type="checkbox" class="cbr cbr-done"></div>
                        <div class="cbr-state"><span></span></div>
                     </div>
                  </td>
                  <td><?php echo $user->username; ?></td>
                  <td><?php echo $this->model->decrypt($user->email); ?></td>
				  <td><?php echo $this->model->decrypt($user->firstname); ?></td>
				  <td><?php echo $this->model->decrypt($user->lastname); ?></td>
                  <td>
                     <a href="<?php echo ADMINURL.'/edituser/?id='. $user->username; ?>" class="btn btn-secondary btn-sm btn-icon icon-left">
                     View User
                     </a>
                  </td>
               </tr>
			   <?php } ?>
               </tr>
            </tbody>
         </table>
      </div>  
	  </div>  