<?php $__env->startSection('title', 'Escort - Biography'); ?>

<?php $__env->startSection('content'); ?>
<form method="POST" action="<?php echo e(route('profile.biography.update')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <?php echo $__env->make('partials._profileSteps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="clearfix row">
        <div class="col-md-12 ">
            <div class="form-box">
                <div class="box-header">
                    <h3>About me <span>( 100 words )</span></h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <textarea class="form-control" name="about_me"><?php echo e($about_me); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix row">
        <div class="col-md-12 mt-4">
            <div class="form-box">
                <div class="box-header">
                    <h3>Favourite Things</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Would you like to include some information about your favourite things?</label>
                        <input type="text" name="tags" data-role="tagsinput" class="form-control" 
                            placeholder="Your favourite things as tags" 
                            value="<?php echo e(!empty($favourite->tags) ? $favourite->tags : ''); ?>">
                        <textarea class="form-control mt-1" placeholder="Description" name="description"
                        ><?php echo e(!empty($favourite->description) ? $favourite->description : ''); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix row">
        <div class="col-md-12 mt-4">
            <div class="form-box">
                <div class="box-header">
                    <h3>Wishlist</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Would you like to include some information about your favourite things?</label>
                    </div>
                    <!--<div class="table-remove-row table-responsive">
                        <table class="table w-100">
                            <thead>
                                <tr>
                                    <th>Attached Photo</th>
                                    <th>Add here Photo URL</th>
                                    <th>Remove</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" />
                                    </td>
                                    <td>
                                        <button class="btn remove-btn"><i class="icofont-close"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">
                                            <button class="add-field-btn"><i class="icofont-plus"></i> Add A wish</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>-->                                           
                    <div class="table-step2-wishlist">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Attached Photo</th>
                                    <th scope="col">Add here Photo URL</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="wishlist-wrapper">
                                <?php if($wishlist->count() > 0): ?>
                                    <?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $wishlist_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="wishlist-item" id="wishlist-item-<?php echo e($index); ?>">
                                        <td data-label="Attached Photo">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile<?php echo e($index); ?>" 
                                                    name="images[<?php echo e($index); ?>][image]">

                                                <input type="hidden" name="images[<?php echo e($index); ?>][id]" value="<?php echo e($wishlist_item->id); ?>">

                                                <label class="custom-file-label" for="customFile<?php echo e($index); ?>">
                                                    <?php echo e($wishlist_item->image); ?>

                                                </label>
                                            </div>
                                        </td>
                                        <td data-label="Add here Photo URL">
                                            <input type="text" class="form-control" name="images[<?php echo e($index); ?>][url]" 
                                                value="<?php echo e($wishlist_item->image_url); ?>" />
                                        </td>
                                        <td data-label="Remove">
                                            <button class="btn remove-btn" type="button" 
                                                onclick="removeWishlistItem('wishlist-item-<?php echo e($index); ?>')">
                                                    <i class="icofont-minus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <tr class="wishlist-item" id="wishlist-item-0">
                                    <td data-label="Attached Photo">
                                        <div class="custom-file">                
                                            <input type="file" class="custom-file-input" id="customFile0" 
                                                name="images[0][image]">
                                            <label class="custom-file-label" for="customFile1"></label>
                                        </div>
                                    </td>
                                    <td data-label="Add here Photo URL">
                                        <input type="text" class="form-control" name="images[0][url]" />
                                    </td>
                                    <td data-label="Remove">
                                        <button class="btn remove-btn" type="button" onclick="removeWishlistItem('wishlist-item-0')">
                                            <i class="icofont-minus"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col-md-12">
            <button class="submit-btn large" type="button" onclick="addWishlistItem()"><i class="icofont-plus"></i> Add a Wish</button>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <button class="submit-btn" type="submit">Submit</button>
        </div>
    </div>
</form>    

<script>
    /*
    * Add Item to wishlist
    */
    function addWishlistItem() {
        var index = $('.wishlist-item').length;
        var id = 'wishlist-item-' + parseInt(index + 1);
        var item = $(`
            <tr class="wishlist-item" id="${id}">
                <td data-label="Attached Photo">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile${index}" 
                            name="images[${index}][image]">
                        <label class="custom-file-label" for="customFile${index}"></label>
                    </div>
                </td>
                <td data-label="Add here Photo URL">
                    <input type="text" class="form-control" name="images[${index}][url]" />
                </td>
                <td data-label="Remove">
                    <button class="btn remove-btn" type="button" onclick="removeWishlistItem('${id}')">
                        <i class="icofont-minus"></i>
                    </button>
                </td>
            </tr>
        `)

        $('#wishlist-wrapper').append(item)
    }

    /*
    * Removes a Row from Wishlist
    */
    function removeWishlistItem(id) {
        var totalItems = $('.wishlist-item').length
        if (totalItems == 1) {
            $('#' + id).remove()
            $('#wishlist-wrapper').append(`
                <tr class="wishlist-item" id="wishlist-item-0">
                    <td data-label="Attached Photo">
                        <div class="custom-file">
                            <input type="hidden" name="images[0][id]" value="">

                            <input type="file" class="custom-file-input" id="customFile0" 
                                name="images[0][image]">
                            <label class="custom-file-label" for="customFile1"></label>
                        </div>
                    </td>
                    <td data-label="Add here Photo URL">
                        <input type="text" class="form-control" name="images[0][url]" />
                    </td>
                    <td data-label="Remove">
                        <button class="btn remove-btn" type="button" onclick="removeWishlistItem('wishlist-item-0')">
                            <i class="icofont-minus"></i>
                        </button>
                    </td>
                </tr>
            `)
            return 
        }
        $('#' + id).remove()
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.profileMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/new/profileBiography.blade.php ENDPATH**/ ?>