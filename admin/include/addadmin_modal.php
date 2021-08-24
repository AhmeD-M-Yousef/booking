<!-- add admin Modal -->
<div class="modal fade" id="addadmin_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add a new Admin</h5>
        <button style="position: absolute;top: 14px;right: 20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?do=insert" method="post" >
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">username</label>
                <input id="cc-payment"  type="text" class="form-control username" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group ">
                <label for="cc-name" class="control-label mb-1">email</label>
                <input id="cc-name"  type="email" class="form-control cc-name valid email" >
            </div>
            <div class="form-group">
                <label for="cc-number" class="control-label mb-1">password</label>
                <input id="cc-number"  type="password" class="form-control cc-number identified visa password" >
            </div>
            <div class="row">
              <div class="col-12 col-md-6">
                  <label for="cc-exp" class="control-label mb-1">Select Position</label>
                    <select  id="select" class="form-control position">
                        <option value="">Please select</option>
                        <option value="1">Owner</option>
                        <option value="2">admin</option>
                        <option value="3">moderator</option>

                    </select>
              </div>
                <div class="col-6">
                    <label for="x_card_code" class="control-label mb-1">Phone number</label>
                    <div class="input-group">
                        <input id="x_card_code"  type="tel" class="form-control cc-cvc phone" autocomplete="off">
                    </div>
                </div>
                <div class="row form-group ">
                    <div class="col col-md-3"><label style="margin: 19px;width: 190px;" class=" form-control-label ">Choose gender</label></div>
                    <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            <label style="margin: 20px;padding-left: 15px;" for="inline-radio1" class="form-check-label ">
                                <input type="radio" id="inline-radio1" name="gender" value="0" class="form-check-input gender" checked>Male
                            </label>
                            <label for="inline-radio2" class="form-check-label ">
                                <input type="radio" id="inline-radio2" name="gender" value="1" class="form-check-input gender">Female
                            </label>

                        </div>
                    </div>

                </div>

                    <div  class=" col-12 errorshow">

                    </div>

            </div>

        </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary btn-lg col-2" data-dismiss="modal">Close</button> -->
            <button id="payment-button"  class="btn btn-lg btn-info btn-block sendadmin">
                <i class="fa fa-lock fa-lg"></i>&nbsp;
                <span id="payment-button-amount ">Send</span>
            </button>
      </div>
    </div>
  </div>
</div>
<!--end add admin Modal -->
