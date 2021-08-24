<?php
include 'admin/function/connect.php';
?>
    <div class="container ">
        <div class="row">
            <div class="col-lg-12">
                <form class="filter-form" method="post" action="search-result.php">
                    <div class="location">
                        <p>Location</p>
                        <select class="filter-location" name="location">
                          <option value="0">All</option>
<?php
$select_gov = "SELECT * FROM governorate";
$result_gov = $connect->query($select_gov);
foreach ($result_gov as $row_gov) {
?>
                            <option value="<?php echo $row_gov['id']; ?>"><?php echo $row_gov['name']; ?></option>
<?php  }  ?>
                        </select>
                    </div>
                    <div class="search-type">
                        <p>Property Type</p>
                        <select class="filter-property" name="prop_type">
                          <option value="0">All</option>
<?php
$select_prop = "SELECT * FROM prop_type";
$result_prop = $connect->query($select_prop);
foreach ($result_prop as $row_prop) {
?>
                            <option value="<?php echo $row_prop['id']; ?>"><?php echo $row_prop['name']; ?></option>
<?php  }  ?>
                        </select>
                    </div>
                    <div class="search-type ">
                        <p>Company Name</p>
                        <select class="filter-property" name="com_id">
                          <option value="0">All</option>
<?php
$select_comp = "SELECT * FROM company";
$result_comp = $connect->query($select_comp);
foreach ($result_comp as $row_comp) {
?>
                            <option value="<?php echo $row_comp['id']; ?>"><?php echo $row_comp['name']; ?></option>
<?php  }  ?>

                        </select>
                    </div>
                    <div class="price-range">
                        <p>Price</p>
                        <div class="range-slider">
                            <div id="slider-range">
                                <div tabindex="0"
                                    class="ui-slider-handle ui-corner-all ui-state-default slider-left min_price_div">50k</div>
                                    <input class="min_price_in" type="hidden" name="min_price" value="50000">
                                    <input class="max_price_in" type="hidden" name="max_price" value="300000">
                                <div tabindex="0"
                                    class="ui-slider-handle ui-corner-all ui-state-default slider-right max_price_div">300k</div>
                            </div>
                        </div>
                    </div>
                    <div class="bedrooms">
                        <p>Bedrooms</p>
                        <div class="room-filter-pagi">
                          <div class="bf-item">
                              <input type="hidden" name="room" id="room-0" value="0">
                          </div>
                            <div class="bf-item">
                                <input type="radio" name="room" id="room-1" value="1">
                                <label for="room-1">1</label>
                            </div>
                            <div class="bf-item">
                                <input type="radio" name="room" id="room-2" value="2">
                                <label for="room-2">2</label>
                            </div>
                            <div class="bf-item">
                                <input type="radio" name="room" id="room-3" value="3">
                                <label for="room-3">3</label>
                            </div>
                            <div class="bf-item">
                                <input type="radio" name="room" id="room-4" value="4">
                                <label for="room-4">4+</label>
                            </div>
                        </div>
                    </div>

                    <div class="search-btn">
                        <button class="search-bttn" name="submit" type="submit"><i style="margin-left: -7px;}" class="flaticon-search"></i>Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
