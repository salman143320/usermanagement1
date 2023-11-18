

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                <?php echo Form::open(array('url' => 'updateuser/'.$users[0]->id,'method' => 'PUT')); ?>


                <?php echo e(Form::label('name', 'User Name')); ?>

                <?php echo e(Form::text('name', $users[0]->name,['class' => 'form-control','placeholder'=>'First Name'])); ?>

                <br>
                <?php echo e(Form::label('email', 'User Email')); ?>

                <?php echo e(Form::email('email', $users[0]->email,['class' => 'form-control','placeholder'=>'Email'])); ?>

                <br>
                <?php echo e(Form::submit('Update',['class' => 'btn btn-success'])); ?>

                <?php echo Form::close(); ?>




                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\todo\resources\views/home.blade.php ENDPATH**/ ?>