<div class="col-lg-4 mb-50">
    <div class="widget">
        <h5 class="title">Filter by Price</h5>
        <form id="form-price-range">
            <div class="widget-body">
                <div id="slider-range"></div>
                <div class="price-range">
                    <label for="amount">Price :</label>
                    <input type="text" id="amount" readonly>
                </div>
            </div>
            <div class="text-center mt-20">
                <input type="hidden" name="filtered" value="true">
                <input type="hidden" id="price-min" name="min">
                <input type="hidden" id="price-max" name="max">
                <button type="submit" class="custom-button">Filter</button>
            </div>

    </div>
    {{-- <div class="widget">
        <h5 class="title">Auction Type</h5>
        <div class="widget-body">
            <div class="widget-form-group">
                <input type="checkbox" name="check-by-type" id="check1">
                <label for="check1">Live Auction</label>
            </div>
            <div class="widget-form-group">
                <input type="checkbox" name="check-by-type" id="check2">
                <label for="check2">Timed Auction</label>
            </div>
            <div class="widget-form-group">
                <input type="checkbox" name="check-by-type" id="check3">
                <label for="check3">Buy Now</label>
            </div>
        </div>
    </div> --}}
    <div class="widget">
        <h5 class="title">Ending Within</h5>
        <div class="widget-body">
            @php
                $ends = $_GET['ends_within'] ?? '';
            @endphp
            <div class="widget-form-group">
                <input type="radio" name="ends_within" id="day" value="day" {{ 'day' == $ends ? 'checked' : '' }}>
                <label for="day">1 Day</label>
            </div>
            <div class="widget-form-group">
                <input type="radio" name="ends_within" id="week" value="week" {{ 'week' == $ends ? 'checked' : '' }}>
                <label for="week">1 Week</label>
            </div>
            <div class="widget-form-group">
                <input type="radio" name="ends_within" id="month1" value="month"
                    {{ 'month' == $ends ? 'checked' : '' }}>
                <label for="month1">1 Month</label>
            </div>
            <div class="widget-form-group">
                <input type="radio" name="ends_within" id="month3" value="month3"
                    {{ 'month3' == $ends ? 'checked' : '' }}>
                <label for="month3">3 Month</label>
            </div>
        </div>
    </div>
    </form>
</div>
