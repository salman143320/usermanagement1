

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <?php if(session()->has('message')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('message')); ?>

            </div>      
            <?php endif; ?>
            <div class="card">
                <div class="card-header"><?php echo e(__('Show Company')); ?></div>

                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Sr No</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Website</th>
                            <th>Action</th>
                        </tr>
                        <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=> $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($v->id); ?></td>
                            <td><?php echo e($v->name); ?></td>
                            <td><?php echo e($v->email); ?></td>
                            <td><img src="<?php echo e(url('storage/app/public/'.$v->logo)); ?>" alt="" width="100" height="100"> </td>
                            <td><?php echo e($v->website); ?></td>
                            <td><a href="company/<?php echo e($v->id); ?>/edit"><i class="fas fa-edit"></i></a>

                                <form action="company/<?php echo e($v->id); ?>" method="POST">
    <?php echo e(method_field('DELETE')); ?>

    <?php echo e(csrf_field()); ?>

    <button style="border: none;background: transparent;"><i class="fas fa-trash"></i></button>
</form>





                             </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <?php echo $company->withQueryString()->links('pagination::bootstrap-5'); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\todo\resources\views/company/company.blade.php ENDPATH**/ ?>