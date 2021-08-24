<!-- add gov Modal -->
<div class="modal fade" id="addgov_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add a new Governorate</h5>
        <button style="position: absolute;top: 14px;right: 20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" >
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Name</label>
                <input id="cc-payment"  type="text" class="form-control name" aria-required="true" aria-invalid="false" >
            </div>
            <div class="row">
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
<!--end add gov Modal -->

<!-- add service Modal -->
<div class="modal fade" id="addservice_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add a new Services</h5>
        <button style="position: absolute;top: 14px;right: 20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" >
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Name</label>
                <input id="cc-payment"  type="text" class="form-control names" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Service Price</label>
                <input id="cc-payment"  type="text" class="form-control price" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Description</label>
                <input id="cc-payment"  type="text" class="form-control description" aria-required="true" aria-invalid="false" >
            </div>
            <div class="row">
                    <div  class=" col-12 errorshow2">

                    </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
            <button id="payment-button"  class="btn btn-lg btn-info btn-block sendservice">
                <i class="fa fa-lock fa-lg"></i>&nbsp;
                <span id="payment-button-amount ">Send</span>
            </button>
      </div>
    </div>
  </div>
</div>
<!--end add service Modal -->
