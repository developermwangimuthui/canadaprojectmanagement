@extends('layouts.app')
@section('content')
<div class="section-body">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="d-flex justify-content-between align-items-center">

</div>
</div>
</div>
</div>
</div>

<div class="section-body mt-3">
<div class="container">
<div class="tab-content">
<div class="tab-pane fade show active" id="Project-OnGoing" role="tabpanel">
<div class="row">
    @foreach ($projects as $project)
<a href="{{route('singlePPS',$project->id)}}">
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card" style="width: 21rem;">
        <div class="card-body text-center ribbon">
        <div class="ribbon-box green">New</div>
        <img class="rounded-circle img-thumbnail w100" src="/assets/images/sm/avatar1.jpg" alt="">
        <h6 class="mt-3 mb-0">Project Pursuit Summary</h6>

        </div>
        </div>
        </div>
        </a>
<a href="{{route('singlePCE',$project->id)}}">
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card" style="width: 21rem;">
        <div class="card-body text-center ribbon">
        <div class="ribbon-box green">New</div>
        <img class="rounded-circle img-thumbnail w100" src="/assets/images/sm/avatar1.jpg" alt="">
        <h6 class="mt-3 mb-0">Project Complexity Evaluation</h6>

        </div>
        </div>
        </div>
        </a>
<a href="{{route('singlePPS',$project->id)}}">
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card" style="width: 21rem;">
        <div class="card-body text-center ribbon">
        <div class="ribbon-box green">New</div>
        <img class="rounded-circle img-thumbnail w100" src="/assets/images/sm/avatar1.jpg" alt="">
        <h6 class="mt-3 mb-0">Go No Go Assesment </h6>

        </div>
        </div>
        </div>
        </a>
<a href="{{route('singlePPS',$project->id)}}">
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card" style="width: 21rem;">
        <div class="card-body text-center ribbon">
        <div class="ribbon-box green">New</div>
        <img class="rounded-circle img-thumbnail w100" src="/assets/images/sm/avatar1.jpg" alt="">
        <h6 class="mt-3 mb-0">Project Participants</h6>

        </div>
        </div>
        </div>
        </a>
<a href="{{route('singlePPS',$project->id)}}">
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card" style="width: 21rem;">
        <div class="card-body text-center ribbon">
        <div class="ribbon-box green">New</div>
        <img class="rounded-circle img-thumbnail w100" src="/assets/images/sm/avatar1.jpg" alt="">
        <h6 class="mt-3 mb-0">Project Stages</h6>

        </div>
        </div>
        </div>
        </a>
<a href="{{route('singlePPS',$project->id)}}">
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card" style="width: 21rem;">
        <div class="card-body text-center ribbon">
        <div class="ribbon-box green">New</div>
        <img class="rounded-circle img-thumbnail w100" src="/assets/images/sm/avatar1.jpg" alt="">
        <h6 class="mt-3 mb-0">Scope Work Description</h6>

        </div>
        </div>
        </div>
        </a>
<a href="{{route('singlePPS',$project->id)}}">
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card" style="width: 21rem;">
        <div class="card-body text-center ribbon">
        <div class="ribbon-box green">New</div>
        <img class="rounded-circle img-thumbnail w100" src="/assets/images/sm/avatar1.jpg" alt="">
        <h6 class="mt-3 mb-0">Work Break Down Structure</h6>

        </div>
        </div>
        </div>
        </a>
<a href="{{route('singlePPS',$project->id)}}">
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card" style="width: 21rem;">
        <div class="card-body text-center ribbon">
        <div class="ribbon-box green">New</div>
        <img class="rounded-circle img-thumbnail w100" src="/assets/images/sm/avatar1.jpg" alt="">
        <h6 class="mt-3 mb-0">Project Initiation Summary </h6>

        </div>
        </div>
        </div>
        </a>
<a href="{{route('singlePPS',$project->id)}}">
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card" style="width: 21rem;">
        <div class="card-body text-center ribbon">
        <div class="ribbon-box green">New</div>
        <img class="rounded-circle img-thumbnail w100" src="/assets/images/sm/avatar1.jpg" alt="">
        <h6 class="mt-3 mb-0">Human Resource Request Form </h6>

        </div>
        </div>
        </div>
        </a>
<a href="{{route('singlePPS',$project->id)}}">
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card" style="width: 21rem;">
        <div class="card-body text-center ribbon">
        <div class="ribbon-box green">New</div>
        <img class="rounded-circle img-thumbnail w100" src="/assets/images/sm/avatar1.jpg" alt="">
        <h6 class="mt-3 mb-0">Hazard Identification </h6>

        </div>
        </div>
        </div>
        </a>
<a href="{{route('singlePPS',$project->id)}}">
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card" style="width: 21rem;">
        <div class="card-body text-center ribbon">
        <div class="ribbon-box green">New</div>
        <img class="rounded-circle img-thumbnail w100" src="/assets/images/sm/avatar1.jpg" alt="">
        <h6 class="mt-3 mb-0">Emergency Response Plan</h6>

        </div>
        </div>
        </div>
        </a>
<a href="{{route('singlePPS',$project->id)}}">
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card" style="width: 21rem;">
        <div class="card-body text-center ribbon">
        <div class="ribbon-box green">New</div>
        <img class="rounded-circle img-thumbnail w100" src="/assets/images/sm/avatar1.jpg" alt="">
        <h6 class="mt-3 mb-0">Crew Deployment Checklist</h6>

        </div>
        </div>
        </div>
        </a>
<a href="{{route('singlePPS',$project->id)}}">
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card" style="width: 21rem;">
        <div class="card-body text-center ribbon">
        <div class="ribbon-box green">New</div>
        <img class="rounded-circle img-thumbnail w100" src="/assets/images/sm/avatar1.jpg" alt="">
        <h6 class="mt-3 mb-0">Project Journal</h6>

        </div>
        </div>
        </div>
        </a>
<a href="{{route('singlePPS',$project->id)}}">
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card" style="width: 21rem;">
        <div class="card-body text-center ribbon">
        <div class="ribbon-box green">New</div>
        <img class="rounded-circle img-thumbnail w100" src="/assets/images/sm/avatar1.jpg" alt="">
        <h6 class="mt-3 mb-0">Project Lessons Learnt</h6>

        </div>
        </div>
        </div>
        </a>
    @endforeach
</div>



</div>
</div>

</div>
</div>
</div>

    </div>
@endsection
