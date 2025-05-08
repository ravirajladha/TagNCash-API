@include('inc_admin.header')

<!-- CONTAINER -->
<div class="app-content">
    <br><br>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h5 class="page-title">&nbsp;&nbsp;Business Name : <?php echo $data['vendors']->business_name; ?> <br>
            &nbsp;&nbsp;ID : <?php echo $data['vendors']->user_id; ?>

        </h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-md-12 col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">View Profile</div>
                </div>
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align:center;">Address</th>
                                    <th scope="col" style="text-align:center;">State</th>
                                    <th scope="col" style="text-align:center;">City</th>
                                    <th scope="col" style="text-align:center;">Pincode</th>
                                    <th scope="col" style="text-align:center;">Tax ID</th>
                                    <th scope="col" style="text-align:center;">Registration ID</th>
                                    <th scope="col" style="text-align:center;">Agreement</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td style="text-align:center;">
                                        <h6><?php echo $data['vendors']->address; ?></h6>
                                    </td>
                                    <td style="text-align:center;">
                                        <h6><?php echo $data['vendors']->state; ?></h6>
                                    </td>
                                    <td style="text-align:center;">
                                        <h6><?php echo $data['vendors']->city; ?></h6>
                                    </td>
                                    <td style="text-align:center;">
                                        <h6><?php echo $data['vendors']->pincode; ?></h6>
                                    </td>
                                    <td style="text-align:center;">
                                        <h6><?php echo $data['vendors']->tax_id; ?></h6>
                                    </td>
                                    <td style="text-align:center;">
                                        <h6><?php echo $data['vendors']->registration_id; ?></h6>
                                    </td>
                                    <td style="text-align:center;">
                                        <?php if (!empty($data['vendors']->agreement)) { ?>
                                            <h6>
                                                <a href="/storage/<?php echo $data['vendors']->agreement; ?>" target="_BLANK">View
                                                </a>
                                            </h6> <?php } else {
                                                    echo "No file Present";
                                                } ?>
                                    </td>
                                </tr>

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

@include('inc_admin.footer')