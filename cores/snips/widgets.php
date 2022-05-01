<div class="row mt-5 ms-1 mb-5">
    <div class="card col mx-3 shadow-sm pb-2">
        <h3 class="card-title text-gray-700 m-4 text-end">Today Sale</h3>
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="h-70px w-70px rounded-circle justify-content-center 
            ms-3 d-flex align-items-center" style="background-color: #eeece5;">
                <i class="fas fa-shopping-cart text-primary fs-2hx"></i>
            </div>
            <span class="fw-bolder text-end fs-2hx me-3" id="today-sale"></span>
        </div>
    </div>
    <div class="card col mx-3 shadow-sm pb-2">
    <h3 class="card-title text-gray-700 m-4 text-end">Total Sales</h3>
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="h-70px w-70px rounded-circle justify-content-center
             ms-3 d-flex align-items-center" style="background-color: #eeece5;">
                <i class="fas fa-shopping-bag text-primary fs-2hx"></i>
            </div>
            <span class="fw-bolder text-end fs-2hx me-3" id="total-sales"></span>
        </div>
    </div>
    <div class="card col mx-3 shadow-sm pb-2">
        <h3 class="card-title text-gray-700 m-4 text-end">Total Earnings</h3>
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="h-70px w-70px rounded-circle justify-content-center 
            ms-3 d-flex align-items-center" style="background-color: #eeece5;">
                <i class="fas fa-dollar-sign text-primary fs-2hx"></i>
            </div>
            <span class="fw-bolder text-end fs-2hx me-3" id="total-earnings"></span>
        </div>
    </div>
    <div class="card col mx-3 shadow-sm pb-2">
    <h3 class="card-title text-gray-700 m-4 text-end">Total Orders</h3>
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="h-70px w-70px rounded-circle justify-content-center 
            ms-3 d-flex align-items-center" style="background-color: #eeece5;">
                <i class="fas fa-cubes text-primary fs-2hx"></i>
            </div>
            <span class="fw-bolder text-end fs-2hx me-3" id="total-orders"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="card col ms-5 me-2">
        <h2 class="p-2 mb-0 text-center">Recent Sales</h2>
        <table class="table table-row-bordered" id="sale-history">
            <thead>
                <tr class="fw-bolder fs-6 text-gray-800">
                    <th>Sale Id</th>
                    <th>Bill Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="card col">
        <h2 class="p-2 text-center">Monthly sales</h2>
        <canvas id="sale-chart"></canvas>
    </div>
</div>
