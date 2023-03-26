<div type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
     data-bs-target="#action-CartAddModal">
    <span onclick="closeFlash()" wire:click="addToCart({{ $productId }})">افزودن به سبد</span>

    <script>
        function closeFlash() {
            setTimeout(function () {
                $('#action-CartAddModal').modal('hide');
            }, 1000);
        }
    </script>
</div>
