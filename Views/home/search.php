<section id="search" class=" search">
    <?php
    echo Session::get('uid');
    ?>

    <div class="container flex flex-column flex-c-c">
        <form class="w-50 flex flex-column flex-c-c" action="<?php echo URLROOT . "/search/" ?>" method="post">
            <div class="w-full flex">
                <input type="text" name="search_text" class="w-full search__box" placeholder="search anything..." />
                <input type="submit" name="search" value="search" class="search__btn" />
            </div>
            <div class="w-full mt-1 flex flex-s-c">
                <p>Filter by: </p>
            </div>
            <div class="w-full flex flex-sb-c search__filter">

                <select name="location" value="location" class="search__filter_location">
                    <option value="">Location</option>
                    <option value="ambalanthota">Ambalanthota</option>
                    <option value="kandy">Kandy</option>
                    <option value="matara">Matara</option>
                </select>

                <select name="category" value="category" class="search__filter_category">
                    <option value="">Category</option>
                    <option value="fruit">Fruit</option>
                    <option value="rice">Rice</option>
                    <option value="spices">Spices</option>
                    <option value="vegetable">Vegetable</option>
                </select>

                <select disabled name="price_range" value="price" class="search__filter_price">
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