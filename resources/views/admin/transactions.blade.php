@include('inc_admin.header')

<style>
    .select2-container {
        width: 230px !important;
    }

    .rounded-pill-custom {
        border-radius: 50px !important;
        /* Adjust the value to control the roundness */
    }
</style>

<!-- CONTAINER -->
<div class="app-content">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h4 class="page-title">All Products</h4>

    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row row-cards">

        <div class="col-lg-12">
            <!-- <form method="GET" action="#" enctype="multipart/form-data" autocomplete="OFF">
    @csrf -->
            <div class="card">
                <div class="card-body p-2">
                    <div class="col-sm-12 p-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search ..." name="search_input"
                                id="searchInput">
                            <span class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </form> -->
            <div class="row discount-cards-container">
                <?php foreach ($data['get_all_discounts'] as $discount) { ?>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="card item-card">
                        <div class="product-grid6  card-body">
                            <div class="d-flex justify-content-end mb-2" id="coupon-status-{{ $discount->id }}">
                                @if ($discount->status == 1)
                                    <button class="btn rounded-pill-custom bg-danger" onclick="CouponStatus(event)"
                                        data-status="0" data-coupon-id="{{ $discount->id }}">Deactivate</button>
                                @elseif($discount->status == 0)
                                    <button class="btn rounded-pill-custom bg-success" onclick="CouponStatus(event)"
                                        data-status="1" data-coupon-id="{{ $discount->id }}">Activate</button>
                                @else
                                    <button class="btn btn-warning">Deleted By Vender</button>
                                @endif
                            </div>
                            <div class="product-image6 d-flex justify-content-center align-items-center"
                                style="height: 100px">
                                <a href="#">
                                    <img class="img-fluid" src="/storage/<?php echo $discount->coupon_image; ?>" alt="img"
                                        style="height:100px; width:auto">
                                </a>
                            </div>
                            <div class="product-content text-center">
                                <h4 class="title text-primary"><a href="#"><?php echo $discount->title_of_offer; ?></a></h4>
                                <h4 class="title text-primary">Discount Value: <a href="#"><?php echo $discount->instant_discount; ?></a>
                                </h4>
                                <h4 class="title text-primary">Discount Per: <a href="#"><?php echo $discount->percentage_discount; ?>%</a>
                                </h4>
                                <div class="price">Reward: <i class='fa fa-inr'></i><?php echo $discount->cashback_value; ?></div>



                            </div>
                            <ul class="icons">
                                <li><a href="/admin/transaction/<?php echo $discount->id; ?>"><i class="fa fa-search "></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <?php } ?>
            </div>

        </div><!-- COL-END -->


    </div>
    <!-- ROW-1 CLOSED -->
</div>
<!-- CONTAINER CLOSED -->
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchInput");
        const discountCardsContainer = document.querySelector(".discount-cards-container");

        searchInput.addEventListener("input", function() {
            const searchValue = this.value.trim().toLowerCase();

            // Loop through each discount card and check if it contains the search value
            const discountCards = discountCardsContainer.querySelectorAll(".item-card");
            discountCards.forEach(function(discountCard) {
                const discountName = discountCard.querySelector(".title.text-primary")
                    .textContent.toLowerCase();
                if (discountName.includes(searchValue)) {
                    discountCard.style.display = "block";
                } else {
                    discountCard.style.display = "none";
                }
            });
        });
    });

    function CouponStatus(event) {
        var status = event.target.dataset.status;
        var coupon_id = event.target.dataset.couponId;
        var parentId = event.target.parentElement.id
        $.ajax({
            url: "{{ route('couponstatuschange', ['coupon' => ':coupon_id', 'status' => ':status']) }}".replace(
                ':status', status).replace(':coupon_id', coupon_id),
            type: 'GET',
            success: function(response) {
                if (response && response[0]) {
                    if (response[0]['status'] == 1) {
                        $("#" + parentId + " button").html("Deactivate").removeClass("bg-success").addClass(
                            "bg-danger").attr('data-status', '0');
                    } else {
                        $("#" + parentId + " button").html("Activate").removeClass("bg-danger").addClass(
                            "bg-success").attr('data-status', '1');
                    }
                }
            },
            error: function(xhr, status, error) {
                // This function will be called if the request fails
                console.error('Ajax request failed');
                console.error(status + ': ' + error); // Log the error details to the console
                // You can handle errors gracefully here
            }
        });
    }
</script>

@include('inc_admin.footer')
