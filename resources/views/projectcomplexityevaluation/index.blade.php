@extends('layouts.app')
@section('content')
<div class="section-body">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="d-flex justify-content-between align-items-center">
<ul class="nav nav-tabs page-header-tab mt-2">

</ul>

</div>
</div>
</div>

<div class="section-body mt-3">
<div class="container-fluid">
<div class="tab-content">
<div class="tab-pane fade show active" id="Project-OnGoing" role="tabpanel">
<div class="row">
    @foreach ($pces as $pce)

    <div class="card">
        <div class="card-header">
          Featured
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">Client</h5>
                     <p class="card-text">Client management.</p>
                     <input type="hidden" value="Client" name="client_management_type">
                     <input type="hidden" value="Client management" name="client_management_description" >
                     <div class="row">

                      <div class="col-md-12 ">
                    <input type="radio" class="btn-check" name="client_management" id="client_management_success-outlined" autocomplete="off" value="1">
                  <label class="btn btn-outline-success" style="width: 70%" for="client_management_success-outlined">Experienced</label>

              </div>
          </div>
                  <div class="row">

                      <div class="col-md-12 ">
                  <input type="radio" class="btn-check" name="client_management" id="client_management_warning-outlined" autocomplete="off" value="2">
                  <label class="btn btn-outline-warning" style="width: 70%" for="client_management_warning-outlined">Intermediate</label>

              </div>
          </div>
                  <div class="row">

                      <div class="col-md-12 ">
                  <input type="radio" class="btn-check" name="client_management" id="client_management_primary-outlined" autocomplete="off" value="3">
                  <label class="btn btn-outline-primary" style="width: 70%" for="client_management_primary-outlined">Inexperienced</label>

              </div>
          </div>
                  <div class="row">

                      <div class="col-md-12 ">
                  <input type="radio" class="btn-check" name="client_management" id="client_management_danger-outlined" autocomplete="off" value="4">
                  <label class="btn btn-outline-danger" style="width: 70%" for="client_management_danger-outlined">Difficult </label>

              </div>
          </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">

            <h5 class="card-title"></h5>
                    <p class="card-text">Profile of project</p>
                    <input type="hidden" value="Client" name="profile_of_project_type">
                    <input type="hidden" value="Client management" name="profile_of_project_description" >

                 <div class="row">

                     <div class="col-md-12 ">
                   <input type="radio" class="btn-check" name="profile_of_project" id="success-outlined" autocomplete="off" value="1">
                 <label class="btn btn-outline-success" style="width: 70%" for="success-outlined">None</label>
             </div>
         </div>
                 <div class="row">

                     <div class="col-md-12 ">

                 <input type="radio" class="btn-check" name="profile_of_project" id="profile_of_project_warning-outlined" autocomplete="off" value="2">
                 <label class="btn btn-outline-warning" style="width: 70%" for="profile_of_project_warning-outlined">Local</label>
             </div>
         </div>
                 <div class="row">

                     <div class="col-md-12 ">

                 <input type="radio" class="btn-check" name="profile_of_project" id="profile_of_project_primary-outlined" autocomplete="off" value="3">
                 <label class="btn btn-outline-primary" style="width: 70%" for="profile_of_project_primary-outlined">Regional</label>
             </div>
         </div>
                 <div class="row">

                     <div class="col-md-12 ">
                 <input type="radio" class="btn-check" name="profile_of_project" id="profile_of_project_danger-outlined" autocomplete="off" value="4">
                 <label class="btn btn-outline-danger" style="width: 70%" for="profile_of_project_danger-outlined">National profile </label>
             </div>
         </div>
                 </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                   <div class="card-body">
            <h5 class="card-title">Scope</h5>
           <p class="card-text">Clarity of scope</p>
           <input type="hidden" value="Scope" name="clarity_of_scope_type">
           <input type="hidden" value="Clarity of Scope" name="clarity_of_scope_description" >
           <div class="row">

            <div class="col-md-12 ">
     <input type="radio" class="btn-check" name="clarity_of_scope" id="clarity_of_scope_success-outlined" autocomplete="off" value="1">
        <label class="btn btn-outline-success" style="width: 70%" for="clarity_of_scope_success-outlined">Clearly defined, no ambiguity</label>

           </div>
           </div>
           <div class="row">

            <div class="col-md-12 ">
        <input type="radio" class="btn-check" name="clarity_of_scope" id="clarity_of_scope_warning-outlined" autocomplete="off" value="2">
        <label class="btn btn-outline-warning" style="width: 70%" for="clarity_of_scope_warning-outlined">Defined, limited ambiguity</label>

           </div>
           </div>
           <div class="row">
            <div class="col-md-12 ">
  <input type="radio" class="btn-check" name="clarity_of_scope" id="clarity_of_scope_primary-outlined" autocomplete="off" value="3">
        <label class="btn btn-outline-primary" style="width: 70%" for="clarity_of_scope_primary-outlined">Clarification needed</label>

           </div>
           </div>
           <div class="row">
               <div class="col-md-12 ">

        <input type="radio" class="btn-check" name="clarity_of_scope" id="clarity_of_scope_danger-outlined" autocomplete="off" value="4">
        <label class="btn btn-outline-danger" style="width: 70%" for="clarity_of_scope_danger-outlined">Only outcomes identified</label>
               </div>
           </div>

        </div>
            </div>
            <div class="col-md-6">

                <div class="card-body">

            <h5 class="card-title"></h5>
                   <p class="card-text">Requirement for professional services
                    sub-consultant</p>
                   <input type="hidden" value="Scope" name="requirement_for_professionals_type">
                   <input type="hidden" value="Requirement for professional services
                   sub-consultant" name="requirement_for_professionals_description" >
                   <div class="row">

                    <div class="col-md-12 ">
             <input type="radio" class="btn-check" name="requirement_for_professionals" id="requirement_for_professionals_success-outlined" autocomplete="off" value="1">
                <label class="btn btn-outline-success" style="width: 70%"  for="requirement_for_professionals_success-outlined">None</label>

                   </div>
                   </div>
                   <div class="row">

                    <div class="col-md-12 ">
                <input type="radio" class="btn-check" name="requirement_for_professionals" id="requirement_for_professionals_warning-outlined" autocomplete="off" value="2">
                <label class="btn btn-outline-warning" style="width: 70%" for="requirement_for_professionals_warning-outlined">Same location</label>

                   </div>
                   </div>
                   <div class="row">
                    <div class="col-md-12 ">
          <input type="radio" class="btn-check" name="requirement_for_professionals" id="requirement_for_professionals_primary-outlined" autocomplete="off" value="3">
                <label class="btn btn-outline-primary" style="width: 70%" for="requirement_for_professionals_primary-outlined">National</label>

                   </div>
                   </div>
                   <div class="row">
                       <div class="col-md-12 ">

                <input type="radio" class="btn-check" name="requirement_for_professionals" id="requirement_for_professionals_danger-outlined" autocomplete="off" value="4">
                <label class="btn btn-outline-danger" style="width: 70%" for="requirement_for_professionals_danger-outlined">International</label>
                       </div>
                   </div>

                </div>
            </div>
        </div>

      </div>
   @endforeach
</div>



</div>
</div>
<div class="tab-pane fade" id="Project-add" role="tabpanel">


</div>
</div>
</div>
</div>



<div class="modal fade" id="addtask" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    <form action="{{route('pps.store')}}" method="post">
        @csrf
    <div class="modal-content">
    <div class="modal-header">
    <h6 class="title" id="defaultModalLabel">Add New Project Pursuit Summary</h6>
    </div>
    <div class="modal-body">
    <div class="row clearfix">
    <div class="col-12">
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Background/Opportunity Source" name="bos">
    <input type="hidden" class="form-control"  name="project_id" value="{{$id}}">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Scope to be Completed" name="stbc">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Expected Delivarables From Client" name="pedc">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Proposal timeline (due date to submit)" name="proposal_timeline">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Project timeline (start and end dates)" name="project_timeline">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Project Stakeholders" name="project_stakeholders">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Project Bid requirements" name="pb_requirements">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Identified potential Risk items" name="ipri">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Info supplied by client" name="isbc">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Communications notes" name="communication_notes">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Opportunity for additional value" name="ofav">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="SR&ED Opportunity" name="sredo">
    </div>
    </div>

    </div>
    </div>
    <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

</div>
</form>
    </div>
    </div>
    </div>
@endsection
