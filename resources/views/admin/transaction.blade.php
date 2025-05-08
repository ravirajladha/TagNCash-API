@include('inc_admin.header')


<!-- CONTAINER -->
<div class="app-content">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Users</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Components</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users List</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW OPEN -->
    <div class="row row-cards">

        <div class="col-lg-12 col-xl-12">
            <div class="input-group mb-5">
                <input type="text" class="form-control" placeholder="">
                <div class="input-group-append ">
                    <button type="button" class="btn btn-secondary">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-bottom-0 p-4">
                    <h2 class="card-title">
                        <?php
                        $count = 0;
                        $total_reward = 0;
                        foreach ($data['get_all_transactions'] as $transaction) {
                            $count++;
                            $total_reward += $transaction->reward;
                        }
                        echo $count; ?>&nbsp;
                        Transactions, &nbsp;<?php echo $total_reward; ?>&nbsp;Total Reward Gained

                    </h2>
                    <div class="page-options d-flex float-right">
                        <select class="form-control custom-select w-auto">
                            <option value="asc">Latest</option>
                            <option value="desc">Oldest</option>
                        </select>
                    </div>
                </div>
                <div class="e-table">
                    <div class="table-responsive table-lg">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">

                                    </th>
                                    <!-- <th class="text-center"></th> -->
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Coupon Id</th>
                                    <th>From User</th>
                                    <th>From Email</th>
                                    <th>To User</th>
                                    <th>To Email</th>
                                    <th>Vendor</th>
                                    <th>Reward</th>
                                    <th>Discount</th>
                                    <th>Bill Value</th>
                                    <th>Total Value</th>
                                    <th>Created At</th>
                                    <!-- <th class="text-center">Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['get_all_transactions'] as $transaction) { ?>
                                <tr>
                                    <td class="align-middle text-center">
                                        <div
                                            class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                            <input class="custom-control-input" id="item-1" type="checkbox"> <label
                                                class="custom-control-label" for="item-1"></label>
                                        </div>
                                    </td>
                                    <!-- <td class="align-middle text-center"><img alt="image" class="avatar avatar-md rounded-circle" src="/assets/images/users/female/26.jpg"></td> -->
                                    <td class="text-nowrap align-middle"><?php echo $transaction->id; ?></td>
                                    <td class="text-nowrap align-middle"><?php echo $transaction->coupon_id; ?></td>
                                    <td class="text-nowrap align-middle"><?php echo 'T&G' . $transaction->from_user_id; ?></td>
                                    <td class="text-nowrap align-middle">
                                        <div class="o-auto" style="width: 100px; cursor: e-resize">
                                            <?php echo optional($transaction->fromUser)->email; ?>
                                        </div>
                                    </td>
                                    <td class="text-nowrap align-middle"><?php echo 'T&G' . $transaction->to_user_id; ?></td>
                                    <td class="text-nowrap align-middle">
                                        <div class="o-auto" style="width: 100px; cursor: e-resize">
                                            <?php echo optional($transaction->toUser)->email ?? 'Self Redeem'; ?>
                                        </div>
                                    </td>
                                    <td class="text-nowrap align-middle">
                                        {{ $transaction->coupon->vendor->name }}
                                    </td>
                                    <td class="text-nowrap align-middle"><?php echo strtoupper($transaction->reward); ?></td>
                                    <td class="text-nowrap align-middle"><?php echo strtoupper($transaction->discount); ?></td>
                                    <td class="text-nowrap align-middle"><?php echo strtoupper($transaction->bill_value); ?></td>
                                    <td class="text-nowrap align-middle"><?php echo strtoupper($transaction->bill_value - $transaction->discount); ?></td>
                                    <td class="text-nowrap align-middle"><span><?php echo $transaction->date; ?></span></td>

                                    <!-- <td class="text-center align-middle">
           <div class="btn-group align-top">
            <a href="/admin/group_list/<?php echo $transaction->id; ?>"> <button class="btn btn-sm btn-primary badge" type="button">View</button> <button class="btn btn-sm btn-primary badge" type="button"><i class="fa fa-eye"></i></button></a>
           </div>
          </td> -->
                                    <!-- <td class="text-center align-middle">
              <div class="btn-group align-top">
               <button class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-toggle="modal" type="button">Edit</button> <button class="btn btn-sm btn-primary badge" type="button"><i class="fa fa-trash"></i></button>
              </div>
             </td> -->
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <div class="mb-5">
        <ul class="pagination float-right">
         <li class="page-item page-prev disabled">
          <a class="page-link" href="#" tabindex="-1">Prev</a>
         </li>
         <li class="page-item active"><a class="page-link" href="#">1</a></li>
         <li class="page-item"><a class="page-link" href="#">2</a></li>
         <li class="page-item"><a class="page-link" href="#">3</a></li>
         <li class="page-item"><a class="page-link" href="#">4</a></li>
         <li class="page-item"><a class="page-link" href="#">5</a></li>
         <li class="page-item page-next">
          <a class="page-link" href="#">Next</a>
         </li>
        </ul>
       </div> -->
        </div><!-- COL-END -->
    </div>
    <!-- ROW CLOSED -->
</div>
<!-- CONTAINER CLOSED -->
</div>


@include('inc_admin.footer')
