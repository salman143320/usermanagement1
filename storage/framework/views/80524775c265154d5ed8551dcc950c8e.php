

<?php $__env->startSection('content'); ?>
<input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
<div class="container">
    <div class="row justify-content-center">
    	<h2 style="display: block;margin: auto;text-align: center;">Admin Panel</h2>
    	<?php if(session('status')): ?>
        	<div class="alert alert-success" role="alert">
            	<?php echo e(session('status')); ?>

            </div>
       	<?php endif; ?>
    	<div class="col-md-4">
    		<div class="card">
            	<div class="card-header"><?php echo e(__('Add Users')); ?></div>
				<div class="card-body">
				<?php echo Form::open(array('url'=>'/userregister','method' => 'POST','class'=>'formadminregister')); ?>

                <?php echo e(Form::label('name', 'User Name')); ?>

                <?php echo e(Form::text('name', '',['class' => 'form-control useradminname','placeholder'=>'First Name'])); ?>

                <br>
                <?php echo e(Form::label('email', 'User Email')); ?>

                <?php echo e(Form::email('email', '',['class' => 'form-control useradminemail','placeholder'=>'Email'])); ?>

                <br>
                 <?php echo e(Form::label('role', 'User Role')); ?>

                <?php echo e(Form::text('role', '',['class' => 'form-control useradminrole','placeholder'=>'User Role'])); ?>

                <br>
                <?php echo e(Form::submit('Save',['class' => 'btn btn-success updatebyadmin'])); ?>

                <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
		
		<div class="col-md-8">
       		<?php if(session()->has('message')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('message')); ?>

            </div>      
            <?php endif; ?>
            <div class="card">
                <div class="card-header"><?php echo e(__('Show Users')); ?></div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Sr No</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>User Role</th>
                            <th>Action</th>
                        </tr>
                        <?php $__currentLoopData = $usersArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=> $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($v->id); ?></td>
                            <td><?php echo e($v->name); ?></td>
                            <td><?php echo e($v->email); ?></td>
                            <td><?php echo e($v->adminviewpassword); ?></td>
                            <td><?php echo e($v->user_role); ?></td>
                            <td><i class="fas fa-edit editdata" ids="<?php echo e($v->id); ?>" username="<?php echo e($v->name); ?>" email="<?php echo e($v->email); ?>" user_role="<?php echo e($v->user_role); ?>"></i> <i class="fas fa-trash removedata" ids="<?php echo e($v->id); ?>"></i>






                             </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <?php echo $usersArr->withQueryString()->links('pagination::bootstrap-5'); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','.editdata', function(){
			var ids = $(this).attr('ids');
			var base_url = window.location.origin;
			$('.useradminname').val($(this).attr('username'));
			$('.useradminname').attr('ids',ids);
			$('.useradminemail').val($(this).attr('email'));
			$('.useradminrole').val($(this).attr('user_role'));
			$('.formadminregister').attr('method','PUT');
			$('.formadminregister').attr('action',base_url+'/todo/updateuser/'+ids);
			$('.updatebyadmin').val('update');
			$('.updatebyadmin').addClass('updateuserdata').removeClass('updatebyadmin');
		});

		$(document).on('click','.updateuserdata', function(e){
			var ids = $('.useradminname').attr('ids');
			var token = $('#token').val();
			e.preventDefault();
        	$.ajax({
            url: "/todo/updateuserbyadmin",
            type: "POST",
            data: {'_token':token,'ids':ids,'name':$('.useradminname').val(),'email':$('.useradminemail').val(),'role':$('.useradminrole').val()},
            dataType:'json',
           	success: function(data){
            	location.reload();
            }          
        });
        	 });

        $(document).on('click','.removedata', function(e){
			var ids = $(this).attr('ids');
			var $this = $(this);
			var token = $('#token').val();
			e.preventDefault();
        	$.ajax({
            url: "/todo/deleteuserbyadmin",
            type: "POST",
            data: {'_token':token,'ids':ids},
            dataType:'json',
           	success: function(data){
           		if(data == 1){
           			alert("User Deleted Successfully");
           			$this.closest('tr').remove();
           		}
            }          
        });
        });	
	});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\todo\resources\views/adminhome.blade.php ENDPATH**/ ?>