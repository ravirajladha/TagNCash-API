<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Vendors;
?>
@include('inc_admin.header')

<!-- CONTAINER -->
<div class="app-content">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h4 class="page-title">Orders</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
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
                    <div class="card-title">All Users</div>
                </div>
                <div class="">
                    <div class="table-responsive">
                        <table
                            class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align:center;">Id</th>
                                    <th scope="col" style="text-align:center;">User Name</th>
                                    <th scope="col" style="text-align:center;">email</th>
                                    <th scope="col" style="text-align:center;">Phone no</th>
                                    <th scope="col" style="text-align:center;">Country</th>
                                    <th scope="col" style="text-align:center;">Created At</th>
                                    <th scope="col" style="text-align:center;">Disable</th>


                                </tr>
                            </thead>
                            <tbody> <?php foreach ($data['users'] as $user) { ?>
                                <?php if ($user->hide == 0) { ?>
                                <tr>
                                    <td style="text-align:center;">

                                        <h6><a href=""><?php echo $user->id; ?></h6></a>

                                    </td>
                                    <td style="text-align:center;">

                                        <h6><?php echo $user->name; ?></h6>

                                    </td>
                                    <td style="text-align:center;">

                                        <h6><?php echo $user->email; ?></h6>

                                    </td>
                                    <td style="text-align:center;">

                                        <h6><?php echo $user->phone; ?></h6>

                                    </td>
                                    <td style="text-align:center;">

                                        <h6><?php echo strtoupper($user->country); ?></h6>

                                    </td>
                                    <td style="text-align:center;">

                                        <h6><?php echo $user->created_at; ?></h6>

                                    </td>
                                    <td style="text-align:center;">

                                        <a href="/admin/delete_user/<?php echo $user->id; ?>"><i class="fa fa-trash fa-2x"
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
                    <div class="card-title">Hide Users</div>
                </div>
                <div class="">
                    <div class="table-responsive">
                        <table
                            class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align:center;">Id</th>
                                    <th scope="col" style="text-align:center;">User Name</th>
                                    <th scope="col" style="text-align:center;">email</th>
                                    <th scope="col" style="text-align:center;">Phone no</th>
                                    <th scope="col" style="text-align:center;">Country</th>
                                    <th scope="col" style="text-align:center;">Created At</th>
                                    <th scope="col" style="text-align:center;">Disable</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['hideUsers'] as $user) { ?>
                                <?php if ($user->hide == 1) { ?>
                                <tr>
                                    <td style="text-align:center;">

                                        <h6><a href=""><?php echo $user->id; ?></h6></a>

                                    </td>
                                    <td style="text-align:center;">

                                        <h6><?php echo $user->name; ?></h6>

                                    </td>
                                    <td style="text-align:center;">

                                        <h6><?php echo $user->email; ?></h6>

                                    </td>
                                    <td style="text-align:center;">

                                        <h6><?php echo $user->phone; ?></h6>

                                    </td>
                                    <td style="text-align:center;">

                                        <h6><?php echo strtoupper($user->country); ?></h6>

                                    </td>
                                    <td style="text-align:center;">

                                        <h6><?php echo $user->created_at; ?></h6>

                                    </td>
                                    <td style="text-align:center;">

                                        <a href="/admin/restore_user/{{ $user->id }}"
                                            class="btn btn-primary">Restore</a>
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
