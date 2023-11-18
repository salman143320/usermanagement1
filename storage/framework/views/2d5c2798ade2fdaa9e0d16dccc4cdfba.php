

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
                <div class="card-header"><?php echo e(__('Add Employee')); ?></div>

                <div class="card-body">
                <?php echo Form::open(array('url' => 'employee')); ?>


                <?php echo e(Form::label('fname', 'First Name')); ?>

                <?php echo e(Form::text('fname', '',['class' => 'form-control','placeholder'=>'First Name'])); ?>

                <br>
                <?php echo e(Form::label('lname', 'Last Name')); ?>

                <?php echo e(Form::text('lname', '',['class' => 'form-control','placeholder'=>'Last Name'])); ?>

                <br>
                <?php echo e(Form::label('company', 'Company')); ?>

                <?php echo e(Form::select('company', $company,'',array('class' => 'form-control'))); ?>

                <br>
                <?php echo e(Form::label('email', 'Email')); ?>

                <?php echo e(Form::email('email', '',['class' => 'form-control','placeholder'=>'Email'])); ?>

                <br>
                <?php echo e(Form::label('phone', 'Phone')); ?>

                <?php echo e(Form::text('phone', '',['class' => 'form-control','placeholder'=>'Phone'])); ?>

                <br>
                <?php echo e(Form::submit('Save',['class' => 'btn btn-success'])); ?>

                <?php echo Form::close(); ?>




                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\todo\resources\views/employee/add-employee.blade.php ENDPATH**/ ?>