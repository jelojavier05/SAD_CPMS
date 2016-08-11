@extends('client.ClientDashboard')
@section('title')
Client Request of Guard
@endsection

@section('content')

  <div class="row">
         <div class="col s5 push-s3" style="margin-left:-5%;margin-top:-1.5%">
                <h3 style="font-family:Myriad Pro;margin-top:9.2%;color:#2D4262">Request for <i>GUARDS</i></h3>
         </div>
    </div>
<!-------------------------TABS----------------------->

<div class="row">
<div class="col s12 ci" style="margin-top:-2%">
        <div class="col s10 push-s2" style="margin-left:1.2%">
          <ul class="tabs" style="border: 1px solid grey;background-color:#F1F3CE">
            <li class="tab col s3"><a href="#test1">Additional</a></li>
            <li class="tab col s3"><a href="#test2">Replacement</a></li>

          </ul>
        </div>
   <!------------------------TAB 1----------------------->
        <div id="test1" class="col s10 push-s2" style="margin-left:1.2%">
              <div class="card white-content" style="border: 1px solid grey;">
                  <div class="card-content" style="background-color:#F0EFEA">

                          <!--<span class="card-title"><center>Request for <b>Additional Guards</b></center></span>-->
                          <p>Requisition of <b>additional guards</b> for better maintenance of services.</p>


                              <div class="input-field col s3 offset-s10 pull-s10">
                                  <i class="material-icons prefix">toc</i>
                                  <input id="icon_prefix" type="number" class="validate" value="1">
                                  <label for="icon_prefix">Guards Needed</label>
                              </div>

                              <div class="input-field col s12">
                                <textarea id="gunreq" class="materialize-textarea" length="240"></textarea>
                                <label for="gunreq">Please specify the reasons for requesting</label>
                              </div>

                              <p> <b>Note!</b><br><i>THE APPLICATION FOR ALL REQUISITION MUST BE 2 WEEKS PRIOR TO THE GIVEN DATE OF APPROVAL</i></p>

                        <div class="row">
                            <div class="col l12">
                                <div class="card-action">
                                  <button class="btn waves-effect waves-light indigo darken-4 right" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                  </button>
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
    <!-----------------END OF TAB 1----------------------------->
    
    
     <!------------------------TAB 2----------------------->
     <div id="test2" class="col s10 push-s2" style="margin-left:1.2%">
              <div class="card white-content" style="border: 1px solid grey;">
                  <div class="card-content" style="background-color:#F0EFEA">

                          <!--<span class="card-title"><center>Request for <b>Replacement for Guards</b></center></span>-->
                          <p>Requisition of <b>replacing guards</b> for better maintenance of services.</p>


                              <div class="input-field col s3 offset-s10 pull-s10">
                                  <i class="material-icons prefix">toc</i>
                                  <input id="icon_prefix" type="number" class="validate" value="1">
                                  <label for="icon_prefix">Guards Needed</label>
                              </div>

                              <div class="input-field col s12">
                                <textarea id="gunreq" class="materialize-textarea" length="240"></textarea>
                                <label for="gunreq">Please specify the reasons for requesting</label>
                              </div>

                              <p> <b>Note!</b><br><i>THE APPLICATION FOR ALL REQUISITION MUST BE 2 WEEKS PRIOR TO THE GIVEN DATE OF APPROVAL</i></p>

                        <div class="row">
                            <div class="col l12">
                                <div class="card-action">
                                  <button class="btn waves-effect waves-light indigo darken-4 right" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                  </button>
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
</div>
</div>
    <!-----------------END OF TAB 2----------------------------->
    
<script>
    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
</script>

@stop