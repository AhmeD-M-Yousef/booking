<!-- add admin Modal -->
<div class="modal fade" id="addproperty_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add a new property</h5>
        <button style="position: absolute;top: 14px;right: 20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formSend" action="" method="post" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Name</label>
                <input id="cc-payment"  type="text" name="name" class="form-control name" aria-required="true" aria-invalid="false" >
            </div>

            <div class="row">
              <div class="col-12 col-md-6">
                  <label for="cc-exp" class="control-label mb-1">Select property type</label>
                    <select  id="select" name="prop_type" class="form-control prop_type">
                        <option value="">Please select</option>
                        <option value="1">Villa</option>
                        <option value="2">Flat</option>
                        <option value="3">Commercial</option>
                    </select>
              </div>
                <div class="col-6">
                    <label for="x_card_code" class="control-label mb-1">Price</label>
                    <div class="input-group">
                        <input id="x_card_code" name="price"  type="text" class="form-control cc-cvc price" autocomplete="off">
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group ">
                <label for="cc-name" class="control-label mb-1">Rooms Number</label>
                <input id="cc-name"  type="text" name="room_num" class="form-control cc-name valid room_num" >
            </div>

            <div class="row">
              <div class="col-12 col-md-6">
                  <label for="cc-exp" class="control-label mb-1">Select Governorate</label>
                    <select  id="select" name="gov" class="form-control gov">
                        <option value="">Please select</option>
                        <?php
                        $select_prop_gov2  = "SELECT * FROM governorate";
                        $result_prop_gov2  = $connect->query($select_prop_gov2);
                        foreach ($result_prop_gov2 as $row_prop_gov2) {
                        ?>
                        <option value="<?php echo $row_prop_gov2['id']; ?>"><?php echo $row_prop_gov2['name']; ?> </option>

                      <?php } ?>
                    </select>
              </div>
              <div class="col-12 col-md-6">
                  <label for="cc-exp" class="control-label mb-1">Select Company name</label>
                    <select  id="select" name="com_name" class="form-control com_name">
                        <option value="">Please select</option>
                        <?php
                        $select_com_type2  = "SELECT * FROM company";
                        $result_com_type2  = $connect->query($select_com_type2);
                        foreach ($result_com_type2 as $row_com_type2) {
                        ?>
                        <option value="<?php echo $row_com_type2['id'] ?>"><?php echo $row_com_type2['name'] ?> </option>
                      <?php } ?>
                    </select>
              </div>


            </div>
            <br>
            <div class="form-group">
                <label for="cc-number" class="control-label mb-1">Description</label>
                <!-- <input id="cc-number"  type="text" class="form-control cc-number identified visa description" > -->
                <textarea class="form-control desc" name="desc" rows="5" cols="80"></textarea>
            </div>
            <div class="row form-group" style="border: 1px solid #ced4da;border-radius: 4px;padding: 16px 0;margin: 0;">
                  <div class="col col-md-4"><label for="file-multiple-input" class=" form-control-label">Insert Images</label></div>
                  <div class="col-12 col-md-8"><input type="file" id="file-multiple-input" name="img[]" multiple="" class="form-control-file img"></div>
            </div>
            <br>
            <div  class=" col-12 errorshow3">

            </div>

            <div class="modal-footer ">
              <!-- <button type="button" class="btn btn-secondary btn-lg col-2" data-dismiss="modal">Close</button> -->
                  <button id="payment-button"  class="btn btn-lg btn-info btn-block sendprop">
                      <i class="fa fa-lock fa-lg"></i>&nbsp;
                      <input style="background: none;border: none;color: white;" class="sendprop" type="submit" name="Send" value="Send">
                  </button>
            </div>

        </form>
      </div>

    </div>
  </div>
</div>
<!--end add admin Modal -->
