<?php
    $page_title = "ShopSphere - Refund Request";
    include 'includes/header.php';
    include 'includes/dbconnect.php';

    $customer_id = $_SESSION['userid'] ?? $_GET['customer'] ?? '';
    $product_id = $_GET['product_id'] ?? '';
    $order_id = $_GET['order_id'] ?? '';
    $product_name = $_GET['product_name'] ?? 'Product';
?>

<div class="max-w-xl mx-auto my-8">
    <div class="card bg-base-200 border border-white/5 shadow-2xl rounded-3xl overflow-hidden">
        <div class="p-6 md:p-8 space-y-6">
            <div>
                <h1 class="text-2xl font-extrabold tracking-tight text-primary">Request a Refund</h1>
                <p class="text-sm text-base-content/50 mt-1">Please provide the details below to request a refund for <strong><?= htmlspecialchars($product_name) ?></strong> (Order #<?= htmlspecialchars($order_id) ?>).</p>
            </div>
            
            <div class="divider my-0"></div>

            <div id="refund-alert" class="alert hidden shadow-lg mb-4">
                <div>
                    <span id="refund-alert-text"></span>
                </div>
            </div>

            <!-- Drag & Drop / Upload Box -->
            <div class="form-control w-full">
                <label class="label font-bold text-xs uppercase tracking-wider text-base-content/75">
                    <span>Product Image</span>
                </label>
                <div id="drop-zone" class="border-2 border-dashed border-white/10 hover:border-primary/50 transition-all rounded-2xl p-8 flex flex-col items-center justify-center cursor-pointer bg-base-300/30 group">
                    <input type="file" id="upload_file" class="hidden" accept="image/*">
                    <div id="upload-icon" class="text-4xl text-base-content/30 group-hover:text-primary transition-colors mb-3">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                    </div>
                    <p class="text-sm font-medium text-base-content/75 text-center" id="upload-prompt">Drag & drop your product image here, or <span class="text-primary hover:underline">browse</span></p>
                    <p class="text-xs text-base-content/40 mt-1">Supports JPG, PNG, WEBP (Max 2MB)</p>
                </div>
                
                <!-- Image Preview Area -->
                <div id="preview-container" class="hidden mt-4 relative w-full h-48 rounded-2xl overflow-hidden border border-white/5 bg-base-300">
                    <img id="image-preview" src="" alt="Preview" class="object-contain w-full h-full">
                    <button type="button" id="remove-btn" class="btn btn-circle btn-error btn-xs absolute top-2 right-2 shadow-lg">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>

            <!-- Refund Reason Textarea -->
            <div class="form-control w-full">
                <label class="label font-bold text-xs uppercase tracking-wider text-base-content/75">
                    <span>Reason for refund</span>
                </label>
                <textarea id="refund_reason" class="textarea textarea-bordered h-32 rounded-2xl bg-base-300/30 focus:border-primary focus:outline-none placeholder-base-content/30" placeholder="Please describe why you are requesting a refund in detail..."></textarea>
            </div>

            <!-- Submit Button -->
            <div class="card-actions justify-end mt-4">
                <a href="orderlist.php?customer=<?= urlencode($customer_id) ?>" class="btn btn-ghost rounded-2xl px-6">Cancel</a>
                <button type="button" id="submit-refund-btn" class="btn btn-primary border-none hover:opacity-90 text-white font-bold rounded-2xl px-8 shadow-lg">
                    Submit Request
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    const dropZone = $('#drop-zone');
    const fileInput = $('#upload_file');
    const previewContainer = $('#preview-container');
    const imagePreview = $('#image-preview');
    const removeBtn = $('#remove-btn');
    const uploadPrompt = $('#upload-prompt');
    const uploadIcon = $('#upload-icon');
    
    // Drag & Drop event handlers
    dropZone.on('click', function() {
        fileInput.click();
    });

    dropZone.on('dragover', function(e) {
        e.preventDefault();
        dropZone.addClass('border-primary bg-base-300/60');
    });

    dropZone.on('dragleave', function() {
        dropZone.removeClass('border-primary bg-base-300/60');
    });

    dropZone.on('drop', function(e) {
        e.preventDefault();
        dropZone.removeClass('border-primary bg-base-300/60');
        const files = e.originalEvent.dataTransfer.files;
        if (files.length) {
            handleFileSelect(files[0]);
        }
    });

    fileInput.on('change', function() {
        if (this.files.length) {
            handleFileSelect(this.files[0]);
        }
    });

    function handleFileSelect(file) {
        // Validate local file type
        const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
        if (!allowedTypes.includes(file.type)) {
            showAlert('error', 'Only JPG, PNG, and WEBP formats are supported.');
            return;
        }

        // Validate local file size (2MB)
        if (file.size > 2 * 1024 * 1024) {
            showAlert('error', 'Image size must be smaller than 2MB.');
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.attr('src', e.target.result);
            dropZone.addClass('hidden');
            previewContainer.removeClass('hidden');
        };
        reader.readAsDataURL(file);
    }

    removeBtn.on('click', function(e) {
        e.stopPropagation();
        fileInput.val('');
        imagePreview.attr('src', '');
        previewContainer.addClass('hidden');
        dropZone.removeClass('hidden');
    });

    function showAlert(type, message) {
        const alertBox = $('#refund-alert');
        alertBox.removeClass('hidden alert-error alert-success alert-info');
        
        if (type === 'error') {
            alertBox.addClass('alert-error');
        } else if (type === 'success') {
            alertBox.addClass('alert-success');
        } else {
            alertBox.addClass('alert-info');
        }
        
        $('#refund-alert-text').html(message);
        alertBox.get(0).scrollIntoView({ behavior: 'smooth' });
    }

    $('#submit-refund-btn').on('click', function() {
        const productId = <?= json_encode($product_id); ?>;
        const orderId = <?= json_encode($order_id); ?>;
        const customerId = <?= json_encode($customer_id); ?>;
        const reason = $('#refund_reason').val().trim();
        const file = fileInput[0].files[0];

        if (!file) {
            showAlert('error', 'Please select or drag an image of the product.');
            return;
        }

        if (!reason) {
            showAlert('error', 'Please provide a reason for requesting a refund.');
            return;
        }

        const formData = new FormData();
        formData.append('product_id', productId);
        formData.append('customer_id', customerId);
        formData.append('reason', reason);
        formData.append('order_id', orderId);
        formData.append('img', file);

        const btn = $(this);
        btn.addClass('loading').prop('disabled', true);

        $.ajax({
            url: 'actions/process_refund.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                btn.removeClass('loading').prop('disabled', false);
                if (response.indexOf('successfully') !== -1) {
                    showAlert('success', 'Refund request submitted successfully! Redirecting...');
                    setTimeout(function() {
                        window.location.href = 'refund_list.php?customer=' + encodeURIComponent(customerId);
                    }, 2000);
                } else {
                    showAlert('error', response);
                }
            },
            error: function(xhr, status, error) {
                btn.removeClass('loading').prop('disabled', false);
                showAlert('error', 'Failed to submit request: ' + xhr.statusText);
            }
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>