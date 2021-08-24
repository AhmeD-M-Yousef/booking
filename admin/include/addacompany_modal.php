<!-- add company Modal -->
<div class="modal fade" id="addcompany_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add a new company</h5>
        <button style="position: absolute;top: 14px;right: 20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?do=insert" method="post" >
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Company Name</label>
                <input id="cc-payment"  type="text" class="form-control name" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-number" class="control-label mb-1">Location</label>
                <input id="cc-number"  type="text" class="form-control cc-number identified visa location" >
            </div>
            <div class="form-group ">
                <label for="cc-name" class="control-label mb-1">email</label>
                <input id="cc-name"  type="email" class="form-control cc-name valid email2" >
            </div>
            <div class="row">
              <div class="col-12 col-md-6">
                  <label for="cc-exp" class="control-label mb-1">Select Type</label>
                    <select  id="select" class="form-control type">
                        <option value="">Please select</option>
                        <option value="1">Owner</option>
                        <option value="2">Broker</option>
                        <option value="3">Investor</option>
                    </select>
              </div>
                <div class="col-6">
                    <label for="x_card_code" class="control-label mb-1">Phone number</label>
                    <div class="input-group">
                        <input id="x_card_code"  type="tel" class="form-control cc-cvc phone2" autocomplete="off">
                    </div>

                </div>

                  <br>
                  <br><br><br>
                    <div  class=" col-12 errorshow2">

                    </div>

            </div>

        </form>
      </div>
      <div class="modal-footer">
            <button id="payment-button"  class="btn btn-lg btn-info btn-block sendcompany">
                <i class="fa fa-lock fa-lg"></i>&nbsp;
                <span id="payment-button-amount ">Send</span>
            </button>
      </div>
    </div>
  </div>
</div>
<!--end add company Modal -->
