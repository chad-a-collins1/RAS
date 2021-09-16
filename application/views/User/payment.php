<div class="form-group row justify-content-center">
		<div class="col-md-6 text-center">
			<header><strong><h1>Payment</strong></h1></header>
		</div>
	</div>
	
		
		<div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formPayment"></span>
                    <hr class="my-5">

                    <!-- form card cc payment -->
                    <div class="card card-outline-secondary">
                        <div class="card-body">
                            <h3 class="text-center">Payment</h3>
                            <hr>
                           
                            <form class="form" autocomplete="off">
                                <div class="form-group">
                                    <label for="cc_name">Name</label>
                                    <input type="text" class="form-control" id="cc_name" name="name" pattern="\w+ \w+.*" title="First and last name" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Card Number</label>
                                    <input type="text" class="form-control" name="card_no" autocomplete="off" maxlength="20" pattern="\d{16}" title="Credit card number" required="">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12">Card Exp. Date</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="month" size="0">
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="year" size="0">
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                            <option>2021</option>
                                            <option>2022</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="cvv_no" class="form-control" autocomplete="off" maxlength="3" pattern="\d{3}" title="Three digits at back of your card" required="" placeholder="CVC">
                                    </div>
                                </div>
                               <!-- <div class="row">
                                    <label class="col-md-12">Amount</label>
                                </div>
                                <div class="form-inline">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                        <input type="text" name="amount" class="form-control text-right" id="exampleInputAmount" placeholder="39">
                                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                    </div>
                                </div>-->
								 <div class="form-group">
                                    <label>billing Address</label>
                                    <input type="text" class="form-control" name="billingaddress" autocomplete="off"  pattern="\d{16}" title="Credit card number" required="">
                                </div>
								
								
                                  
                                <div class="form-group row">
                                    <label class="col-md-12">State</label>
                                    <div class="col-md-4">
                                       <input type="text" name="state" class="form-control"placeholder="">
                                    </div>
									
                                    <div class="col-md-4">
                                         <input type="text" name="city" class="form-control"placeholder="city">
                                    </div>
								
                                    <div class="col-md-4">
                                        <input type="text" name="zip_code" class="form-control"placeholder="Zip Code">
                                    </div>
                                </div>  
									
                                 <hr>
                                <div class="form-group row">
                                    
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
                                    </div>
									  <div class="col-md-6">
                                        <button type="submit" class="btn btn-success btn-lg btn-block">cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form card cc payment -->
		
		
		
	</div>