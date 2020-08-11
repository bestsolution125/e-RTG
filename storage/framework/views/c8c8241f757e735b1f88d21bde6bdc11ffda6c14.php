

<?php $__env->startSection('content'); ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Customer Management</h4>
            <p class="card-category"> Please add customer</p>
          </div>
          <div class="col-12 text-right">
            <a data-toggle = "modal" href = "" data-target = "#add_customer" class="btn btn-sm btn-primary">Add customer</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    No
                  </th>
                  <th>
                    Customer Company
                  </th>
                  <th>
                    Address line 1
                  </th>
                  <th>
                    Address line 2
                  </th>
                  <th>
                    State
                  </th>
                  <th>
                    Postcode
                  </th>
                  <th>
                    Country
                  </th>
                  <th>
                    Distributor ID
                  </th>
                  <th>
                    Country ID
                  </th>
                  <th>
                    Tag
                  </th>
                  <th>
                    Actions
                  </th>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($index++); ?></td>
                      <td><?php echo e($customer->customer_company); ?></td>
                      <td><?php echo e($customer->address_line1); ?></td>
                      <td><?php echo e($customer->address_line2); ?></td>
                      <td><?php echo e($customer->state); ?></td>
                      <td><?php echo e($customer->postcode); ?></td>
                      <td><?php echo e($customer->country->country_title); ?></td>
                      <td class="text-primary"><?php echo e($customer->distributor_id); ?></td>
                      <td class="text-primary"><?php echo e($customer->country_id); ?></td>
                      <td><?php echo e($customer->tag); ?></td>
                      <td>
                        <form method="post" action="<?php echo e(route('customers.destroy', $customer->id)); ?>">
                        <a class="btn btn-info btn-fab btn-fab-mini btn-round">
                          <i class="material-icons" onclick = "customer_edit(<?php echo e($customer); ?>);" style="color:white">edit</i>
                        </a> 
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <a class="btn btn-danger btn-fab btn-fab-mini btn-round"  onclick="confirm('<?php echo e(__('Are you sure you want to delete this customer?')); ?>') ? this.parentElement.submit() : ''" style="color:white">
                          <i class="material-icons">delete</i>
                        </a>
                        </form> 
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="add_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo e(route('customers.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
            <div class="w-50 mx-auto">
              <div class="input-group">
                <input name="customer_company" type="text" class="form-control" placeholder="Input customer company" require>
              </div>
              <br>
              <div class="input-group">
                <input name="address_line1" type="text" class="form-control" placeholder="Input Address line 1" require>
              </div>
              <br>
              <div class="input-group">
                <input name="address_line2" type="text" class="form-control" placeholder="Input Address line 2" require>
              </div>
              <br>
              <div class="input-group">
                <input name="state" type="text" class="form-control" placeholder="Input State" require>
              </div>
              <br>
              <div class="input-group">
                <input name="postcode" type="number" class="form-control" placeholder="Input Postcode" require>
              </div>
              <br>
              <div class="input-group">
                <select name="distributor_id" class="form-control">
                  <option >Choose the Distributor</option>
                  <?php $__currentLoopData = $distributors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $distributor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($distributor->id); ?>"><?php echo e($distributor->distributor_company); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <br>
              <div class="input-group">
                <select name="country_id" class="form-control">
                  <option >Choose the country</option>
                  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->country_title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <br>
              <div class="input-group">
                <input name="tag" type="text" class="form-control" placeholder="Input tag" require>
              </div>
            </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- update Modal -->
<div class="modal fade" id="edit_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo e(route('customers.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
            <div class="w-50 mx-auto">
              <input name="id" id="customer_id" type="hidden">
              <div class="input-group">
                <input name="customer_company" id="customer_company" type="text" class="form-control" placeholder="Input customer company" require>
              </div>
              <br>
              <div class="input-group">
                <input name="address_line1" id="address_line1" type="text" class="form-control" placeholder="Input Address line 1" require>
              </div>
              <br>
              <div class="input-group">
                <input name="address_line2" id="address_line2" type="text" class="form-control" placeholder="Input Address line 2" require>
              </div>
              <br>
              <div class="input-group">
                <input name="state" id="state" type="text" class="form-control" placeholder="Input State" require>
              </div>
              <br>
              <div class="input-group">
                <input name="postcode" id="postcode" type="number" class="form-control" placeholder="Input Postcode" require>
              </div>
              <br>
              <div class="input-group">
                <select name="distributor_id" id="distributor_id" class="form-control">
                  <option >Choose the Distributor</option>
                  <?php $__currentLoopData = $distributors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $distributor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($distributor->id); ?>"><?php echo e($distributor->distributor_company); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <br>
              <div class="input-group">
                <select name="country_id" id="country_id" class="form-control">
                  <option >Choose the country</option>
                  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->country_title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <br>
              <div class="input-group">
                <input name="tag" id="tag" type="text" class="form-control" placeholder="Input tag" require>
              </div>
            </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['activePage' => 'Customer-Management', 'titlePage' => __('Customer List')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\working_folder\malaysia_project\myproject\resources\views/customers/index.blade.php ENDPATH**/ ?>