<section id="search" class="ff-poppins search">
    <div class="container flex flex-column flex-c-c">
        <form class="w-50 flex flex-column flex-c-c">
            <div class="w-full flex">
                <input type="text" name="search" class="w-full search__box" placeholder="search anything..." />
                <input type="submit" value="search" class="search__btn" />
            </div>
            <div class="w-full mt-1 flex flex-s-c">
                <p>Filter by: </p>
            </div>
            <div class="w-full flex flex-sb-c search__filter">

                <select name="location" value="location" class="search__filter_location">
                    <option value="">Location</option>
                    <option value="location1">Location 1</option>
                    <option value="location2">Location 2</option>
                    <option value="location3">Location 3</option>
                </select>

                <select name="category" value="category" class="search__filter_category">
                    <option value="">Category</option>
                    <option value="category1">Category 1</option>
                    <option value="category2">Category 2</option>
                    <option value="category3">Category 3</option>
                </select>

                <select name="price_range" value="price" class="search__filter_price">
                    <option value="">Price Range</option>
                    <option value="price1">1000 - 1500</option>
                    <option value="price2">1500 - 2000</option>
                    <option value="price3">2000 - 2500</option>
                </select>

                <select name="time_period" value="time" class="search__filter_time">
                    <option value="">Time Period</option>
                    <option value="time1">1 Month</option>
                    <option value="time2">2 Month</option>
                    <option value="time3">3 Month</option>
                </select>

            </div>
        </form>

        <div class=" related__serach">
            <a href="#">Fertilizer</a>
            <a href="#">Pesticides</a>
            <a href="#">Seeds</a>
            <a href="#">Tools</a>
            <a href="#">Tools</a>
        </div>

    </div>
</section>