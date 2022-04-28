<div class="row mt-5 ms-1 mb-5">
    <div class="card col mx-3 shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Today Sale</h3>
        </div>
        <div class="card-body">
            <!--begin::Svg Icon | path: assets/media/icons/duotune/ecommerce/ecm005.svg-->
            <span class="svg-icon svg-icon-muted svg-icon-4hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3" d="M20 22H4C3.4 22 3 21.6 3 21V2H21V21C21 21.6 20.6 22 20 22Z" fill="black"/>
            <path d="M12 14C9.2 14 7 11.8 7 9V5C7 4.4 7.4 4 8 4C8.6 4 9 4.4 9 5V9C9 10.7 10.3 12 12 12C13.7 12 15 10.7 15 9V5C15 4.4 15.4 4 16 4C16.6 4 17 4.4 17 5V9C17 11.8 14.8 14 12 14Z" fill="black"/>
            </svg></span>
            <!--end::Svg Icon-->
            <span id="today-sale"></span>
        </div>
    </div>
    <div class="card col mx-3 shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Total Sales</h3>
        </div>
        <div class="card-body">
            <!--begin::Svg Icon | path: assets/media/icons/duotune/ecommerce/ecm005.svg-->
            <span class="svg-icon svg-icon-muted svg-icon-4hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3" d="M20 22H4C3.4 22 3 21.6 3 21V2H21V21C21 21.6 20.6 22 20 22Z" fill="black"/>
            <path d="M12 14C9.2 14 7 11.8 7 9V5C7 4.4 7.4 4 8 4C8.6 4 9 4.4 9 5V9C9 10.7 10.3 12 12 12C13.7 12 15 10.7 15 9V5C15 4.4 15.4 4 16 4C16.6 4 17 4.4 17 5V9C17 11.8 14.8 14 12 14Z" fill="black"/>
            </svg></span>
            <!--end::Svg Icon-->
            <span id="total-sales"></span>
        </div>
    </div>
    <div class="card col mx-3 shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Total Earnings</h3>
        </div>
        <div class="card-body">
            <!--begin::Svg Icon | path: assets/media/icons/duotune/ecommerce/ecm005.svg-->
            <span class="svg-icon svg-icon-muted svg-icon-4hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3" d="M20 22H4C3.4 22 3 21.6 3 21V2H21V21C21 21.6 20.6 22 20 22Z" fill="black"/>
            <path d="M12 14C9.2 14 7 11.8 7 9V5C7 4.4 7.4 4 8 4C8.6 4 9 4.4 9 5V9C9 10.7 10.3 12 12 12C13.7 12 15 10.7 15 9V5C15 4.4 15.4 4 16 4C16.6 4 17 4.4 17 5V9C17 11.8 14.8 14 12 14Z" fill="black"/>
            </svg></span>
            <!--end::Svg Icon-->
            <span id="total-earnings"></span>
        </div>
    </div>
    <div class="card col mx-3 shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Total Orders</h3>
        </div>
        <div class="card-body">
            <!--begin::Svg Icon | path: assets/media/icons/duotune/ecommerce/ecm005.svg-->
            <span class="svg-icon svg-icon-muted svg-icon-4hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3" d="M20 22H4C3.4 22 3 21.6 3 21V2H21V21C21 21.6 20.6 22 20 22Z" fill="black"/>
            <path d="M12 14C9.2 14 7 11.8 7 9V5C7 4.4 7.4 4 8 4C8.6 4 9 4.4 9 5V9C9 10.7 10.3 12 12 12C13.7 12 15 10.7 15 9V5C15 4.4 15.4 4 16 4C16.6 4 17 4.4 17 5V9C17 11.8 14.8 14 12 14Z" fill="black"/>
            </svg></span>
            <!--end::Svg Icon-->
            <span id="total-orders"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="card col ms-5 me-2">
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
