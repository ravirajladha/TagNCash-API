<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\BusinessProfile;
?>
@include('inc_admin.header')

<!-- <?php //$profile = $data['profile'];
?> -->
<!-- CONTAINER -->
<div class="app-content">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h4 class="page-title">Profile</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->

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

    <div class="row">
        <div class="col-md-12 col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">All Vendors</div>
                </div>
                <div class="">
                    <div class="table-responsive">
                        <table
                            class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align:center;">Id</th>
                                    <th scope="col" style="text-align:center;">Name</th>
                                    <th scope="col" style="text-align:center;">Business Name</th>
                                    <th scope="col" style="text-align:center;">Email</th>
                                    <th scope="col" style="text-align:center;">Phone</th>
                                    <th scope="col" style="text-align:center;">Country</th>
                                    <th scope="col" style="text-align:center;">Image</th>
                                    <th scope="col" style="text-align:center;">View Profile</th>
                                    <th scope="col" style="text-align:center;">Created At</th>
                                    <th scope="col" style="text-align:center;">Action</th>
                                    <th scope="col" style="text-align:center;">Disable</th>
                                </tr>
                            </thead>
                            <tbody> <?php foreach ($data['vendors'] as $vendor) {

									?>
                                <?php if ($vendor->hide == 0) { ?>
                                <tr>
                                    <td style="text-align:center;">
                                        <h6>
                                            <a href=""><?php echo $vendor->id; ?></a>
                                        </h6>
                                    </td>

                                    <td style="text-align:center;">
                                        <h6><?php echo $vendor->name; ?></h6>
                                    </td>

                                    <?php
                                        $get_profile_detail = BusinessProfile::where('user_id', $vendor->id)->first();
                                    ?>


                                    <td style="text-align:center;">
                                        <?php
                                        if (isset($get_profile_detail->business_name)) {
                                            echo '<h6>' . $get_profile_detail->business_name . '</h6>';
                                        } else {
                                            echo 'Profile not added';
                                        }
                                        ?>
                                    </td>

                                    <td style="text-align:center;">
                                        <h6><?php echo $vendor->email; ?></h6>
                                    </td>

                                    <td style="text-align:center;">
                                        <h6><?php echo $vendor->phone; ?></h6>
                                    </td>

                                    <td style="text-align:center;">
                                        <h6><?php echo strtoupper($vendor->country); ?></h6>
                                    </td>

                                    <td style="text-align:center;">
                                        <?php if (isset($get_profile_detail->vendor->profile_image)) { ?>
                                        <h6>
                                            <a href="/storage/<?php echo $get_profile_detail->vendor->profile_image; ?>" target="_BLANK">View</a>
                                        </h6>
                                        <?php } else {
													echo "No file Present";
												} ?>
                                    </td>

                                    <td style="text-align:center;">
                                        <?php if (!empty($get_profile_detail->vendor->profile_image)) { ?>
                                        <h6>
                                            <a href="/admin/view_profile/<?php echo $get_profile_detail->id; ?>">View
                                            </a>
                                        </h6>
                                        <?php } else {
													echo "No file Present";
												} ?>
                                    </td>

                                    <td style="text-align:center;">
                                        <h6><?php echo $vendor->created_at; ?></h6>
                                    </td>

                                    <td style="text-align:center;">
                                        <form action="/admin/update_vendor_approval/<?php echo $vendor->id; ?>" method="POST" id="approvalForm">
                                            @csrf
                                            <?php if ($vendor->status === 0): ?>
                                                <input type="text" hidden value="1" name="status">
                                                <button type="button" onclick="this.form.submit();">Approve</button>
                                            <?php else: ?>
                                                <input type="text" hidden value="0" name="status">
                                                <button type="button" onclick="this.form.submit();">Disapprove</button>
                                            <?php endif; ?>
                                        </form>
                                    </td>

                                    <td style="text-align:center;">
                                        <a href="/admin/delete_vendor/<?php echo $vendor->id; ?>"><i class="fa fa-trash fa-2x"
                                                aria-hidden="true"></i></a>
                                    </td>

                                </tr>
                                <?php } ?>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Hide Vendors</div>
                </div>
                <div class="">
                    <div class="table-responsive">
                        <table
                            class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align:center;">Id</th>
                                    <th scope="col" style="text-align:center;">Name</th>
                                    <th scope="col" style="text-align:center;">Business Name</th>
                                    <th scope="col" style="text-align:center;">Email</th>
                                    <th scope="col" style="text-align:center;">Phone</th>
                                    <th scope="col" style="text-align:center;">Country</th>
                                    <th scope="col" style="text-align:center;">Image</th>
                                    <th scope="col" style="text-align:center;">View Profile</th>
                                    <th scope="col" style="text-align:center;">Created At</th>
                                    {{-- <th scope="col" style="text-align:center;">Action</th> --}}
                                    <th scope="col" style="text-align:center;">Restore</th>
                                </tr>
                            </thead>
                            <tbody> <?php foreach ($data['hideVendors'] as $vendor) {

									?>
                                <?php if ($vendor->hide == 1) { ?>
                                <tr>
                                    <td style="text-align:center;">
                                        <h6>
                                            <a href=""><?php echo $vendor->id; ?></a>
                                        </h6>
                                    </td>

                                    <td style="text-align:center;">
                                        <h6><?php echo $vendor->name; ?></h6>
                                    </td>

                                    <?php
                                        $get_profile_detail = BusinessProfile::where('user_id', $vendor->id)->first();
                                    ?>


                                    <td style="text-align:center;">
                                        <?php
                                        if (isset($get_profile_detail->business_name)) {
                                            echo '<h6>' . $get_profile_detail->business_name . '</h6>';
                                        } else {
                                            echo 'Profile not added';
                                        }
                                        ?>
                                    </td>

                                    <td style="text-align:center;">
                                        <h6><?php echo $vendor->email; ?></h6>
                                    </td>

                                    <td style="text-align:center;">
                                        <h6><?php echo $vendor->phone; ?></h6>
                                    </td>

                                    <td style="text-align:center;">
                                        <h6><?php echo strtoupper($vendor->country); ?></h6>
                                    </td>

                                    <td style="text-align:center;">
                                        <?php if (isset($get_profile_detail->vendor->profile_image)) { ?>
                                        <h6>
                                            <a href="/storage/<?php echo $get_profile_detail->vendor->profile_image; ?>" target="_BLANK">View</a>
                                        </h6>
                                        <?php } else {
													echo "No file Present";
												} ?>
                                    </td>

                                    <td style="text-align:center;">
                                        <?php if (!empty($get_profile_detail->vendor->profile_image)) { ?>
                                        <h6>
                                            <a href="/admin/view_profile/<?php echo $get_profile_detail->id; ?>">View
                                            </a>
                                        </h6>
                                        <?php } else {
													echo "No file Present";
												} ?>
                                    </td>

                                    <td style="text-align:center;">
                                        <h6><?php echo $vendor->created_at; ?></h6>
                                    </td>

                                    <td style="text-align:center;">
                                        <a href="/admin/restore_vendor/{{ $vendor->id }}" class="btn btn-primary">Restore</a>
                                    </td>

                                </tr>
                                <?php } ?>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-4 END -->

</div>
<!-- CONTAINER END -->
</div>

<!-- SIDE-BAR -->

<!-- SIDE-BAR CLOSED -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchInput");
        const tableBody = document.querySelector("tbody");

        searchInput.addEventListener("input", function() {
            const searchValue = this.value.trim().toLowerCase();
            const rows = tableBody.querySelectorAll("tr");

            rows.forEach(function(row) {
                const columns = row.querySelectorAll("td");
                let rowMatch = false;

                columns.forEach(function(column) {
                    const cellText = column.textContent.toLowerCase();
                    if (cellText.includes(searchValue)) {
                        rowMatch = true;
                    }
                });

                if (rowMatch) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });
        });
    });
</script>

@include('inc_admin.footer')
