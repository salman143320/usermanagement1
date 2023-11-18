

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
                    <?php if(count($errors) > 0): ?>
   <div class = "alert alert-danger">
      <ul>
         <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
   </div>
<?php endif; ?>
            <div class="card">
                <div class="card-header"><?php echo e(__('Add Company')); ?></div>

                <div class="card-body">
                <?php echo Form::open(array('url' => 'company','method' => 'POST','files'=>'true')); ?>


                <?php echo e(Form::label('name', 'Company Name')); ?>

                <?php echo e(Form::text('name', '',['class' => 'form-control','placeholder'=>'First Name'])); ?>

                <br>
                <?php echo e(Form::label('email', 'Email')); ?>

                <?php echo e(Form::email('email', '',['class' => 'form-control','placeholder'=>'Email'])); ?>

                <br>
                <?php echo e(Form::label('file', 'Logo')); ?>

                <?php echo e(Form::file('logo',['class' => 'form-control','placeholder'=>'Email'])); ?>

                <br>
                <?php echo e(Form::label('website', 'Website')); ?>

                <?php echo e(Form::text('website', '',['class' => 'form-control','placeholder'=>'Website'])); ?>

                <br>
                <?php echo e(Form::submit('Save',['class' => 'btn btn-success'])); ?>

                <?php echo Form::close(); ?>




                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\todo\resources\views/company/add-company.blade.php ENDPATH**/ ?>