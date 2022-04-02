<div id="product-header" class="product-header mb-40 style-2 bg-white">
    <div class="product-header-item">
        <div class="item">Sort By : </div>
        <form name="sort">
            @php
                $sort_by = $_GET['sort_by'] ?? '';
            @endphp
            <select name="sort_by" class="select-bar">
                <option value="">None</option>
                <option value="name" {{ 'name' === $sort_by ? 'selected' : '' }}>Name</option>
                <option value="date" {{ 'date' === $sort_by ? 'selected' : '' }}>Date</option>
            </select>
        </form>
    </div>
    <div class="product-header-item">
        <div class="item">Show : </div>
        <form name="show">
            @php
                $show = $_GET['show'] ?? '';
            @endphp
            <select name="show" class="select-bar">
                <option value="8" {{ 8 == $show ? 'selected' : '' }}>08</option>
                <option value="24" {{ 24 == $show ? 'selected' : '' }}>24</option>
                <option value="32" {{ 32 == $show ? 'selected' : '' }}>32</option>
                <option value="40" {{ 40 == $show ? 'selected' : '' }}>40</option>
                <option value="48" {{ 48 == $show ? 'selected' : '' }}>48</option>
            </select>
        </form>
    </div>
    <form class="product-search ml-auto" name="search">
        @if (request()->is('auctions'))
            <input type="search" name="find" placeholder="Item Name" value="{{ $_GET['find'] ?? '' }}">
        @else
            <input type="search" name="search" placeholder="Item Name" value="{{ $_GET['search'] ?? '' }}">
        @endif
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>
